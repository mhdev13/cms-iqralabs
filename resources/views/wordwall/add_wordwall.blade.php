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
            <h1 class="h3 mb-0 text-gray-800">Add Wordwall</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item">Home</a></li>
              <li class="breadcrumb-item">Wordwall</li>
              <li class="breadcrumb-item active" aria-current="page">Add Wordwall</li>
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
                <form action="/Wordwall/store" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                      <label for="">Title</label>
                      <input type="text" class="form-control" name="title" required="required">
                    </div>
                    <!--<div class="form-group">-->
                    <!--  <label for="video">Video</label>-->
                    <!--  <input type="file" type="file" class="form-control" id="video" name="video"><br/>-->
                    <!--</div>-->
                    <div class="form-group">
                      <label for="">Category</label>
                      <input type="text" class="form-control" name="category" required="required">
                    </div>
                    <div class="form-group">
                      <label for="">Description</label>
                      <textarea id="description" class="form-control" name="description" rows="10" cols="50"></textarea>
                    </div>
                    <div class="form-group">
                      <label for="status">Status</label>
                      <select class="form-control" id="status" name="status" required="required">
                        <option value="Published">Published</option>
                        <option value="Draft">Draft</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="image_thumbnail">Image Thumbnail</label>
                      <input type="file" type="file" class="form-control" id="image_thumbnail" name="image_thumbnail"><br/>
                    </div>
                    <div class="form-group">
                      <label for="thumbnail">Thumbnail</label>
                      <select class="form-control" id="thumbnail" name="thumbnail" required="required">
                        <option value="Active">Active</option>
                        <option value="Inactive">Inactive</option>
                      </select>
                    </div>
                    <div class="form-group">
                    <button type="submit" class="btn btn-primary" >Save</button>
                    <a href="{{ URL::previous() }}" class="btn btn-success">Back</a>
                    </div>
                  </form>
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
