<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
        <a class="sidebar-brand brand-logo" href="{{ url('redirect') }}"><img src="home/images/logo.png" alt="logo" /></a>
    </div>
    <ul class="nav">
        <li class="nav-item profile">
            <!-- Profile content here -->
        </li>
        <li class="nav-item nav-category">
            <span class="nav-link">Navigation</span>
        </li>
        <li class="nav-item menu-items {{request()->path() == 'home'? 'route_active' : ''}}">
            <a class="nav-link" href="{{ url('/home') }}">
                <span class="menu-icon">
                    <i class="mdi mdi-speedometer"></i>
                </span>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item menu-items {{
            (
                request()->path() == 'catagory' ||
                request()->path() == 'catagory/createCatagory'||
                Str::startsWith(request()->path(), 'catagory/edite/')

            )? 
            'route_active' : ''
            }}">
            <a class="nav-link" href="{{ route('catagory.index') }}">
                <span class="menu-icon">
                    <i class="mdi mdi-playlist-play"></i>
                </span>
                <span class="menu-title">Category</span>
            </a>
        </li>
        <li class="nav-item menu-items
            {{
            (
                request()->path() == 'products' ||
                Str::startsWith(request()->path(), 'product/add')||
                Str::startsWith(request()->path(), 'product/view')||
                Str::startsWith(request()->path(), 'product/edit')
            )? 
            'route_active' : ''
            }}
        ">
            <a class="nav-link" href="{{url('products') }}">
                <span class="menu-icon">
                    <i class="mdi mdi-table-large"></i>
                </span>
                <span class="menu-title">Products</span>
            </a>
        </li>
        <li class="nav-item menu-items
            {{(Str::startsWith(request()->path(), 'order'))?'route_active' : ''}}
        ">
            <a class="nav-link" href="{{url('order')}}">
                <span class="menu-icon">
                    <i class="fa-solid fa-cart-flatbed"></i>
                </span>
                <span class="menu-title">View Order</span>
            </a>
        </li>
    </ul>
</nav>
