<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | Advanced form elements</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="../../plugins/daterangepicker/daterangepicker.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="../../plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="../../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="../../plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="../../plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="../../plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../../index3.html" class="brand-link">
      <img src="../../dist/img/AdminLTELogo.png"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Maungaji</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Admin Maungaji</a>
        </div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item has-treeview menu-open">
              <a href="/user" class="nav-link active">
                <i class="nav-icon fas fa-user"></i>
                <p>
                  Army
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="/user/add" class="nav-link">
                    <i class="fas fa fa-plus-circle nav-icon"></i>
                    <p>Add Army</p>
                  </a>
                </li>
              </ul>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="/user/" class="nav-link">
                    <i class="fas fa-search-plus nav-icon"></i>
                    <p>List Army</p>
                  </a>
                </li>
              </ul>
            </li>
            <!-- <li class="nav-item has-treeview menu-open">
              <a href="/user" class="nav-link active">
                <i class="nav-icon fas fa-user-friends"></i>
                <p>
                  Group
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="/group/add" class="nav-link">
                    <i class="fas fa fa-plus-circle nav-icon"></i>
                    <p>Add Group</p>
                  </a>
                </li>
              </ul>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="/group" class="nav-link">
                    <i class="fas fa-search-plus nav-icon"></i>
                    <p>List Group</p>
                  </a>
                </li>
              </ul>
            </li> -->
          </ul>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
     <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Army</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add Army</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

     <section class="content">
        <div class="container-fluid">
            <section class="content">
              <div class="card">
                <div class="card-body">
                  <table class="table table-bordered">
                  @if ($message = Session::get('failed'))
                  <div class="alert alert-danger" role="alert">
                  {{ $message }}
                  </div>
                  @endif
                    <form action="/user/store" method="post" enctype="multipart/form-data">
                      {{ csrf_field() }}
                      <div class="form-group">
                        <label for="">Identity Number</label>
                        <input type="text" class="form-control" name="no_identity" required="required">
                      </div>
                      <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" class="form-control" name="fullname" required="required">
                      </div>
                      <!-- <div class="form-group">
                        <p><b>Gender</b></p>
                        <label class="radio-inline" style="padding-right:5px">
                          <input type="radio" value="male" name="gender" required="required"> Male
                        </label>
                        <label class="radio-inline">
                          <input type="radio" value="female" name="gender" required="required"> Female
                        </label>
                      </div> -->
                      <!-- <div class="form-group">
                        <p><b>Religion</b></p>
                        <label class="radio-inline" style="padding-right:5px">
                          <input type="radio" value="muslim" name="religion" required="required"> Muslim
                        </label>
                        <label class="radio-inline">
                          <input type="radio" value="other" name="religion" required="required"> Other
                        </label>
                      </div> -->
                      <!-- <div class="form-group">
                        <label>Birthdate</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                          </div>
                          <input type="text" name="birthdate" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask required="required">
                        </div>
                      </div> -->
                      <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" class="form-control" name="email" required="required">
                      </div>
                      <!-- <div class="form-group">
                        <label for="education">Pendidikan:</label>
                        <select class="form-control" id="education" name="education" required="required">
                          <option value="sd">SD</option>
                          <option value="smp">SMP</option>
                          <option value="sma">SMA</option>
                          <option value="s1">S1</option>
                          <option value="other">OTHER</option>
                        </select>
                      </div> -->
                      <div class="form-group">
                        <label for="">Phone Number</label>
                        <input type="text" class="form-control" name="phone_number" required="required">
                      </div>
                      <div class="form-group">
                        <label for="">Agent Code</label>
                        <input type="text" class="form-control" name="agent_code" required="required">
                      </div>
                      <div class="form-group">
                        <label for="image">image</label>
                        <div class="input-group">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" id="image" name="image">
                            <label class="custom-file-label" for="image">Choose file</label>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="">Address</label>
                        <textarea class="form-control" id="address" rows="3" name="address" required="required"></textarea>
                      </div>
                      <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control" id="status" name="status" required="required">
                          <option value="active">Active</option>
                          <option value="pending">Pending</option>
                          <option value="inactive">Inactive</option>
                        </select>
                      </div>
                      <div class="form-group">
                      <button type="submit" class="btn btn-primary" >Save</button>
                      </div>
                    </form>
                  </table>
                </div>
              </div>
            </section>
        </div>
     </section>
  </div>
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="../../plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="../../plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- InputMask -->
<script src="../../plugins/moment/moment.min.js"></script>
<script src="../../plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
<!-- date-range-picker -->
<script src="../../plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="../../plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Bootstrap Switch -->
<script src="../../plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- Page script -->
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()
  })
</script>
<script>
// Add the following code if you want the name of the file appear on select
$(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});
</script>
</body>
</html>
