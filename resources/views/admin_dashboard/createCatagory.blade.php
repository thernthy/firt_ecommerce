@extends('admin_dashboard.layout')

@push('styles')
  <style>
    #creat_catagory{
      margin: auto auto;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      width: 100%;
      margin:2rem 0;
    }
    .img_selected{
      height: 200px;
      width: 200px;
      position: relative;
      border-radius: 10px;
      margin: 10px auto;
    }
    .img_selected i{
      font-size: 1.5rem;
      position: absolute;
      left: -6px;
      top: -10px;
      color: white;
      background-color: #6d7a71;
      padding: 10px;
      border-radius: 50%;
    }
    .img_selected img{
      width: 100%;
      height: 100%;
      border-radius: 10px;
      display: block;
      margin: auto auto;
    }
    .form-group{
      padding: 0px 20px;
      width: 50%;
    }
    .btn-desing{
      border: 1px solid #6d7a71;
      padding: 15px 3rem;
    }
    .btn-desing i{
      margin-right: 10px;
    }
    .btn-desing:hover{
      background-color: #6d7a71;
    }
  </style>
@endpush
@section('content')
    <div class="content-wrapper">
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
            <div class="col-12 mt-5 grid-margin stretch-card">
                <div class="card">
                  <form action="{{route('addCatagory')}}" method="post" id="creat_catagory" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group" style="border-bottom: 1px solid #6d7a71;">
                      <h2>Create catagory</h2>
                    </div>
                    <div class="form-group">
                      <input type="text" class="form-control" name="catagory_name" id="" placeholder="Catagory name..">
                    </div>
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
                    <div class="form-group">
                      <input type="text" class="form-control" name="catagory_description" id="" placeholder="short description..">
                    </div>
                    <!--<div class="form-group">
                      <select id="inputState" class="form-control">
                        <option selected>Choose icons...</option>
                        <option>...</option>
                      </select>
                    </div>-->
                       <button class="btn btn-desing"><i class="fa-solid fa-plus"></i>Create</button>
                  </form>
                </div>
            </div>
    </div>
@endsection
@push('scripts')
    <script>
       function updateSelectedImage() {
        const input = document.getElementById('catagory_img'); // Get the file input element
        const selectedImg = document.getElementById('selected_img'); // Get the img element
        console.log(input.files); 
    // Check if a file is selected
      if (input.files && input.files[0]) {
        const reader = new FileReader();

      // When the file is loaded, set the src attribute of the img element
      reader.onload = function (e) {
        selectedImg.src = e.target.result;
      };

      // Read the selected file as a data URL
      reader.readAsDataURL(input.files[0]);
    }
  }
  // Add an event listener to the file input to trigger the update when a file is selected
    document.getElementById('catagory_img').addEventListener('change', updateSelectedImage);
    </script>
@endpush