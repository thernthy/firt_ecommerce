@extends('front.layout')

@push('styles')
<style>
    .row .itims_list{
        padding: 10px 10px;
        width: 100%;
    }
    .itims_list li{
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 5px 10px;
        border-radius: 10px;
        box-shadow: 1px 1px 5px rgba(0,0,0,.10);
    }
    .itims_list .header{
        background-color: #6d7a71;
        color: white;
        margin-bottom: 5px;
       box-shadow: 1px 4px 7px rgba(0,0,0,.10);
    }
    .itims_list li i{
        font-size: 1.5rem;
        margin-right: 10px;
        color: #6d7a71;
        background-color: #42F5A0;
        padding: 10px;
        border-radius: 50%;
    }
    .itims_list li i.alert{
        background-color: #EB4700;
    }
    .itims_list .edit_qurtity{
        display: flex;
        flex-wrap: 5px;
        padding: 2px 10px;
        flex-direction: row;
        align-items: center;
        justify-content: space-between;
        background-color: #6d7a71;
        border-radius: 30px;
    }
    .itims_list .edit_qurtity button{
        background-color: transparent;
        border: 0;
        font-size: 1.5rem;
        margin: 0 5px;
        font-weight: 900;
        color: white;
        transform: translateY(-2px);
    }
    .itims_list .edit_qurtity strong{
        font-size: 1.2rem;
        font-weight: 900;
    }
    .itims_list ._product_name{
        font-size: 1rem;
        font-weight: 600;
        transform: translateY(5px);
        text-transform: capitalize;
    }
    .itims_list .img_block{
        width: 80px;
        height: 80px;
        margin-right:20px;
    }
    .itims_list .img_block img{
        width: 100%;
        height: 100%;
        
    }
    .col-6{
        background-color: red;
    }
    #car_items_container{
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        margin-top: 2rem;
    }
    .itims_list.checkout_contianer li{
        width: 70%;
        float: right;
    }
    .checkout_contianer h3{
        transform: translateY(-5px);
    }
    .checkout_contianer a{
        padding: 10px 8px;
        outline: none;
        border: 0;
        border-radius: 10px;
        border-bottom: 2px solid #6d7a71;
        border-top: 2px solid #6d7a71;
        background-color: #6d7a71;
        margin: 10px;
        color: white;
        transition: all .5s;
    }
    .checkout_contianer a:hover{
        background-color: unset;
        color: #6d7a71;
    }
    .row-message{
        position: fixed;
        width: 100%;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 1000;
    }
    .alert_message {
        padding: 20px;
        position: relative;
        border-radius:10px 38px 10px 10px;
        color: white;
    }
    .alert_message.success {
        background-color: green;
    }
    .alert_message.error {
        background-color: red;
    }
    .alert_message i{
        position: absolute;
        font-size: 2rem;
        color: red;
        top: -25px;
        right: -20px;
        background-color: white;
        padding: 10px;
        border-radius: 50%;
    }
    .alert_message p {
        font-size: 1.5rem;
    }
    .qr_img img{
        padding: 10px;
        box-shadow: 1px 1px 5px rgba(0,0,0,.10);
    }
</style>
@endpush

@section('content')
@if(session()->has('message_success'))
<div class="row-message">
    <div class="alert_message success col-12">
        <p class="successFull">{{session()->get('message_success')}}</p>
        <i class="fa-regular fa-circle-xmark"></i>
    </div>
</div>
@elseif(session()->has('message_error'))
<div class="row-message">
    <div class="alert_message error col-12">
        <p class="successFull">{{session()->get('message_error')}}</p>
        <i class="fa-regular fa-circle-xmark"></i>
    </div>
</div>
@endif
<div id="wrap">
@include('front.navbar')
    <div class="row p-r-5 p-l-5" id="car_items_container">
                  <ul class="itims_list ">
                    <li class="header">
                        <h3>All({{$totalCartItems}} Items)</h3>
                        <h3><strong>Totat:</strong><span> {{$total_price}}</span></h3>
                    </li>
                    @foreach($cart_items as $items)
                    <li>
                        <div class="img_block">
                            <img src="{{asset('products_img/'.$items->photo)}}" alt="">
                        </div>
                        <p class="_product_name">
                        {{$items->name}}
                        </p>
                        <div class="edit_qurtity">
                            <form action="{{route('decreased_cart_item', $items->cart_id)}}" method="post">
                                @csrf
                                <input type="number" value="1" name="quantity" hidden>
                                <button>-</button>
                            </form>
                            <strong>{{$items->quantity}}</strong>
                            <form action="{{route('update_cart_amout', $items->cart_id)}}" method="post">
                                @csrf
                                <input type="number" value="1" name="quantity" hidden>
                                <button>+</button>
                            </form>
                        </div>
                        <p class="_product_name">
                            $ {{($items->quantity * $items->price)}}
                        </p>
                        <div>
                        <a href="{{url('shop/view', $items->slug)}}"><i class="fa-regular fa-eye"></i></a>
                        <a href="{{url('cart/delet', $items->cart_id)}}"><i class="fa-regular fa-trash-can alert"></i></a>
                        </div>
                    </li>
                    @endforeach
                </ul>
                <ul class="itims_list checkout_contianer">
                    <li class="header">
                        <h3>Payment Details</h3>
                    </li>
                    <li>
                        <p>Subtotal:</p>
                        <strong>${{($total_price==0)?'00.00':$total_price}}</strong>
                    </li>
                    <li>
                        <p>Shipping:</p>
                        <strong>$2.00</strong>
                    </li>
                    <li>
                        <h3>Total:</h3>
                        <strong>$ {{($total_price + 2 == 00)?'00.00' : $total_price + 2}}</strong>
                    </li>
                    <li>
                        <div class="title" 
                            style="
                            border-bottom: 1px solid #6d7a71;
                            margin-left:20px;
                            ">
                            <h3 style="border-bottom:1px solid black;">Make payment</h3>
                            <div class="payment_way">
                                <div class="qr_img">
                                    <img src="{{asset('img/qr.jpg')}}" alt="" height="100" width="100">
                                </div>
                                <div class="bank_info">
                                    <ul>
                                        <li>
                                            <img src="{{asset('img/aba.png')}}" alt="" height="100" height="100">
                                            <h5>Bank:00029283</h5>
                                        </li>
                                        <li>
                                            <img src="{{asset('img/ac.png')}}" alt="" width="100" height="100">
                                            <h5>Bank:00029283</h5>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <a href="{{url('view/cart=checkout')}}">PROCEED TO CHECKOUT</a>
                    </li>
                </ul>
    </div>
</div>
<!--/wrap-->
@endsection

@push('scripts')
    <script>
        $('.fa-circle-xmark').click(function() {
            $('.row-message').hide()
        })
    </script>
@endpush
