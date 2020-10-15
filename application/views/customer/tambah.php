


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
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
              <h3 class="box-title">Tambah Data</h3>
            </div>
            <div class="box-body">
              <label> Nama </label>
              <input class="form-control" type="text" name="customer" placeholder="Nama Customer">
              <br>
              <label>Alamat</label>
              <input class="form-control" type="text" name="alamat" placeholder="Alamat">
              <br>
              <div class="form-group">
                <label>Provinsi</label>
                  <select class="form-control">
                    <?php 
                foreach($name_prov as $p){
                 ?>
                    <option><?php echo $p->name_prov ?></option>
                  <?php } ?>
                  </select>
              </div>
              <br>
              <div class="form-group">
                <label>Kota</label>
                  <select class="form-control">
                    <?php 
                foreach($name_kota as $k){
                 ?>
                    <option><?php echo $k->name_kota ?></option>
                  <?php } ?>
                  </select>
              </div>
              <br>
              <div class="form-group">
                <label>Kecamatan</label>
                  <select class="form-control">
                    <option>option 1</option>
                    <option>option 2</option>
                    <option>option 3</option>
                    <option>option 4</option>
                    <option>option 5</option>
                  </select>
              </div>
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

  <!-- Control Sidebar -->

  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
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
