@extends('front.layout')

@push('styles')
<link rel="stylesheet" href="{{asset('css/checkout_form.css')}}">
<style>

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
<div class="row-message">
    <div class="alert_message error col-12">
        <p class="successFull" id="error"></p>
        <i class="fa-regular fa-circle-xmark"></i>
    </div>
</div>
<div class="form_container is_active">
    <form  id="confirmForm" action="{{route('comfirm_order')}}" method="post" enctype="multipart/form-data">
    @csrf
        <ol class="steps">
            <li class="step is-complete" data-step="1">
                <a href="{{url('view/cart')}}">Shopping cart</a>
            </li>
            <li class="step is-active" data-step="2">
                <a style="cursor: pointer;">Payment</a>
            </li>
            <li class="step" data-step="3">
                <a onclick="moveToNextForm()" style="cursor: pointer;">Confirm</a>
            </li>
        </ol>
        <div class="input_file">
            <label for="phone">+885</label>
            <input type="text" name="phone" id="phone_in" placeholder="Phone...">
        </div>
        <div class="input_file">
            <label for="telegram">Telegram name</label>
            <input type="text" id="telegram" placeholder="@telegram name....">
        </div>
        <div class="input_file">
            <label for="address">Shipping address</label>
            <input type="text" id="address" placeholder="Shipping address....">
        </div>
        <div class="input_file">
            <label for="image">Screen short photo</label>
            <input type="file" id="image" accept="image/*">
        </div>
        <div id="imagePreview">
            <img id="previewImage" src="" alt="Preview">
        </div>
        <div class="input_file">
            <a href="{{url('view/cart')}}">Back</a>
            <a href="#" class="next-button">Next</a>
            <button  id="confirmButton" class="comfir_bnt" style="display: none;">Comfirm</button>
        </div>
    </form>
</div>

<div class="form_container">
    <form action="{{route('comfirm_order')}}" method="post" enctype="multipart/form-data">
    @csrf
        <ol class="steps">
            <li class="step is-complete" data-step="1">
                <a href="">Shopping cart</a>
            </li>
            <li class="step is-complete">
                <a href="">Payment</a>
            </li>
            <li class="step is-active" data-step="3">
                <a href="">Confirm</a>
            </li>
        </ol>
        <div class="input_file">
            <p><strong>Phone:</strong><span id="phone" name="phone"></span></p>
            <input type="text" name="confirm_phone" id="confirm_phone" hidden>
        </div>
        <div class="input_file">
            <p><strong>Telegram name:</strong><span id="telegrame_name" name="telegram"></span></p>
            <input type="text" name="confirm_telegram" id="confirm_telegram" hidden>
        </div>
        <div class="input_file">
        <p><strong>shipping address:</strong><span id="shipping_address" name="shipping_address"></span></p>
            <input type="text" name="confirm_shipping" id="confirm_shipping" hidden>
        </div>
        <div id="img" style="width: 150px; height:150px; margin-bottom: 10px;">
            <img id="previewImage_comfirm" src="" alt="Preview" width="100%" height="100%" name="screen_short">
            <input type="file" name="confirm_screen_short" id="confirm_screen_short" hidden>
        </div>
        <div class="input_file">
            <a class="back-button" onclick="moveBack()">Back</a>
            <button  id="confirmButton" class="comfir_bnt">Comfirm</button>
        </div>
    </form>
</div>
@endsection
@push('scripts')
    <script>
        $('.fa-circle-xmark').click(function() {
            $('.row-message').hide()
        })
        const imageInput = document.getElementById('image');
        const imagePreview = document.getElementById('imagePreview');
        const previewImage = document.getElementById('previewImage');
        imageInput.addEventListener('change', function() {
            const confirm_screen_short = document.getElementById('confirm_screen_short');
            if (imageInput.files.length > 0) {
                const selectedFile = imageInput.files[0];
                confirm_screen_short.files = imageInput.files;
            }
            if (this.files && this.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    previewImage.src = e.target.result;
                    imagePreview.style.display = 'block';
                }
                
                reader.readAsDataURL(this.files[0]);
            }
        });
     $(document).ready(function() {
        function moveToNextForm() {
            const phone = document.getElementById('phone').innerHTML = document.getElementById('phone_in').value;
            const telegrame_name = document.getElementById('telegrame_name').innerHTML = document.getElementById('telegram').value;
            const shipping_address = document.getElementById('shipping_address').innerHTML = document.getElementById('address').value;
            const confirm_phone = document.getElementById('confirm_phone').value = document.getElementById('phone_in').value;
            const confirm_telegram = document.getElementById('confirm_telegram').value = document.getElementById('telegram').value;
            const confirm_shipping = document.getElementById('confirm_shipping').value = document.getElementById('address').value;
            var currentFormContainer = $('.form_container.is_active');
            var nextFormContainer = currentFormContainer.next('.form_container');
            const imageInput = document.getElementById('image');
            const previewImage = document.getElementById('previewImage_comfirm')
            if (imageInput.files && imageInput.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    previewImage.src = e.target.result;
                    imagePreview.style.display = 'block';
                };
                reader.readAsDataURL(imageInput.files[0]);
            } else {
                // Handle the case when no image is selected or the input is empty
                previewImage.src = ''; // Clear the image source
            }

            if (nextFormContainer.length > 0) {
                currentFormContainer.removeClass('is_active');
                nextFormContainer.addClass('is_active');
            }
            }
            $('.form_container.is_active .input_file a[href="#"]').on('click', function(e) {
                    e.preventDefault();
                    if(
                        document.getElementById('phone_in').value !==''&&
                        document.getElementById('telegram').value !==''&&
                        document.getElementById('address').value !==''&&
                        imageInput.value !== ''
                    ){
                        moveToNextForm();
                    }else{
                         var alert_message_block = document.querySelector('.row-message')
                         alert_message_block.style.display = 'flex'
                        $('.fa-circle-xmark').click(function() {
                            $('.row-message').hide()
                        })
                       const alert_message = document.getElementById('error')
                       alert_message.innerText = "Please enter input all information about your order!"
                    }
            });
        });
        function moveBack() {
            var currentFormContainer = $('.form_container.is_active');
            var previousFormContainer = currentFormContainer.prev('.form_container');
            if (previousFormContainer.length > 0) {
                currentFormContainer.removeClass('is_active');
                previousFormContainer.addClass('is_active preview');
            }
        }
    </script>
@endpush
