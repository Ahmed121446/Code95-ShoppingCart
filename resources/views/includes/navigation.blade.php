<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="{{ route('home') }}">Shopping</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">


      <ul class="nav navbar-nav navbar-right">
        @if (Auth::User())
        <li>
          <a href="/Item/AddItem">
          
            

             <button class="btn btn-primary" type="button">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
              Add Items
            </button>
          </a>
        </li>

        <li>
          <a href="/Item/ShoppingCart">
            <button class="btn btn-primary" type="button">
                <span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>
              Shopping Cart
              @if (Session::has('shoppingcart'))
                <span class="badge TotalQuantityofitems">
                  {{Session::get('shoppingcart')->TotalQuantity}}
                </span>
              @endif
               
              
              
            </button>
        
          </a>
          
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> {{Auth::User()->name}} <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="/User/Profile"><span class=" glyphicon glyphicon-edit" aria-hidden="true"></span> Profile</a></li>
            <li><a href="/User/Logout"><span class=" glyphicon glyphicon-log-out" aria-hidden="true"></span> Logout</a></li>
           
          </ul>
        </li>

        @else

       
            <li><a href="/User/Register"><span class=" glyphicon glyphicon-download-alt" aria-hidden="true"></span> Register</a></li>
            <li><a href="/User/Login"><span class=" glyphicon glyphicon-log-in" aria-hidden="true"></span> Login</a></li>
            
        @endif

      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>