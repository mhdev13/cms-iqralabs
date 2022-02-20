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
            <h1 class="h3 mb-0 text-gray-800">Edit Report</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item">Home</a></li>
              <li class="breadcrumb-item">Report</li>
              <li class="breadcrumb-item active" aria-current="page">Edit Report Monthly</li>
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
                @foreach($report as $list)
                  <form action="/report/update" method="post" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  <input type="hidden" name="id" value="{{ $list->id }}"> <br/>
                    <div class="form-group">
                    <label for="year">Year</label>
                    <select class="form-control" id="year" name="year" required="required">
                        <option value="2022" {{ $list->year == "2022" ? 'selected' : ''}}>2022</option>
                        <option value="2021" {{ $list->year == "2021" ? 'selected' : ''}}>2021</option>
                        <option value="2020" {{ $list->year == "2020" ? 'selected' : ''}}>2020</option>
                        <option value="2019" {{ $list->year == "2019" ? 'selected' : ''}}>2019</option>
                    </select>
                    </div>
                    <div class="form-group">
                        <label for="month">month</label>
                        <select class="form-control" id="month" name="month" required="required">
                            <option value="1" {{ $list->month == "1" ? 'selected' : ''}}>January</option>
                            <option value="2" {{ $list->month == "2" ? 'selected' : ''}}>February</option>
                            <option value="3" {{ $list->month == "3" ? 'selected' : ''}}>March</option>
                            <option value="4" {{ $list->month == "4" ? 'selected' : ''}}>April</option>
                            <option value="5" {{ $list->month == "5" ? 'selected' : ''}}>May</option>
                            <option value="6" {{ $list->month == "6" ? 'selected' : ''}}>June</option>
                            <option value="7" {{ $list->month == "7" ? 'selected' : ''}}>July</option>
                            <option value="8" {{ $list->month == "8" ? 'selected' : ''}}>August</option>
                            <option value="9" {{ $list->month == "9" ? 'selected' : ''}}>September</option>
                            <option value="10" {{  $list->month == "10" ? 'selected' : ''}}>October</option>
                            <option value="11" {{  $list->month == "11" ? 'selected' : ''}}>November</option>
                            <option value="12" {{  $list->month == "12" ? 'selected' : ''}}>December</option>
                        </select>
                    </div>
                    <div class="form-group">
                    <label for="">Count</label>
                    <input type="number" class="form-control" name="count" value="{{ $list->count }}" required="required">
                    </div>
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
    </div>
  </div>

  <!-- Scroll to top -->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <script src="//cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
  <script>
    var description = document.getElementById("description");
      CKEDITOR.replace(description,{
      language:'en-gb'
    });
    CKEDITOR.config.allowedContent = true;
  </script>

</body>