<header class="masthead">
        <div class="container">
            <div class="row">
                <!-- <div class="col-sm-6">
                    <h1><a href="#" title="Bootstrap Template">Happy Scroll</a>
                        <p class="lead">{A Bootstrap Template}</p>
                    </h1>
                </div> -->
                <!-- <div class="col-sm-6">
                    <div class="pull-right  hidden-xs">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <h3><i class="glyphicon glyphicon-cog"></i></h3>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="#"><i class="glyphicon glyphicon-chevron-right"></i> Link</a></li>
                            <li><a href="#"><i class="glyphicon glyphicon-user"></i> Link</a></li>
                            <li><a href="#"><i class="glyphicon glyphicon-lock"></i> Link</a></li>
                            <li><a href="#"><i class="glyphicon glyphicon-cog"></i> Link</a></li>
                        </ul>
                    </div>
                </div> -->
                <div class="col-sm-12">
                    <h1 id="logo" class="h1">
                        <a href="{{ url('/') }}" rel="index">
                            <img src="{{ asset('img/zerow_logo_white.png') }}" alt="zerow logo">
                        </a>
                    </h1>
                </div>
            </div>
        </div>
    </header>
    <!-- Fixed navbar -->
    <div class="navbar navbar-custom navbar-inverse navbar-static-top" id="nav">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav nav-justified">
                    @if(request()->is('/'))
                    <li class="insect_list_items active"><a href="#home">Home</a></li>
                    <li class="insect_list_items "><a href="#section2">Services</a></li>
                    <li class="insect_list_items "><a href="#section3">Our Works</a></li>
                    <li class="insect_list_items "><a href="#section1"><strong>What We Do</strong></a></li>
                    <li class="insect_list_items "><a href="#section4">About</a></li>
                    @else
                    <li class="{{request()->is('/')?'active':''}}"><a href="{{url('/')}}">Home</a></li>
                    @endif
                    <!-- <li><a href="#section5">Contact</a></li> -->
                    <li class="dropdown  {{request()->is('shop*')?'active':''}}">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Products </a>
                        <ul class="dropdown-menu">
                            @foreach($category_shop as $category)
                            <li><a href="{{url('shop', $category->catagory_name)}}">{{$category->catagory_name}}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    @if(!Auth::user())
                    <li>
                        <a href="{{url('login')}}">Login</a>
                    </li>
                    <li>
                        <a href="{{ url('register')}}">register</a>
                    </li>
                    @else
                    <li>
                        <div class="user_profile">
                            <span></span>
                            <img src="{{ asset('img/user_avertar.jpg')}}" alt="">
                        </div>
                    </li>
                    <li>
                        <form action="{{route('logout')}}" method="post">
                            @csrf
                            <button type="submit">Log Out</button>
                        </form>
                    </li>
                    <li>
                        <a href="{{url('view/cart')}}"
                        style="position: relative;"
                        >
                        <i class="fa-solid fa-cart-arrow-down"
                        style="font-size: 1.5rem;"
                        >
                        </i>
                        <span
                        style="
                        position: absolute; 
                        top:5px; 
                        right:25px; 
                        color:<?php if($totalCartItems!=0){echo'red';}else{echo'green';}?>;
                        "
                        >{{$totalCartItems}}</span>
                    </a>
                    </li>
                    @endif
                </ul>
            </div>
            <!--/.nav-collapse -->
        </div>
        <!--/.container -->
    </div>
    <!--/.navbar -->
    @push('scripts')
    <script>
        const links = document.querySelectorAll('.insect_list_items a');
		links.forEach(link => {
		link.addEventListener('click', (e) => {
		e.preventDefault();
		const targetId = link.getAttribute('href').substring(1); // Remove the "#" character
		const targetSection = document.getElementById(targetId);
            if (targetSection) {
                    const menuItems = document.querySelectorAll('.insect_list_items');
                    menuItems.forEach(item => item.classList.remove('active'));
                    const parentLi = link.parentElement;
                    parentLi.classList.add('active');
            }
            window.scrollTo({
					top: targetSection.offsetTop,
					behavior: 'smooth'
				});
        });
    })
    </script>

    @endpush