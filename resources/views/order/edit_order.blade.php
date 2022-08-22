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
            <h1 class="h3 mb-0 text-gray-800">Edit Order</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item">Home</a></li>
              <li class="breadcrumb-item">Order</li>
              <li class="breadcrumb-item active" aria-current="page">Edit Order</li>
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
                  <form action="/order/update" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" name="id" value="{{ $orders['id'] }}"> <br/>
                    <div class="form-group">
                        <label for="firstname">First Name</label>
                        <input type="text" class="form-control" name="first_name" value="{{ $orders['billing']->first_name }}">
                    </div>
                    <div class="form-group">
                        <label for="lastname">Last Name</label>
                        <input type="text" class="form-control" name="last_name" value="{{ $orders['billing']->last_name }}">
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="number" class="form-control" name="phone" value="{{ $orders['billing']->phone }}">
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" name="address_1" value="{{ $orders['billing']->address_1 }}">
                    </div>
                    <div class="form-group">
                        <label for="city">City</label>
                        <input type="text" class="form-control" name="city" value="{{ $orders['billing']->city }}">
                    </div>
                    <div class="form-group">
                        <label for="payment_method">Payment Method Tilte</label>
                        <select class="form-control" id="payment_method_title" name="payment_method_title">
                            <option value="cod" {{ $orders['payment_method_title'] == "cod" ? 'selected' : ''}}>Cod</option>
                            <option value="xendit_gateway"  {{ $orders['payment_method_title']  == "Xendit Gateway" ? 'selected' : ''}}>Xendit Gateway</option>
                            <option value="xendit_bcava"    {{ $orders['payment_method_title']  == "Bank Transfer - BCA" ? 'selected' : ''}}>Bank Transfer - BCA</option>
                            <option value="xendit_bniva"    {{ $orders['payment_method_title']  == "Bank Transfer - BNI" ? 'selected' : ''}}>Bank Transfer - BNI</option>
                            <option value="xendit_briva"    {{ $orders['payment_method_title']  == "Bank Transfer - BRI" ? 'selected' : ''}}>Bank Transfer - BRI</option>
                            <option value="xendit_bsiva"    {{ $orders['payment_method_title']  == "Bank Transfer - BSI" ? 'selected' : ''}}>Bank Transfer - BSI</option>
                            <option value="xendit_bjbva"    {{ $orders['payment_method_title']  == "Bank Transfer - BJB" ? 'selected' : ''}}>Bank Transfer - BJB</option>
                            <option value="xendit_mandiriva" {{ $orders['payment_method_title'] == "Bank Transfer - MANDIRI" ? 'selected' : ''}}>Bank Transfer - MANDIRI</option>
                            <option value="xendit_permatava" {{ $orders['payment_method_title'] == "Bank Transfer - Permata" ? 'selected' : ''}}>Bank Transfer - Permata</option>
                            <option value="xendit_alfamart" {{ $orders['payment_method_title']  == "Bayar di Alfamart Group" ? 'selected' : ''}}>Bayar di Alfamart Group</option>
                            <option value="xendit_indomaret" {{ $orders['payment_method_title'] == "Bayar di Indomaret" ? 'selected' : ''}}>Bayar di Indomaret</option>
                            <option value="xendit_shopeepay" {{ $orders['payment_method_title'] == "ShopeePay" ? 'selected' : ''}}>ShopeePay</option>
                            <option value="xendit_ovo" {{ $orders['payment_method_title'] == "OVO" ? 'selected' : ''}}>OVO</option>
                            <option value="xendit_dana" {{ $orders['payment_method_title'] == "DANA" ? 'selected' : ''}}>DANA</option>
                            <option value="xendit_linkaja" {{ $orders['payment_method_title'] == "LinkAja" ? 'selected' : ''}}>LinkAja</option>
                            <option value="xendit_dd_bri" {{ $orders['payment_method_title'] == "Direct Debit BRI" ? 'selected' : ''}}>Direct Debit BRI</option>
                            <option value="xendit_dd_bpi" {{ $orders['payment_method_title'] == "Direct Debit BPI" ? 'selected' : ''}}>Direct Debit BPI</option>
                            <option value="xendit_grabpay" {{ $orders['payment_method_title'] == "GrabPay" ? 'selected' : ''}}>GrabPay</option>
                            <option value="other" {{ $orders['payment_method_title'] == "Other" ? 'selected' : ''}}>Other</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="total">Total (Rp)</label>
                        <input type="number" class="form-control" name="total" value="{{ $orders['total'] }}">
                    </div>
                    <div class="form-group">
                        <label for="status">Payment Status</label>
                        <select class="form-control" id="status" name="status">
                            <option value="processing" {{ $orders['status'] == "processing" ? 'selected' : ''}}>Processing</option>
                            <option value="on-hold" {{ $orders['status'] == "on-hold" ? 'selected' : ''}}>On-hold</option>
                            <option value="completed" {{ $orders['status'] == "completed" ? 'selected' : ''}}>Completed</option>
                            <option value="cancelled" {{ $orders['status'] == "cancelled" ? 'selected' : ''}}>Cancelled</option>
                            <option value="failed" {{ $orders['status'] == "failed" ? 'selected' : ''}}>Failed</option>
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