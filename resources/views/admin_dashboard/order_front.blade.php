@extends('admin_dashboard.layout')

@push('styles')
  <style>

  </style>
@endpush
@section('content')
    <div class="main-panel">
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
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Order Status</h4>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th> Client Name </th>
                            <th> Order No </th>
                            <th> Product Cost </th>
                            <th> Project </th>
                            <th> Payment Mode </th>
                            <th> Start Date </th>
                            <th>Order Status </th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($Order_items as $order_item)
                          <tr>
                            <td>
                              <!--<img src="assets/images/faces/face1.jpg" alt="image" />-->
                              <span class="pl-2">{{$order_item->name}}</span>
                            </td>
                            <td> {{$order_item->order_id}} </td>
                            <td> {{$order_item->total_amount}}  </td>
                            <td> {{$order_item->shipping_address}} </td>
                            <td> {{$order_item->telegram_name}}</td>
                            <td> {{$order_item->telegram_name}}</td>
                            <td> {{$order_item->order_date}}</td>
                            <td>
                              <a href="" class="badge 
                              <?php 
                              if($order_item->status=='pending'){echo'badge-outline-warning';}elseif($order_item->status=='Proccess'){echo'badge-outline-primary';}else{echo'badge-outline-success';}?>
                              ">{{$order_item->status}}</a>
                            </td>
                          </tr>
                          @endforeach
                          <tr>
                            <td>
                              <img src="assets/images/faces/face2.jpg" alt="image" />
                              <span class="pl-2">Estella Bryan</span>
                            </td>
                            <td> 02312 </td>
                            <td> $14,500 </td>
                            <td> Website </td>
                            <td> Cash on delivered </td>
                            <td> 04 Dec 2019 </td>
                            <td>
                              <a href="" class="badge badge-outline-warning">Pending..</a>
                            </td>
                          </tr>
                          <!--<tr>
                            <td>
                              <div class="form-check form-check-muted m-0">
                                <label class="form-check-label">
                                  <input type="checkbox" class="form-check-input">
                                </label>
                              </div>
                            </td>
                            <td>
                              <img src="assets/images/faces/face5.jpg" alt="image" />
                              <span class="pl-2">Lucy Abbott</span>
                            </td>
                            <td> 02312 </td>
                            <td> $14,500 </td>
                            <td> App design </td>
                            <td> Credit card </td>
                            <td> 04 Dec 2019 </td>
                            <td>
                              <div class="badge badge-outline-danger">Rejected</div>
                            </td>
                          </tr>-->
                          <tr>
                            <td>
                              <img src="assets/images/faces/face3.jpg" alt="image" />
                              <span class="pl-2">Peter Gill</span>
                            </td>
                            <td> 02312 </td>
                            <td> $14,500 </td>
                            <td> Development </td>
                            <td> Online Payment </td>
                            <td> 04 Dec 2019 </td>
                            <td>
                              <a href="" class="badge badge-outline-primary">Proccess..</a>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <img src="assets/images/faces/face4.jpg" alt="image" />
                              <span class="pl-2">Sallie Reyes</span>
                            </td>
                            <td> 02312 </td>
                            <td> $14,500 </td>
                            <td> Website </td>
                            <td> Credit card </td>
                            <td> 04 Dec 2019 </td>
                            <td>
                              <div class="badge badge-outline-success">Approved</div>
                            </td>
                          </tr>
                        </tbody>
                      </table>
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