{{-- AddItem --}}
@extends('../layout/master')

@section('title')
   Add Item
@endsection

@section('content')

<h1>Add Item Page</h1>


<form action="/Item/AddItem" enctype="multipart/form-data" method="post">
	{{csrf_field()}}

	<div class="form-group">
		<label for="Image">Item Image :</label>
		<input type="file" name="Image" class="form-control">
	</div>
	
	<div class="form-group">
		<label for="item_title">Item Title :</label>
		<input type="text" name="item_title" class="form-control" placeholder="Item Name">
	</div>

	<div class="form-group">
		<label for="item_desc">Item Description :</label>
		<textarea name="item_desc" class="form-control" placeholder="Item description" rows="5"></textarea>
		
	</div>

	<div class="form-group">
		<label for="item_price">Item Price :</label>
		<input type="text" name="item_price" class="form-control" placeholder="12 $">
	</div>

	
	<input type="submit" class="btn btn-primary" value="Submit" >
</form>

@endsection