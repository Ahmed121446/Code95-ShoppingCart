<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\ShoppingCart;
use App\Item;
use Session;
use App\Mail\ListOfItemsToBuy;


class ShoppingCartController extends Controller
{

	public function __construct(){
        //all with auth except viewItems
		$this->middleware('auth');
	}

    public function Show(){

        if (Session::has('shoppingcart')) {
            $oldshoppingcart = Session::get('shoppingcart');
            $cart = new ShoppingCart($oldshoppingcart);
            $items_in_cart =  $cart->Items;
            return view('item.ShoppingCart',compact('items_in_cart'));
        }else{

            return view('item.ShoppingCart');
        } 
    }

    public function AddToCart(Request $request , $id){
        //find item
        $quantity = $request['quantity'];
        if ($quantity == null ) {
           $quantity = 1 ;
        }
        if($quantity == 0 || $quantity < 0){
            return redirect()->route('home')->with('SCE', 'Please Do Not Put Quantity Less Than 1 ');
        }


        $Item = Item::find($id);

        //if session have shoppingcart so get it else make it = null
        $OldCart = Session::has('shoppingcart') ? Session::get('shoppingcart') : null ;
        //send the OldCart to our model ShoppingCart
        
        
        $cart = new ShoppingCart($OldCart );
        //send item we found and it's id to function AddToShoppingCart in model
        $cart->AddToShoppingCart($Item,$Item->id,$quantity);
        //put in session shoppingcart
        Session::put('shoppingcart',$cart);
        //return back to home
        return redirect()->route('home');
    }

    //remove 1 item
    public function Remove1(Request $request, $id){
        $Item = Item::find($id);
        $OldCart = Session::has('shoppingcart') ? Session::get('shoppingcart') : null ;
        //cart is the object if the  ShoppingCart ======> session
        $cart = new ShoppingCart($OldCart );
        $cart->ReduceOne($Item,$Item->id);

        
        if ($cart->TotalQuantity >= 1 ) {
            Session::put('shoppingcart',$cart);  
            // $All_Data_Need_To_Change_By_Ajax = [
            //     $cart->TotalQuantity,
            //     $cart->TotalPrice,
            //     $cart->Items
            // ];
            // return $All_Data_Need_To_Change_By_Ajax;

        }else {
            Session::forget('shoppingcart');
            // $All_Data_Need_To_Change_By_Ajax = [
            //     $cart->TotalQuantity,
            //     'No_data' => 'no data found in the shopping cart'
            // ];
            //  return $All_Data_Need_To_Change_By_Ajax;
        }

        return redirect()->route('ShoppingCart');
    }

     //remove Selected item from shopping cart
    public function RemoveAll($id){
        $Item = Item::find($id);
        $OldCart = Session::has('shoppingcart') ? Session::get('shoppingcart') : null ;
        //cart is the object if the  ShoppingCart ======> session
        $cart = new ShoppingCart($OldCart );
        $cart->RemoveItem($Item->id);

        
        if ($cart->TotalQuantity >= 1 ) {
            Session::put('shoppingcart',$cart);  
        }else {
            Session::forget('shoppingcart');
        }
        return redirect()->route('ShoppingCart');  
    }



     //Buy button
     public function Buy_Items_In_ShoppingCart(){
     	//get user email
     	if (Session::has('shoppingcart')) {
     		$oldshoppingcart = Session::get('shoppingcart');
            $cart = new ShoppingCart($oldshoppingcart);
            $items_in_cart =  $cart->Items;
     		
     		$User_Email = Auth::user()->email ;
     		\Mail::to($User_Email)->send(new ListOfItemsToBuy(Auth::user(),$items_in_cart,$cart));
     	}

     	return redirect()->back();
     	
     }



}
