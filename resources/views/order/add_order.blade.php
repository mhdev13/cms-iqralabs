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
            <h1 class="h3 mb-0 text-gray-800">Add Order</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item">Home</a></li>
              <li class="breadcrumb-item">Order</li>
              <li class="breadcrumb-item active" aria-current="page">Add Order</li>
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
                  <form action="/order/store" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" name="id"> <br/>
                    <div class="form-group">
                        <label for="firstname">First Name</label>
                        <input type="text" class="form-control" name="first_name">
                    </div>
                    <div class="form-group">
                        <label for="lastname">Last Name</label>
                        <input type="text" class="form-control" name="last_name">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" name="email">
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="number" class="form-control" name="phone">
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" name="address_1">
                    </div>
                    <div class="form-group">
                        <label for="city">City</label>
                        <input type="text" class="form-control" name="city">
                    </div>
                    <div class="form-group"> 
                      <label for="product">Product</label>
                      @if($products)
                        @foreach($products as $index => $list)
                        <?php
                        dd($list->id);
                        ?>
                        <select class="form-control" id="product" name="product">
                          <option value="Cod">Cod</option>
                      </select>
                        @endforeach
                      @endif 
                    </div>
                    <div class="form-group">
                        <label for="payment_method_title">Payment Method Tilte</label>
                        <select class="form-control" id="payment_method_title" name="payment_method_title">
                            <option value="Cod">Cod</option>
                            <option value="Xendit Gateway">Xendit Gateway</option>
                            <option value="Bank Transfer - BCA">Bank Transfer - BCA</option>
                            <option value="Bank Transfer - BNI">Bank Transfer - BNI</option>
                            <option value="Bank Transfer - BRI">Bank Transfer - BRI</option>
                            <option value="Bank Transfer - BSI">Bank Transfer - BSI</option>
                            <option value="Bank Transfer - BJB">Bank Transfer - BJB</option>
                            <option value="Bank Transfer - MANDIRI">Bank Transfer - MANDIRI</option>
                            <option value="Bank Transfer - Permata">Bank Transfer - Permata</option>
                            <option value="Bayar di Alfamart Group">Bayar di Alfamart Group</option>
                            <option value="Bayar di Indomaret">Bayar di Indomaret</option>
                            <option value="ShopeePay">ShopeePay</option>
                            <option value="OVO">OVO</option>
                            <option value="DANA">DANA</option>
                            <option value="LinkAja">LinkAja</option>
                            <option value="Direct Debit BRI">Direct Debit BRI</option>
                            <option value="Direct Debit BPI">Direct Debit BPI</option>
                            <option value="GrabPay">GrabPay</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="total">Total (Rp)</label>
                        <input type="number" class="form-control" name="total">
                    </div>
                    <div class="form-group">
                        <label for="status">Payment Status</label>
                        <select class="form-control" id="status" name="status">
                            <option value="processing">Processing</option>
                            <option value="on-hold">On-hold</option>
                            <option value="completed">Completed</option>
                            <option value="cancelled">Cancelled</option>
                            <option value="failed">Failed</option>
                        </select>
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