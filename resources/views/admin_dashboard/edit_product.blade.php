@extends('admin_dashboard.layout')
@push('styles')
<link rel="stylesheet" href="{{asset('admin/assets/css/add_product_style.css')}}">
  <style>
   
  </style>
@endpush
@section('content')
<div class="content-wrapper">
    <div class="input_products_container">
        <form action="{{url('psaveedite', $edit_product_target->product_id)}}" method="post" enctype="multipart/form-data">
            @csrf
             <div class="input_block">
                    @if(session()->has('message_success'))
                      <div class="row">
                        <div class="alert_message col-12">
                        <p class="successFull">{{session()->get('message_success')}}</p>
                            <i class="fa-regular fa-circle-xmark"></i>
                        </div>
                      </div>
                    @elseif(session()->has('message_error'))
                        <div class="row">
                            <div class="alert_message col-12">
                            <p>{{session()->get('message_error')}}</p>
                                <i class="fa-regular fa-circle-xmark"></i>
                            </div>
                        </div>
                    @endif
                <h3><strong>Create product</strong></h3>
                <div class="row">
                    <div class="col-6">
                        <div class="user-box">
                            <input type="text" value="{{$edit_product_target->name}}" name="product_name" required="">
                            <label>Product name</label>
                        </div>
                    </div>
                    <div class="col-6"
                        style="display:flex; align-items:center;"
                        >
                        <div class="user-box">
                            <select class="form-select" aria-label="Default select example" name="products_category">
                                <option selected>{{$edit_product_target->category}}</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-12 pr-4 pl-4">
                    <textarea class="product_der" placeholder="Description..." name="description" rows="4" cols="50" style="width: 100%;">{{$edit_product_target->description}}</textarea>
                   </div>
                </div>
                <div class="row">
                    <div class="col-6 check_avirable_for_sele">
                        @if(!$edit_product_target->product_available_for_sale)
                        <input class="check_boxs" id="available_for_sale" type="checkbox" value="yes" name="available_for_sale">
                        <label for="available_for_sale">The item is available for sale</label>
                        @else
                        <input class="check_boxs" id="available_for_sale" type="checkbox" value="no" name="available_for_sale" checked>
                        <label for="available_for_sale">The item is available for sale</label>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="user-box">
                            <input type="number" value="{{$edit_product_target->price}}" name="price" required="">
                            <label>Price</label>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="user-box">
                            <input type="number" value="{{$edit_product_target->product_cost}}" name="cost" required="">
                            <label>Cost</label>
                        </div>
                    </div>
                </div>
             </div>
             <div class="input_block inventory_block">
                <h3><strong>Inventory</strong></h3>
                <div class="row track_stock">
                    <p>Track stock</p>
                </div>
                <div class="row" id="inventory_board">
                    <div class="col-6">
                        <div class="user-box">
                            <input type="number" value="{{$edit_product_target->int_stock}}" name="in_stock">
                            <label>In stock</label>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="user-box">
                            <input type="number" value="{{$edit_product_target->low_stock}}" name="low_stock">
                            <label>Low stock</label>
                        </div>
                    </div>
                </div>
             </div>
             <div class="input_block" style="position:relative;">
                <div class="col-6">
                    <div class="form-group">
                      <label for="catagory_img">
                        <div class="img_selected">
                          <i class="fa-regular fa-images"></i>
                          <img id="selected_img" src="{{asset('products_img/'.$edit_product_target->photo)}}" alt="">
                        </div>
                        </label>
                        <input type="file" class="form-control" name="products_img" id="catagory_img" style="display: none;" value="{{$edit_product_target->photo}}">
                    </div>
                </div>
                <button><i class="fa-regular fa-floppy-disk"></i><strong>Save</strong></button>
             </div>
        </form>
    </div>           
</div>    
@endsection
@push('scripts')
<script src="{{asset('admin/assets/product_js.js')}}" ></script>
<script>

</script>
@endpush
