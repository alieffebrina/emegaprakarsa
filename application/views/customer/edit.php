<!DOCTYPE html>
<html lang="en">

<head>
  <?php $this->load->view("template/header.php") ?>
</head>

<body id="page-top">

  <div id="wrapper">

    <?php $this->load->view("template/sidebar.php") ?>

    <div id="content-wrapper">

      <div class="container-fluid">
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        General Form Elements
        <small>Preview</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">General Elements</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content" >
      <form action="<?php base_url('mastercustomer/add') ?>">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">

          <!-- Form Element sizes -->
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Different Height</h3>
            </div>
            <div class="box-body">
              <input class="form-control" type="text" name="customer" placeholder="Nama Customer">
              <br>
              <input class="form-control" type="text" name="alamat" placeholder="Alamat">
              <br>
              <input class="form-control" type="text" name="kota" placeholder="Kota">
              <br>
              <input class="form-control" type="text" name="provinsi" placeholder="Provinsi">
              <br>
              <input class="form-control" type="text" name="kecamatan" placeholder="Kecamatan">
              <br>
            </div>
             <button type="submit" class="btn btn-block btn-success" value="save">Tambah</button>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
          <!-- /.box -->

        </div>
        <!--/.col (left) -->
        <!-- right column -->      </div>
      <!-- /.row -->
      </form>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.18
    </div>
    <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->

  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="../../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="../../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
</body>
</html>
