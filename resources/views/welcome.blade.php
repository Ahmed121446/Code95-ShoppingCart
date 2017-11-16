@extends('../layout/master')

@section('title')
Welcome page
@endsection

@section('content')

@if (Session::has('SCE'))
<div class="alert alert-danger">
          {{ session('SCE') }}
</div>
   
@endif

@foreach ($AllItems->chunk(3) as $item)

<div class="jumbotron">
  <div class="row">
    @foreach ($item as $item_info)


    <div class="col-sm-6 col-md-4">
      <div class="thumbnail">
        <img src="{{$item_info->image_path }}" alt="Item Image">
        <div class="caption">
          <h3>{{$item_info->name }}</h3>
          <p>{{$item_info->desc }}</p>

          {{-- <div class="clearfix"> --}}
            <p >{{$item_info->price}} $</p>
             {{--  <p>
                <a href="Item/AddToCart/{{$item_info->id}}" class="btn btn-primary pull-right" role="button">Add To Shopping Cart</a>
              </p> --}}
              
            {{-- </div> --}}
            <p>
              <form action="Item/AddToCart/{{$item_info->id}}" method="get">
                 <div class="input-group">
                  <input type="text" name="quantity" class="form-control" placeholder="1">
                  <span class="input-group-btn">
                    <button class="btn btn-primary" type="submit">Add To Shopping Cart</button>
                  </span>
                </div><!-- /input-group -->
            </form>

            @include('includes/errors')

          </p>


          <p> <small >Added by : {{ $item_info->User->name}} <br/>from {{$item_info->created_at->diffForHumans()}}</small></p>
          {{-- <small>{{ $item_info->User()->name}}</small> --}}


          

        </div>
      </div>
    </div>

    @endforeach

  </div>

</div>
@endforeach










@endsection