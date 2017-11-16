@extends('../layout/master')

@section('title')
   Profile
@endsection

@section('content')

<h1>Profile Page</h1>


<h1>{{Auth::user()->name}}</h1>

@endsection