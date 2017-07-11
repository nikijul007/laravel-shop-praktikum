<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display  -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{route('product.index')}}"><i class="fa fa-home" aria-hidden="true"></i> Shop</a>
            <a class="navbar-brand" href="{{ route('verwaltung.admin') }}">  Admin</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

            <ul class="nav navbar-nav navbar-right">
                <li><a href="{{route('product.shoppingCard')}}"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Shopping Card
                        <span class="badge">{{Session::has('card') ? Session::get('card')->totalQty : '' }}</span>
                    </a>
                </li>
                @yield('delAccount')
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-user-circle" aria-hidden="true"></i> Your Account <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        @if(Auth::check())
                        <li><a href="{{route('users.profile')}}"><i class="fa fa-user-circle-o" aria-hidden="true"></i></i> User Profile</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="{{route('users.logout')}}"><i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a></li>
                        @else
                        <li><a href="{{route('users.signup')}}"><i class="fa fa-plus" aria-hidden="true"></i> Sign-Up</a></li>
                        <li><a href="{{route('users.signin')}}"><i class="fa fa-sign-in" aria-hidden="true"></i> Sign-In</a></li>
                        
                        @endif
                        
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>