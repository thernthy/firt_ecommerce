@extends('front.layout')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/product_view.css') }}">
@endpush

@section('content')
<!-- Wrap all page content here -->
<div id="wrap">
@include('front.navbar')
        <div class="col-sm-6 col-sm-offset-3 text-center">
            <h2 style="padding:20px; color:black;">Welcome to 
            <strong style="color: #6d7a71;">{{$shop_category}}</strong> shop</h2>
        </div>
    </section>
    <div class="continer">
        <div class="row custom_padding">
            @if(empty($products))
            <div class="col-sm-4 col-xs-6">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <button class="btn btn-outline-primary">view</button>
                        <button class="btn btn-outline-success">Add to cart</button>
                    </div>
                </div>
                <!--/panel-->
            </div>
            @else
            @foreach($products as $product)
            <div class="col-sm-4 col-xs-6 custom_design">
                <div class="panel panel-default">
                    <div><img src="{{asset('products_img/'.$product->photo)}}" class="img-responsive"></div>
                    <div class="panel-body shadow p-3 mb-5 bg-body-tertiary rounded">
                        <h3 class="lead">{{$product->name}}</h3><hr>
                       
                        <!--<p style="color: green;">120k <span style="color: #6d7a71;">Followers</span>, 900 Posts</p>-->
                        <strong>$ {{$product->price}}</strong>
                        <button class="btn btn-outline-primary"><a href="{{url('shop/view', $product->slug)}}">view</a></button>
                        <form action="{{route('cart.add', $product->product_id)}}" method="post">
                            @csrf
                            <button class="btn btn-outline-success">Add to cart</button>
                        </form>
                    </div>
                </div>
                <!--/panel-->
            </div>
            @endforeach
            @endif

            <!--
            <div class="col-sm-4 col-xs-6">
                <div class="panel panel-default">
                    <div class="panel-thumbnail"><img src="//placehold.it/450X250/ffcc33/444" class="img-responsive">
                    </div>
                    <div class="panel-body">
                        <p class="lead">Bootstrap Templates</p>
                        <p>902 Followers, 88 Posts</p>
                        <p>
                            <img src="https://lh5.googleusercontent.com/-AQznZjgfM3E/AAAAAAAAAAI/AAAAAAAAABA/WEPOnkQS_20/s28-c-k-no/photo.jpg"
                                width="28px" height="28px">
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 col-xs-6">
                <div class="panel panel-default">
                    <div class="panel-thumbnail"><img src="//placehold.it/450X250/f16251/444" class="img-responsive">
                    </div>
                    <div class="panel-body">
                        <p class="lead">Social Media</p>
                        <p>19k Followers, 789 Posts</p>
                        <p>
                            <img src="https://lh4.googleusercontent.com/-eSs1F2O7N1A/AAAAAAAAAAI/AAAAAAAAAAA/caHwQFv2RqI/s28-c-k-no/photo.jpg"
                                width="28px" height="28px">
                            <img src="https://lh4.googleusercontent.com/-9Yw2jNffJlE/AAAAAAAAAAI/AAAAAAAAAAA/u3WcFXvK-g8/s28-c-k-no/photo.jpg"
                                width="28px" height="28px">
                        </p>
                    </div>
                </div>
                panel-->
            </div>
            <!--/col-->
        </div>
        <!--/row-->
    </div>
    <!--/container-->
 <div class="container">
        <div class="col-sm-8 col-sm-offset-2 text-center">
            <h2>Beautiful Bootstrap Templates</h2>

            <hr>
            <h4>
                We love templates. We love Bootstrap.
            </h4>
            <p>Get more free templates like this at the <a href="http://bootply.com">Bootstrap Playground</a>, Bootply.
            </p>
            <hr>
            <ul class="list-inline center-block">
                <li><a href="http://facebook.com/bootply"><img src="/assets/example/soc_fb.png"></a></li>
                <li><a href="http://twitter.com/bootply"><img src="/assets/example/soc_tw.png"></a></li>
                <li><a href="http://google.com/+bootply"><img src="/assets/example/soc_gplus.png"></a></li>
                <li><a href="http://pinterest.com/in1"><img src="/assets/example/soc_pin.png"></a></li>
            </ul>
        </div>
        <!--/col-->
    </div>
    <!--/container-->
</div>
<!--/wrap-->
@endsection

@push('scripts')
    <script>
    </script>
@endpush
