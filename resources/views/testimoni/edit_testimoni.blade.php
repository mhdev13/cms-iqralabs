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
            <h1 class="h3 mb-0 text-gray-800">Edit Testimoni</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item">Home</a></li>
              <li class="breadcrumb-item">Testimoni</li>
              <li class="breadcrumb-item active" aria-current="page">Edit Testimoni</li>
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
                @foreach($testimoni as $list)
                  <form action="/testimoni/update" method="post" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  <input type="hidden" name="id" value="{{ $list->id }}"> <br/>
                  <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" class="form-control" name="fullname" value="{{ $list->fullname }}" required="required">
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
                  <br>
                  <div class="form-group">
                    <label for="">Comment</label>
                    <textarea id="description" class="form-control" value="comment" id="comment" rows="3" name="comment">{{$list->comment}}</textarea>
                  </div>
                  <div class="form-group">
                  <label for="from_who">From Who</label>
                  <select class="form-control" id="from_who" name="from_who" required="required">
                    <option value="guru" {{ $list->from_who == "guru" ? 'selected' : ''}}>Guru</option>
                    <option value="santri" {{ $list->from_who == "santri" ? 'selected' : ''}}>Santri</option>
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
