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
            <h1 class="h3 mb-0 text-gray-800">Add Coupon</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item">Home</a></li>
              <li class="breadcrumb-item">Woocommerce</li>
              <li class="breadcrumb-item active" aria-current="page">Add Coupon</li>
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
                <form action="/coupon/store" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="">Code</label>
                        <input type="text" class="form-control" name="code" required="required">
                    </div>
                    <div class="form-group">
                        <label for="">Amount</label>
                        <input type="number" class="form-control" step="any" name="amount" required="required">
                    </div>
                    <div class="form-group">
                    <label for="discount_type">Discount Type</label>
                    <select class="form-control" id="discount_type" name="discount_type" required="required">
                        <option value="percent">Percentage Discount</option>
                        <option value="fixed_cart">Fixed Cart Discount</option>
                        <option value="fixed_product">Fixed Cart Discount</option>
                    </select>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" name="desc"></textarea>
                    </div>
                    <label for="date">Coupon expiry date</label>
                    <div class="form-group">
                        <div class='input-group date' id='CalendarDateTime'>
                        <input type="date" name="date_expires_gmt" class="form-control">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                        </div>
                    </div>
                    <div class="form-group">
                    <button type="submit" class="btn btn-primary">Save</button>
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
