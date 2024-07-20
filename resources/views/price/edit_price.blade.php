@extends('layout.main')
<body id="page-top">
  <div id="wrapper">
    <!-- Sidebar -->
    @include('layout.sidebar')
    <!-- Sidebar -->
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        
        @include('layout.navbar')

        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit Price</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item">Home</a></li>
              <li class="breadcrumb-item">Price</li>
              <li class="breadcrumb-item active" aria-current="page">Edit Price</li>
            </ol>
          </div>

          <div class="row">
            <div class="col-lg-12">
              <!-- Form Basic -->
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                </div>
                @if ($message = Session::get('failed'))
                  <div class="alert alert-danger" role="alert">
                  {{ $message }}
                  </div>
                @endif
                <div class="card-body">
                {{-- @foreach($price as $list) --}}
                  <form action="/price/update" method="post" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  <input type="hidden" name="id" value="{{ $price['id'] }}"> <br/>
                  <div class="form-group">
                    <label for="package_name">Package Name</label>
                    <input type="text" class="form-control" name="package_name"  value="{{ $price['package_name'] }}" required="required">
                    </div>
                    <div class="form-group">
                    <label for="">Price (Rp)</label>
                    <input type="number" class="form-control" name="price" value="{{ $price['price'] }}" required="required">
                    </div>
                    <div class="form-group">
                        <label for="class_type">Class Type</label>
                        <select class="form-control" id="class_type" name="class_type" required="required">
                            <option value="offline" {{ $price['class_type'] == "offline" ? 'selected' : ''}}>Offline</option>
                            <option value="online" {{ $price['class_type'] == "online" ? 'selected' : ''}}>Online</option>
                        </select>
                    </div>
                    <div class="form-group">
                      <label for="session_type">Class Type</label>
                      <select class="form-control" id="session_type" name="session_type" required="required">
                          <option value="meeting" {{ $price['session_type'] == "meeting" ? 'selected' : ''}}>Meeting</option>
                          <option value="monthly" {{ $price['session_type'] == "monthly" ? 'selected' : ''}}>Monthly</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="service_type">Service Type</label>
                      <select class="form-control" id="session_type" name="service_type" required="required">
                          <option value="online" {{ $price['service_type'] == "online" ? 'selected' : ''}}>Online</option>
                          <option value="home_visit" {{ $price['service_type'] == "home_visit" ? 'selected' : ''}}>Home Visit</option>
                          <option value="learning_center" {{ $price['service_type'] == "learning_center" ? 'selected' : ''}}>Learning Center</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="image">Image</label>
                      <div class="input-group">
                        <div class="col-md-12">
                          <img src="/images/{{ $price['photo'] }}" id="image" name="image" height="100" width="100">
                        </div>
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" name="image"/> 
                          <input type="hidden" name="image" value="{{ $price['photo'] }}" /> 
                          <label class="custom-file-label" for="image">Choose file</label>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                        <label for="">Max Student</label>
                        <input type="number" class="form-control" name="max_student" value="{{ $price['max_student'] }}" required="required">
                    </div>
                    <div class="form-group">
                        <label for="">Learning Duration (minutes)</label>
                        <input type="number" class="form-control" name="learning_duration" value="{{ $price['learning_duration'] }}" required="required">
                    </div>
                    <div class="form-group">
                      <label for="">Description</label>
                      <textarea id="description" class="form-control" value="description" id="description" rows="3" name="description">{{$price['description']}}</textarea>
                    </div>
                    <div class="form-group">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a href="{{ URL::previous() }}" class="btn btn-success">Back</a>
                    </div>
                  </form>
                  {{-- @endforeach --}}
                </div>
              </div>
            </div>
          </div>
          <!--Row-->

          <!-- Modal Logout -->
          @include('layout.modal_logout')
          <!--end-->
          

        </div>
        <!---Container Fluid-->
      </div>
    </div>
  </div>

  <!-- Scroll to top -->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

</body>
