<?php

//return shop page
Route::get('/', 'ItemController@viewItems' )->name('home');

//make after /User    so the path will be  ====> http://127.0.0.1:8000/User/...
Route::group(['prefix' => 'User'], function() {
		//return user profile page
    	Route::get('/Profile', 'Authcontroller@Get_Profile_View' );
    	//user logout
   		Route::get('/Logout','Authcontroller@logout');
   		//return user login page
    	Route::get('/Login', 'Authcontroller@Get_Login_View' );
    	//return user Register page
	   	Route::get('/Register', 'Authcontroller@Get_Register_View' );

	   	//post request
	  	//post login form
	   	Route::post('/Login','Authcontroller@Login' );
	   	//post Register form
	   	Route::post('/Register','Authcontroller@Register' );
});


//make after /Item    so the path will be  ====> http://127.0.0.1:8000/Item/...
Route::group(['prefix' => 'Item'], function() {

		// view AddItem page ( form )
		Route::get('/AddItem', 'ItemController@AddItem' ); 
		//view ShoppingCart
		Route::get('/ShoppingCart', 'ShoppingCartController@Show' )->name('ShoppingCart');
		//add items to ShoppingCart
		Route::get('/AddToCart/{id}', 'ShoppingCartController@AddToCart' );
		//remove 1 item from ShoppingCart
		Route::get('/Remove1FromCart/{id}', 'ShoppingCartController@Remove1' );
		//remove Selected item from ShoppingCart
		Route::get('/RemoveItem/{id}', 'ShoppingCartController@RemoveAll' );

		//send mail to user when press buy button in shopping cart
		Route::get('/ShoppingCart/Buy', 'ShoppingCartController@Buy_Items_In_ShoppingCart' );
		
		//add item to database
		Route::post('/AddItem', 'ItemController@store' );
});

