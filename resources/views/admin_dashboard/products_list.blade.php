@extends('admin_dashboard.layout')

@push('styles')
<link rel="stylesheet" href="{{asset('admin/assets/css/view_product_style.css')}}">
  <style>
    
  </style>
@endpush
@section('content')
<div class="content-wrapper">
<div class="row ">
  @if(session()->has('message_success'))
                        <div class="alert_message col-12">
                        <p class="successFull">{{session()->get('message_success')}}</p>
                            <i class="fa-regular fa-circle-xmark"></i>
                        </div>
  @elseif(session()->has('message_error'))
    <div class="alert_message col-12">
      <p>{{session()->get('message_error')}}</p>
      <i class="fa-regular fa-circle-xmark"></i>
    </div>
  @endif
    <div class="col-12 grid-margin mt-5">
        <div class="card">
            <div class="card-body">
              <div class="title_container">
                  <h3 class="card-title">Order Status</h3>
                  <div class="creat_catagory_button">
                            <a href="{{url('product/add')}}">
                              <strong><i class="fa-solid fa-plus"></i></strong>
                             </a>
                    </div>
                </div>
                    <div class="table-responsive">
                      <table class="table products">
                        <thead>
                          <tr>
                            <th> Products name</th>
                            <th> Instock </th>
                            <th> Price </th>
                            <th>Cost</th>
                            <th> Viewer </th>
                            <th colspan="3"></th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($get_products as $product)
                          <tr>
                            <td>
                              <img onclick="view_product_img()" src="{{ asset('products_img/'.$product->photo) }}" alt="image" />
                              <span class="pl-2">{{$product->name}}</span>
                            </td>
                            <td>{{$product->int_stock}}</td>
                            <td>$ {{$product->price}}</td>
                            <td>{{$product->product_cost}}</td>
                            <td>10</td>
                            <td><a href="{{url('product/view', $product->slug )}}"><i class="fa-regular fa-eye"></i></a></td>
                            <td>
                                <a href="{{url('/product/edit', $product->slug )}}"><i class="fa-regular fa-pen-to-square edit"></i></a>
                            </td>
                            <td>
                              <a href="{{url('product/delete', $product->slug )}}"><i class="fa-regular fa-trash-can delet"></i></a>
                            </td>
                          </tr>
                          @endforeach
                          <!--<tr>
                            <td>
                              <img onclick="view_product_img()" src="{{asset('img/myanmar.png')}}" alt="image" />
                              <span class="pl-2">Henry Klein</span>
                            </td>
                            <td> 02312 </td>
                            <td> $14,500 </td>
                            <td> Dashboard </td>
                            <td> Credit card </td>
                            <td><i class="fa-regular fa-eye"></i></td>
                            <td>
                              <i class="fa-regular fa-pen-to-square edit"></i>
                            </td>
                            <td>
                              <i class="fa-regular fa-trash-can delet"></i>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <img onclick="view_product_img()"src="{{asset('img/myanmar.png')}}" alt="image" />
                              <span class="pl-2">Henry Klein</span>
                            </td>
                            <td> 02312 </td>
                            <td> $14,500 </td>
                            <td> Dashboard </td>
                            <td> Credit card </td>
                            <td><i class="fa-regular fa-eye"></i></td>
                            <td>
                              <i class="fa-regular fa-pen-to-square edit"></i>
                            </td>
                            <td>
                              <i class="fa-regular fa-trash-can delet"></i>
                            </td>
                          </tr>-->
                        </tbody>
                      </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="img_container">
        <i class="fa-regular fa-circle-xmark close_showing" onclick="view_product_close()"></i>
        <img src="{{asset('img/myanmar.png')}}" alt="" width="100%" height="100%">
    </div>
</div>    
@endsection

@push('scripts')
    <script>
      function view_product_img() {
        $('.img_container').slideDown(500)
      }
      function view_product_close() {
        $('.img_container').slideUp(500)
      }
    </script>
@endpush

