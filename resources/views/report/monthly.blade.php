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
            <h1 class="h3 mb-0 text-gray-800">Report</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item">Home</a></li>
              <li class="breadcrumb-item">Report</li>
              <li class="breadcrumb-item active" aria-current="page">Monthly Report</li>
            </ol>
          </div>

          <!-- Row -->
          <div class="row">
            <!-- Datatables -->
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header">
                  @if(Session::has('flash_message'))
                  <div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_message') !!}</em></div>
                  @endif
                  <a href="/report/create" class="btn btn-success"><i class="fas fa fa-plus-circle nav-icon"></i> Add Report </a>
                </div>
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush" id="dataTable">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Year</th>
                      <th>Month</th>
                      <th>Count</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($report as $index => $list)
                        <?php
                        if($list->month == '1'){
                            $month = 'January'; 
                        } elseif ($list->month == '2') {
                            $month = 'February';
                        } elseif ($list->month == '3'){
                            $month = 'March';
                        } elseif ($list->month == '4'){
                            $month = 'April';
                        } elseif ($list->month == '5'){
                            $month = 'May';
                        } elseif ($list->month == '6'){
                            $month = 'June';
                        } elseif ($list->month == '7'){
                            $month = 'July';
                        } elseif($list->month == '8'){
                            $month = 'Augutst';
                        } elseif($list->month == '9'){
                            $month = 'September';
                        } elseif( $list->month == '10'){
                            $month = 'October';
                        } elseif( $list->month == '11'){
                            $month = 'November';
                        } elseif( $list->month == '12'){
                            $month = 'December';
                        } else {
                            $month = '-';
                        }
                        ?>
                    <tr>
                      <td>{{ $index +1 }}</td>
                      <td>{{ $list->year }}</td>
                      <td>{{ $month }}</td>
                      <td>{{ $list->count }}</td>
                      <td width="100">
                        <a href="/report/edit/{{ $list->id }}"
                            class="btn btn-primary btn-sm"><i class="fas fa-edit"></i>Edit</a>
                            <br>
                            <br>
                        <a href="/report/destroy/{{ $list->id }}" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i>Delete</a>
                    </td>
                    </tr>
                    @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <!--Row-->

          <!-- Documentation Link -->
          <div class="row">
            <div class="col-lg-12">
              
            </div>
          </div>

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

  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/ruang-admin.min.js"></script>
  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script>
    $(document).ready(function () {
      $('#dataTable').DataTable(); // ID From dataTable 
      $('#dataTableHover').DataTable(); // ID From dataTable with Hover
    });
  </script>

</body>

