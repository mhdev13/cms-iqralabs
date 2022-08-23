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
            <h1 class="h3 mb-0 text-gray-800">Edit Coupon</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item">Home</a></li>
              <li class="breadcrumb-item">Coupon</li>
              <li class="breadcrumb-item active" aria-current="page">Edit Coupon</li>
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
                  <form action="/coupon/update" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" name="id" value="{{ $coupons['id'] }}"> <br/>
                    <div class="form-group">
                        <label for="code">Code</label>
                        <input type="text" class="form-control" name="code" value="{{ $coupons['code'] }}">
                    </div>
                    <div class="form-group">
                        <label for="amount">Amount (Rp)</label>
                        <input type="number" class="form-control" name="amount" value="{{ $coupons['amount'] }}">
                    </div>
                    <div class="form-group">
                        <label for="discount_type">Discount Type</label>
                        <select class="form-control" id="discount_type" name="discount_type">
                            <option value="percent" {{ $coupons['discount_type'] == "percent" ? 'selected' : ''}}>Percentage discount</option>
                            <option value="fixed_cart" {{ $coupons['discount_type'] == "fixed_cart" ? 'selected' : ''}}>Fixed cart discount</option>
                            <option value="fixed_product" {{ $coupons['discount_type'] == "fixed_product" ? 'selected' : ''}}>Fixed percentage discount</option>
                        </select>
                    </div> 
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" name="desc">{{$coupons['description']}}</textarea>
                    </div>
                    <label for="date">Coupon expiry date</label>
                    <div class="form-group">
                        <div class='input-group date' id='CalendarDateTime'>
                        <input type="date" value="{{Carbon\Carbon::parse($coupons['date_expires_gmt'])->format('Y-m-d')}}" name="date_expires_gmt" class="form-control">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <input type="text" class="form-control" name="status" value="{{ $coupons['status'] }}" readonly>
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