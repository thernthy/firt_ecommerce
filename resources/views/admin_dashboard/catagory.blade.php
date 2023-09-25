@extends('admin_dashboard.layout')

@push('styles')
  <style>
    .row.catagroy{
      width: 100%;
      display: block;
      margin: auto auto;
      position: relative;
    }
    .bottom_border {
      border-bottom: 1px solid #52a36b;
    }
    .creat_catagory_button{
      float: right;
      width: 40px;
      height: 40px;
      border-radius: 20px;
      border: 1px solid #52a36b;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    .creat_catagory_button a{
      color: white;
    }
    .function_icon{
      font-size: 1.5rem;
      margin: 0 10px;
      color: #52a36b;
      padding: 5px 5px;
      transition: border .5s, opacity .5s ease;
    }
    .function_icon:nth-child(1){
     color: red;
    }
    .function_icon:hover{
      opacity: .5;
      border: 1px solid #52a36b;
    }
    .catagory_img img{
      width: 149px;
      height: 106px;
    }
  </style>
@endpush
@section('content')
<div class="content-wrapper">
            <div class="row catagroy">
              <div class="col-12 stretch-card">
                  <div class="card">
                    <div class="card-body">
                    @if(session()->has('message_success'))
                      <div class="alert_message">
                          <p class="successFull">{{session()->get('message_success')}}</p>
                            <i class="fa-regular fa-circle-xmark"></i>
                        </div>
                        @elseif(session()->has('message_error'))
                        <div class="alert_message">
                          <p>{{session()->get('message_error')}}</p>
                            <i class="fa-regular fa-circle-xmark"></i>
                        </div>
                        @endif
                      <div class="d-flex flex-row justify-content-between bottom_border">
                        <h3 class="card-title mb-1">Category list</h3>
                        <div class="creat_catagory_button">
                            <a href="{{url('catagory/createCatagory')}}">
                              <strong><i class="fa-solid fa-plus"></i></strong>
                            </a>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-12">
                          <div class="preview-list">
                          @foreach($catagory_list as $catagory)
                            <div class="preview-item border-bottom">
                                  @if(!$catagory->catagory_picture)
                                  <div class="preview-thumbnail catagroy_list">
                                  <div class="preview-icon bg-primary">
                                    <i class="mdi mdi-file-document"></i>
                                  </div>
                                  </div>
                                  @else
                                  <div class="catagory_img bg-primary">
                                    <img src="catagory_img/{{$catagory->catagory_picture}}" alt="">
                                  </div>
                                  @endif
                              <div class="preview-item-content d-sm-flex flex-grow">
                                <div class="flex-grow">
                                  <h6 class="preview-subject">{{$catagory->catagory_name}}</h6>
                                  <p class="text-muted mb-0">{{$catagory->catagory_description}}</p>
                                </div>
                                  <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                    <a href="{{url('/catagory/delete', $catagory->id)}}"><i class="function_icon fa-regular fa-trash-can"></i></a>
                                    <a href="{{url('/catagory/edite', $catagory->id)}}"><i class="function_icon fa-regular fa-pen-to-square"></i></a>
                                  </div>
                                </div>
                              </div>
                            @endforeach
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
    <script>
     
    </script>
@endpush
