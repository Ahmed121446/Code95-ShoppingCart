@component('mail::message')
Welcome MR: <strong>{{$user->name}}</strong>



Your ID : {{$user->id}}

We need to inform you that you take decision to buy Items.


And this is the Items you choose.
 @component('mail::table')
| Item ID   | Item Price   | Item Quantity   | Item Name   |
|  	  :-----:   		 |    :-----:    |    :-----:    |    :--    |
@foreach ($ShoppingCartItems as $item)
	
		  {{$item['Item']['id']}}		  |		  {{$item['Price']}}		  |		  {{$item['HowMany']}} 		  |    {{$item['Item']['name']}}    

@endforeach 


@endcomponent


@component('mail::panel',['url'=>''])
- <i>Total Number Of Items : </i> <strong>{{$CardPrice_and_Quantity->TotalQuantity}}</strong>
- <i>Total Price For All Items : </i> <strong>{{$CardPrice_and_Quantity->TotalPrice}}$</strong>
@endcomponent
Thanks,<br>
{{ config('app.name') }}
@endcomponent