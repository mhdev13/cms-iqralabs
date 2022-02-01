@extends('layout.main')
<body id="page-top">
  <div id="wrapper">
    <!-- Sidebar -->
    @include('layout.sidebar')
    <!-- Sidebar -->
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <!-- TopBar -->
        @include('layout.navbar')
        <!-- Topbar -->

        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit Army</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item">Home</a></li>
              <li class="breadcrumb-item">Army</li>
              <li class="breadcrumb-item active" aria-current="page">Edit Army</li>
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
                @foreach($users as $list)
                <form action="/user/update" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" name="id" value="{{ $list->id }}"> <br/>
                    <div class="form-group">
                      <label for="exampleInputEmail1">No Identity</label>
                      <input type="text" class="form-control" name="no_identity" value="{{ $list->no_identity }}" required="required">
                    </div>
                    <div class="form-group">
                      <label for="">Name</label>
                      <input type="text" class="form-control" name="fullname" value="{{ $list->fullname }}" required="required">
                    </div>
                    <div class="form-group">
                      <label for="">Email</label>
                      <input type="email" value="{{$list->email}}" class="form-control" name="email" required="required">
                    </div>
                    <div class="form-group">
                          <label for="">Phone Number</label>
                          <input type="text" value="{{$list->phone_number}}" class="form-control" name="phone_number" required="required">
                        </div>
                        <div class="form-group">
                          <label for="">Agent Code</label>
                          <input type="text" value="{{$list->agent_code}}" class="form-control" name="agent_code" required="required">
                        </div>
                        <div class="form-group">
                          <label for="">Referal Code</label>
                          <input type="text" value="{{$list->referal_code}}" class="form-control" name="referal_code">
                    </div>
                    <div class="form-group">
                      <label for="image">Image</label>
                      <div class="input-group">
                        <div class="col-md-12">
                            <img src="/images/{{ $list->photo }}" id="image" name="image" height="100" width="100">
                        </div>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" name="image"/> 
                          <input type="hidden" name="image" value="{{ $list->photo }}" /> 
                          <label class="custom-file-label" for="image">Choose file</label>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                    <label for="">Address</label>
                    <textarea class="form-control" value="address" id="address" rows="3" name="address" required="required">{{$list->address}}</textarea>
                    </div>
                    <div class="form-group">
                    <label for="status">Status</label>
                    <select class="form-control" id="status" name="status" required="required">
                      <option value="active" {{ $list->status == "active" ? 'selected' : ''}}>Active</option>
                      <option value="pending" {{ $list->status == "pending" ? 'selected' : ''}}>Pending</option>
                      <option value="inactive" {{$list->status == "inactive" ? 'selected' : ''}}>Inactive</option>
                    </select>
                    </div>
                    <br>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <a href="{{ URL::previous() }}" class="btn btn-success">Back</a>
                    </div>
                  </form>
                  @endforeach
                </div>
              </div>
            </div>
          </div>
          <!--Row-->

          <!-- Modal Logout -->
          <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabelLogout">Ohh No!</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <p>Are you sure you want to logout?</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
                  <a href="/logout" class="btn btn-primary">Logout</a>
                </div>
              </div>
            </div>
          </div>

        </div>
        <!---Container Fluid-->
      </div>
      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>copyright &copy; <script> document.write(new Date().getFullYear()); </script>
            </span>
          </div>
        </div>
      </footer>
      <!-- Footer -->
    </div>
  </div>

  <!-- Scroll to top -->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/ruang-admin.min.js"></script>

</body>
