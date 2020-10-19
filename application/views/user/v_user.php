<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data User
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('Welcome'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo site_url('User'); ?>">Data Master</a></li>
        <li class="active">Data User</li>
      </ol>
    </section>
    <div class="box-body">
    <?php if ($this->session->flashdata('Sukses')) { ?>
        <div class="alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h5><i class="icon fa fa-check"></i> Sukses!</h5>
          <?=$this->session->flashdata('Sukses')?>.
        </div>                 
      <?php } ?>
    </div>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data User</h3>
            </div>
            <?php if($aksestambah == 'aktif'){?>
            <div class="box-header">
              <a href="<?php echo site_url('User-add'); ?>"><button type="button" class="btn btn-warning" >Tambah Data</button></a>
            </div>
          <?php } ?>
            <!-- /.box-header -->

            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama User</th>
                  <th>Alamat</th>
                  <th>Tipe User</th>
                  <th>Departemen</th>
                  <th>Jabatan</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php 
                  $no=1;
                  foreach ($cust as $cust) { ?>
                <tr>
                  <td><?php echo $no++; ?></td>
                  <td><?php echo $cust->nama; ?></td>
                  <td><?php echo $cust->alamat.', '.$cust->name_kota.', '.$cust->name_prov;?></td>
                  <td><?php echo $cust->tipeuser; ?></td>
                  <td><?php echo $cust->dept; ?></td>
                  <td><?php echo $cust->jabatan; ?></td>
                  <td>
                    <div class="btn-group">
                      <a href="<?php echo site_url('User-view/'.$cust->id_user); ?>"><button type="button" class="btn btn-success"><i class="fa fa-fw fa-search"></i></button></a>
                      <?php if($aksesedit == 'aktif'){?>
                      <a href="<?php echo site_url('User-edit/'.$cust->id_user); ?>"><button type="button" class="btn btn-info"><i class="fa fa-fw fa-pencil-square-o"></i></button></a>
                    <?php } ?>
                      <?php if($akseshapus == 'aktif'){?>
                      <a href="<?php echo site_url('C_User/hapus/'.$cust->id_user); ?>" onclick="return confirm('Yakin Hapus?')"><button type="button" class="btn btn-danger"><i class="fa fa-fw fa-trash-o"></i></button></a>
                    <?php } ?>
                    </div>
                  </td>
                </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>