@extends('admin_dashboard.layout')

@push('styles')
  <style>
   .action_button a{
     padding: 10px 15px;
     border-radius: 10px;
     background-color: #6d7a71;
     text-decoration: none;
     color: green;
     margin: 10px 10px;
     transition: opacity .5s ;
   }
   .action_button a:hover{
    opacity: .5;
   }
   .action_button a:nth-child(2){
    color: red;
   }
  </style>
@endpush
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
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
              <div class="col-12">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">{{$get_view_product->name}}</h4>
                    <div class="row">
                      <div class="col-md-5">
                        <div class="table-responsive">
                          <table class="table">
                            <tbody>
                              <tr>
                                  <td>price:</td>
                                <td class="text-right">{{$get_view_product->price}}</td>
                              </tr>
                              <tr>
                                <td>Cost:</td>
                                <td class="text-right">{{$get_view_product->product_cost}}</td>
                              </tr>
                              <tr>
                                <td>category:</td>
                                <td class="text-right">{{$get_view_product->category}}</td>
                              </tr>
                              <tr>
                                @if($get_view_product->int_stock == $get_view_product->low_stock)
                                <td>Low_stock:</td>
                                <td class="text-right"><strong style="
                                padding: 5px 20px; background-color:red;border-radius:10px;
                                color:white;
                                ;">{{$get_view_product->low_stock}}</strong></td>
                                @else
                                <td>In_stock:</td>
                                <td class="text-right">{{$get_view_product->int_stock}} pcs</td>
                                @endif
                              </tr>
                              <tr>
                                 <td>Available for sale</td>
                                <td class="text-right">
                                  @if(!$get_view_product->product_available_for_sale || $get_view_product->product_available_for_sale == 'No')
                                    <p style="color:red;">No</p>
                                  @else
                                  <p style="color:green;">{{$get_view_product->product_available_for_sale}}</p>
                                  @endif
                                </td>
                              </tr>
                              <tr>
                                <td style="color: white;" colspan="2">{{$get_view_product->description}}</td>
                              </tr>
                              <tr>
                                <td  colspan="2">
                                <div class="action_button">
                                  <a href="{{url('/product/edit', $get_view_product->product_id)}}"><i class="fa-regular fa-pen-to-square edit"></i>Edit</a>
                                  <a href="{{url('product/delete', $get_view_product->product_id)}}"><i class="fa-regular fa-trash-can delet"></i>delete</a>
                                  </div>
                              </td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
                      <div class="col-md-7">
                        <div class="vector-map">
                          <img src="{{asset('products_img/'.$get_view_product->photo)}}" 
                          alt="" height="300px" width="300px"
                          style="display: block; margin:auto auto;"
                          >
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
          </div>
    </div>
</div>
@endsection
@push('scripts')
<script></script>
@endpush
