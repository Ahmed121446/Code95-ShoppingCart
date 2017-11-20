<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use Session;

use App\ShoppingCart;

class ItemController extends Controller
{
	public function __construct(){
        //all with auth except viewItems
		$this->middleware('auth')->except(['viewItems']);
	}

    public function AddItem(){
      
            return view('item.AddItem');
    }




    public function store(Request $request){
    	$this->validate($request,[
            'Image'  => 'required',
            'item_title' => 'required|max:20',
            'item_desc' => 'required|min:5',
            'item_price' => 'required|numeric'
        ]);


        //get image name
        $filename = $_FILES['Image']['name'];
        

        
        $Image_Name =  $filename;
        $item_title =  $request['item_title'];
        $item_desc =  $request['item_desc'];
        $item_price =  $request['item_price'];

        $Image =  $request['Image']->storeAs('public/Itemsimages',$filename);

        $item = new Item();

        $item->image_path = $Image_Name ;
    	$item->name = $item_title ;
    	$item->desc = $item_desc ;
    	$item->price = $item_price ;
        $item->user_id = auth()->id();

        

    	$item->save();

    	return redirect()->route('home');
    }


    public function viewItems(){
        //eager loading is better
        $AllItems = Item::all();

        //lazy loading
       // $AllItems = Item::all();
    	
    	//dd($AllItems);
    	return view('welcome',compact('AllItems'));
    }
}
