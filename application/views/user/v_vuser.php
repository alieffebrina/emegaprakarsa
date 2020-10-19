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

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Tambah Data User</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <div class="form-horizontal">
            <?php foreach ($user as $user) { ?>
              <div class="box-body">
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Nama User</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $user->nama ?>" readonly>
                    <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $user->id_user ?>" required>
                  </div>
                </div>                
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Provinsi</label>
                  <div class="col-sm-9">
                    <select class="form-control select2" id="prov" name="prov" style="width: 100%;" readonly>
                      <option value="">--Pilih--</option>
                      <?php foreach ($provinsi as $provinsi) { ?>
                      <option value="<?php echo $provinsi->id_provinsi ?>" <?php if($user->id_provinsi == $provinsi->id_provinsi){ echo "selected";} ?> ><?php echo $provinsi->name_prov ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Kota/Kabupaten</label>
                  <div class="col-sm-9">
                  <select class="form-control select2" id="kota" name="kota" style="width: 100%;" readonly>
                      <option value="<?php echo $user->id_kota ?>" ><?php echo $user->name_kota ?></option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Kecamatan</label>
                  <div class="col-sm-9">
                  <select class="form-control select2" id="kecamatan" name="kecamatan" style="width: 100%;" readonly>
                      <option value="<?php echo $user->id_kecamatan ?>" ><?php echo $user->kecamatan ?></option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Alamat</label>
                  <div class="col-sm-9">
                    <textarea class="form-control" rows="3" id="alamat" name="alamat" readonly><?php echo $user->alamat ?></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Telepon</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="tlp" name="tlp" value="<?php echo $user->tlp ?>" readonly maxlength="12" minlength="6" onkeypress="return Angkasaja(event)">
                  </div>
                </div>             
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Jabatan</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="jabatan" name="jabatan" value="<?php echo $user->jabatan ?>" readonly>
                  </div>
                </div>             
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Departemen</label>
                  <div class="col-sm-9">
                    <select class="form-control select2" id="dept" name="dept" style="width: 100%;" readonly>
                      <option value="">--Pilih--</option>
                      <?php foreach ($dept as $dept) { ?>
                      <option value="<?php echo $dept->id_dept ?>" <?php if($user->id_dept == $dept->id_dept){ echo "selected"; } ?>><?php echo $dept->dept ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>             
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Tipe User</label>
                  <div class="col-sm-9">
                    <select class="form-control select2" id="tipe" name="tipe" style="width: 100%;" readonly>
                      <option value="">--Pilih--</option>
                      <?php foreach ($tipe as $tipe) { ?>
                      <option value="<?php echo $tipe->id_tipeuser ?>"  <?php if($user->id_tipeuser == $tipe->id_tipeuser){ echo "selected"; } ?>><?php echo $tipe->tipeuser ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Username</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="username" name="username" value="<?php echo $user->username ?>" readonly>
                  </div>
                </div>     
                <?php } ?>                  
              <div class="box-footer">
                  <div class="col-sm-10">
                    <a href="<?php echo site_url('User'); ?>" class="btn btn-default">Batal</a>
                  </div>
              </div>
              <!-- /.box-footer -->
            </div>
          </div>
          <!-- /.box -->
        </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>