@extends('admin_dashboard.layout')
@push('styles')
<link rel="stylesheet" href="{{asset('admin/assets/css/add_product_style.css')}}">
  <style>
   
  </style>
@endpush
@section('content')
<div class="content-wrapper">
    <div class="input_products_container">
        <form action="" method="post">
             <div class="input_block">
                <h3><strong>Create product</strong></h3>
                <div class="row">
                    <div class="col-6">
                        <div class="user-box">
                            <input type="text" name="" required="">
                            <label>Username</label>
                        </div>
                    </div>
                    <div class="col-6"
                        style="display:flex; align-items:center;"
                        >
                        <div class="user-box">
                            <select class="form-select" aria-label="Default select example">
                                <option selected>Select category...</option>
                                @foreach($catagory_name as $catagory)
                                    <option value="{{$catagory->catagory_name}}">{{$catagory->catagory_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-12 pr-4 pl-4">
                        <textarea class="form-control product_der" 
                            placeholder="Description....">
                        </textarea>
                   </div>
                </div>
                <div class="row">
                    <div class="col-6 check_avirable_for_sele">
                        <input class="check_boxs" type="checkbox" value="" >
                        <label for="">The item is available for sale</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="user-box">
                            <input type="number" name="" required="">
                            <label>Price</label>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="user-box">
                            <input type="number" name="" required="">
                            <label>$00.00</label>
                        </div>
                    </div>
                </div>
             </div>
             <div class="input_block inventory_block">
                <h3><strong>Inventory</strong></h3>
                <div class="row track_stock">
                    <p>Track stock</p>
                    <div class="content" id="inventory_control">
                        <label class="switch">
                            <input type="checkbox" id="toggleInventory">
                            <span class="slider round"></span>
                        </label>
                    </div>
                </div>
                <div class="row board_inactive" id="inventory_board">
                    <div class="col-6">
                        <div class="user-box">
                            <input type="number" name="">
                            <label>In stock</label>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="user-box">
                            <input type="number" name="">
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
                          <img id="selected_img" src="" alt="">
                        </div>
                        </label>
                      <input type="file" class="form-control" name="catagory_img" id="catagory_img" style="display: none;"
                      >
                    </div>
                </div>
                <button><i class="fa-solid fa-circle-plus"></i><strong>Add</strong></button>
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
