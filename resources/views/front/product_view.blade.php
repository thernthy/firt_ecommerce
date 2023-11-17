@extends('front.layout')
@push('styles')
 <link rel="stylesheet" href="{{asset('css/view_product_design.css')}}">
@endpush
@section('content')
<div id="wrap">
@include('front.navbar')
<form action="{{route('cart.add', $target_product->product_id)}}" method="post" id="view_form">
@csrf
      <div class="_card">
        <div class="card__title">
          <div class="_icon" onclick="goBack()">
          <a href="#" onclick="goBack()"><i class="fa fa-arrow-left"></i></a>
          </div>
          <h3>New products</h3>
        </div>
        <div class="card__body">
          <div class="half">
            <div class="featured_text">
              <h1>Nurton</h1>
              <p class="sub">Office Chair</p>
              <p class="price">$210.00</p>
            </div>
            <div class="image">
              <img src="https://images-na.ssl-images-amazon.com/images/I/613A7vcgJ4L._SL1500_.jpg" alt="" height="100%" width="100%">
            </div>
          </div>
          <div class="half">
            <div class="description">
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero voluptatem nam pariatur voluptate perferendis, asperiores aspernatur! Porro similique consequatur, nobis soluta minima, quasi laboriosam hic cupiditate perferendis esse numquam magni.</p>
            </div>
            <span class="stock"><i class="fa fa-pen"></i> In stock</span>
            <div class="reviews">
              <ul class="stars">
                <li><i class="fa fa-star"></i></li>
                <li><i class="fa fa-star"></i></li>
                <li><i class="fa fa-star"></i></li>
                <li><i class="fa fa-star"></i></li>
                <li><i class="fa fa-star-o"></i></li>
              </ul>
              <span>(64 reviews)</span>
            </div>
          </div>
        </div>
        <div class="card__footer">
          <div class="recommend">
            <p>Recommended by</p>
            <h3>Andrew Palmer</h3>
          </div>
          <div class="action">
            <button type="button">Add to cart</button>
          </div>
        </div>
      </div>
    </form>
</div>
@endsection
@push('scripts')
    <script>
      function goBack() {
        window.history.back();
      }
    </script>
@endpush