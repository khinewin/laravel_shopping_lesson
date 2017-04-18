<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/"><span class="glyphicon glyphicon-cog"></span> Coffee POS</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">

            <li><a href="{{route('cart')}}">{{Session::has('cart') ? Session::get('cart')->totalQty : null}} items in your cart.</a></li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                @if(Auth::User())
                <li><a href="{{route('dashboard')}}"><span class="glyphicon glyphicon-dashboard"></span> Dashboard</a></li>
                <li><a href="{{route('showCoffee')}}"><span class="glyphicon glyphicon-cog"></span> Coffee</a></li>
                    <li><a href="{{route('categories')}}"><span class="glyphicon glyphicon-list-alt"></span> Categories</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"></span> {{Auth::User()->name}} <span class="caret"></span></a>
                    <ul class="dropdown-menu">

                        <li><a href="#">profile</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#" id="logout">logout</a></li>
                    </ul>
                </li>
                    @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Contact Us <span class="caret"></span></a>
                        <ul class="dropdown-menu">

                            <li><a href="{{route('login')}}">login</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="{{route('register')}}">register</a></li>
                        </ul>
                    </li>

                @endif
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>