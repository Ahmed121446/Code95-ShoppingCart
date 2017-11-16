@extends('../layout/master')

@section('title')
    Login page
@endsection

@section('content')

<h1>Login Page</h1>


<div class="col-md-12">
	@include('../includes/errors')
</div>

<form action="/User/Login" method="post">
	{{csrf_field()}}

	<div class="form-group">
		<label for="email">Email :</label>
		<input type="email" name="email" class="form-control" placeholder="example @ example.com">
	</div>

	<div class="form-group">
		<label for="password">Password :</label>
		<input type="password" name="password" class="form-control" placeholder="*******">
	</div>
	<input type="submit" class="btn btn-primary" value="Submit" >
</form>
@endsection