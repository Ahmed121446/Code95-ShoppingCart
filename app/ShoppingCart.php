<?php

namespace App;



class ShoppingCart 
{
   public $Items 			   =   null ;
   public $TotalQuantity 	=   0;
   public $TotalPrice 		=   0;


   public function __construct($OldCart){
	   	if ($OldCart) {

	   		$this->Items 			   =    $OldCart->Items ;
	   		$this->TotalQuantity 	=    $OldCart->TotalQuantity ;
	   		$this->TotalPrice 		=    $OldCart->TotalPrice ;

	   	}
   }


   public function AddToShoppingCart($Item , $id , $quantity){

   	$StroredItem = [

   		'HowMany' 	 => 0 ,
   		'Price' 	    => 0 ,
   		'Item'		 => $Item
   	];

   	if ($this->Items) {
   		if (array_key_exists($id, $this->Items)) {
   			$StroredItem = $this->Items[$id];
   		}
   	}



   	$StroredItem['HowMany']   += $quantity;
   	$StroredItem['Price']     = $Item->price * $StroredItem['HowMany'];

   	
   	$this->Items[$id]          =  $StroredItem;
      $this->TotalQuantity      += $quantity;

      
      $this->TotalPrice         += $Item->price * $quantity ;
   }


   //remove 1 item  //ReduceOne
   public function ReduceOne($Item ,$id){
      
      $this->Items[$id]['HowMany']--;
      $this->Items[$id]['Price'] -= $Item->price ;

      $this->TotalPrice         -= $Item->price ;
      $this->TotalQuantity      --;
      
       if ( $this->Items[$id]['HowMany'] == 0) {
        unset($this->Items[$id]);
      }

   }

   public function RemoveItem($id){
      $this->TotalPrice         -=  $this->Items[$id]['Price'] ;
      $this->TotalQuantity      -= $this->Items[$id]['HowMany'];

       unset($this->Items[$id]);
   }

   
}
