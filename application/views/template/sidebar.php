
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?= base_url() ?>assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Alexander Pierce</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li> 

      <?php 
      foreach($menu as $im){ 
       ?>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-share"></i> <span><?php echo $im->menu ?></span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <?php 
          $sub = $this->db->query("select * from tb_submenu where id_menus = $im->id_menu")->result();
          foreach ($sub as $ksub) {
            
          
          ?>
          <ul class="treeview-menu">
            <li><a href="#">

              <i class="fa fa-circle-o"><?php echo  $ksub->submenu ?></i> </a></li>
              <i>jasgdi</i>
            
          </ul>
        </li>
      <?php } ?>
          <?php } ?>
    </section>
    <!-- /.sidebar -->
  </aside>
  <?php // } ?>