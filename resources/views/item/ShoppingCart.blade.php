{{-- AddItem --}}
@extends('../layout/master')

@section('title')
Shopping Cart
@endsection

@section('content')


<div class="row">
	<div class="col-md-10 col-md-offset-1">

		@if (Session::has('shoppingcart'))
			<div class="jumbotron">


				<h2>
					<span class="glyphicon glyphicon-th-list"></span>
					The Item You Choose
				</h2>
				<hr>

				
				<h4>Total Items : 
					<p class="TotalItemsNumber">
						{{Session::get('shoppingcart')->TotalQuantity }}
					</p>
					
				</h4>

				<hr>
				<h4>Items Data</h4>
				<ul>
					@foreach ($items_in_cart as $item)

					<div class="clearfix" class="getdata">
						<li class="ItemClass">
							
								<p class="pull-left">{{$item['Item']['name']}} 

									<span class="badge howmany-{{$item['Item']['id']}}">
									{{$item['HowMany']}}
									</span>

								</p>
								
							
							
							

						<div class="dropdown pull-right">
							<a href="/Item/Remove1FromCart/{{$item['Item']['id']}}">
							<button class="btn btn-danger ItemRemoveButton" type="button" data-ItemId="{{$item['Item']['id']}}" > Remove </button>
							</a>
							<a href="/Item/RemoveItem/{{$item['Item']['id']}}">
							<button class="btn btn-danger ItemRemoveButton" type="button" data-ItemId="{{$item['Item']['id']}}" > Remove All </button> 
							</a>
						</div>




							<h5 class="pull-right">
								&nbsp; 
								<span class="label label-success Item_Collection_Price-{{$item['Item']['id']}}">
									total Price

									{{$item['Price']}}
								</span> 
								
							</h5>

						</li>
					</div>

					@endforeach

				</ul>
				<hr>

				<h4>Total Price : 
					<p class="ALL_Items_total_price">
						{{Session::get('shoppingcart')->TotalPrice }}
					</p>
					
				</h4>
				<a href="/Item/ShoppingCart/Buy">
					<button class="btn btn-primary">Buy Now</button>
				</a>



				
			</div>




		@else



			<div class="jumbotron">
				<h4>
					{{
						ucwords('no data in the shopping cart please go back and select items .')
					}}
					
				</h4>
			</div>
		



		@endif
	</div>
</div>
@endsection
