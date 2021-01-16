<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Blank Page</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/bootstrap/dist/css/bootstrap.min.css'); ?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/font-awesome/css/font-awesome.min.css'); ?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/Ionicons/css/ionicons.min.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/select2/dist/css/select2.min.css'); ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/AdminLTE.min.css'); ?>">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/skins/_all-skins.min.css'); ?>">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
  

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <!-- Resources -->
<script src="https://www.amcharts.com/lib/4/core.js"></script>
<script src="https://www.amcharts.com/lib/4/charts.js"></script>
<script src="https://www.amcharts.com/lib/4/themes/animated.js"></script>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="../../index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>SiBea</b>SMK N 4 Surakarta</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Notifications: style can be found in dropdown.less -->
          <!-- Notifications: style can be found in dropdown.less -->
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">10</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 10 notifications</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-aqua"></i> 5 new members joined today
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="#">View all</a></li>
            </ul>
          </li>
          <!-- Tasks: style can be found in dropdown.less -->
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <?php if($this->session->userdata('level') == 'admin'){ ?>
              <img src="<?php echo base_url('assets/dist/img/admin.jpg'); ?>" class="user-image" alt="User Image">
              <?php }else{ ?>
              <img src="<?php echo base_url('assets/upload/'.$this->session->userdata('username').'/'.$this->session->userdata('img')); ?>" class="user-image" alt="User Image">
              <?php } ?>
              <span class="hidden-xs"><?php echo $this->session->userdata('nama'); ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
              <?php if($this->session->userdata('level') == 'admin'){ ?>
              <img src="<?php echo base_url('assets/dist/img/admin.jpg'); ?>" class="img-circle" alt="User Image">
              <?php }else{ ?>
                <img src="<?php echo base_url('assets/upload/'.$this->session->userdata('username').'/'.$this->session->userdata('img')); ?>" class="img-circle" alt="User Image">
              <?php } ?>

                <p>
                  <?php echo $this->session->userdata('nama'); ?>
                  <small><?php echo $this->session->userdata('level'); ?></small>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                  </div>
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="<?php echo base_url();?>login/logout" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <?php if($this->session->userdata('level') == 'admin'){ ?>
          <img src="<?php echo base_url('assets/dist/img/admin.jpg'); ?>" class="img-circle" alt="User Image">
          <?php }else{ ?>
            <img src="<?php echo base_url('assets/upload/'.$this->session->userdata('username').'/'.$this->session->userdata('img')); ?>" class="img-circle" alt="User Image">
          <?php } ?>
        </div>
        <div class="pull-left info">
          <p><?php echo $this->session->userdata('nama'); ?></p>
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
        <?php if($this->session->userdata('level') == 'admin'){ ?>
        <li>
          <a href="<?= site_url('dashboard');?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        <?php } ?>

        <?php
            if($_SESSION['level'] == 'admin'){

        ?>
        <li>
          <a href="<?= site_url('siswa/nilaiakhir');?>">
            <i class="fa fa-users"></i> <span>Siswa</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        <?php
          }
        ?>

        <?php
            if($_SESSION['level'] == 'admin'){

        ?>
        <li>
        <a href="<?= site_url('beasiswa');?>">
            <i class="fa fa-book"></i> <span>Beasiswa</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        <?php
          }
        ?>
        <?php
            if($_SESSION['level'] == 'siswa'){
        ?>
	      <li>
        <a href="<?= site_url('siswa/profile');?>">
            <i class="fa fa-user"></i> <span>My Profile</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>

        <li>
        <a href="<?= site_url('beasiswa_siswa/listbea');?>">
            <i class="fa fa-user"></i> <span>Hasil beasiswa saya</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        <?php
            }
        ?>

        <?php
            if($_SESSION['level'] == 'admin'){

        ?>
        <li>
        <a href="<?= site_url('beasiswa_siswa');?>">
            <i class="fa fa-money"></i> <span>Hasil Beasiswa</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
       
        
        <li>
        <a href="<?= site_url('admin');?>">
            <i class="fa fa-user"></i> <span>List Admin</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>

        <li>
        <a href="<?= site_url('admin/update/');echo $_SESSION['id_admin']?>">
            <i class="fa fa-user"></i> <span>Edit Profile</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        <?php
          }
        ?>
        
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Blank page
        <small>it all starts here</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">Blank page</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Title</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
          <?php echo $contents; ?>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          Footer
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>

      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-user bg-yellow"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                <p>New phone +1(800)555-1234</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                <p>nora@example.com</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-file-code-o bg-green"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                <p>Execution time 5 seconds</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="label label-danger pull-right">70%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Update Resume
                <span class="label label-success pull-right">95%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Laravel Integration
                <span class="label label-warning pull-right">50%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Back End Framework
                <span class="label label-primary pull-right">68%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Allow mail redirect
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Other sets of options are available
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Expose author name in posts
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Allow the user to show his name in blog posts
            </p>
          </div>
          <!-- /.form-group -->

          <h3 class="control-sidebar-heading">Chat Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Show me as online
              <input type="checkbox" class="pull-right" checked>
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Turn off notifications
              <input type="checkbox" class="pull-right">
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Delete chat history
              <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
            </label>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="<?php echo base_url('assets/bower_components/jquery/dist/jquery.min.js'); ?>"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url('assets/bower_components/bootstrap/dist/js/bootstrap.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/bower_components/select2/dist/js/select2.full.min.js'); ?>"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url('assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js'); ?>"></script>
<!-- FastClick -->
<script src="<?php echo base_url('assets/bower_components/fastclick/lib/fastclick.js'); ?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/dist/js/adminlte.min.js'); ?>"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url('assets/dist/js/demo.js'); ?>"></script>
<script type="text/javascript">
        $(document).ready(function(){
            document.getElementById("ping").style.display = "none";
            document.getElementById("ping2").style.display = "none";
            document.getElementById("notif-perusahaan").style.display = "none";
            document.getElementById("notif-loker").style.display = "none";
            setInterval(function(){
                //notif akun perusahaan
                $.ajax({
                    url : baseurl + "c_admin/notif_verifikasi_perusahaan",
                    dataType:'json',
                    success:function(response) {
                        if(response.dataperusahaan == '0'){
                            document.getElementById("ping").style.display = "none";
                            document.getElementById("notif-perusahaan").style.display = "none";
                        }else{
                            document.getElementById("ping").style.display = "block";
                            document.getElementById("ping2").style.display = "none";
                            document.getElementById("notif-perusahaan").style.display = "block";
                            $('#jmperusahaan').html(response.dataperusahaan);
                            $('#wkperusahaan').html(response.waktu);
                        }
                    }
                });
                $.ajax({
                    url : baseurl + "c_admin/notif_verifikasi_loker",
                    dataType:'json',
                    success:function(response) {
                        if(response.dataloker == '0'){
                            document.getElementById("ping2").style.display = "none";
                            document.getElementById("notif-loker").style.display = "none";
                        }else{
                            document.getElementById("ping").style.display = "none";
                            document.getElementById("ping2").style.display = "block";
                            document.getElementById("notif-loker").style.display = "block";
                            $('#jmloker').html(response.dataloker);
                            $('#wkloker').html(response.waktuloker);
                        }
                    }
                });
                
            }
            ,1000);
        });
    </script>
<script>
  $(document).ready(function () {
    <?php if($this->session->userdata('level') == 'siswa'){ ?>
      var id_siswa = '<?php echo $this->session->userdata('id_siswa'); ?>';
      $.ajax({
        url: "<?php echo site_url('Beasiswa_siswa/notification'); ?>",
        type: "POST",
        data: {id : id_siswa},
        success: function(res){
          $("#notification").append(res.item);
        }
      });
    <?php } ?>

    $('.sidebar-menu').tree()
    $('#example').DataTable();
  })

  $('.select2').select2()

  $(".reveal").on('click',function() {
      var $pwd = $(".pwd");
      if ($pwd.attr('type') === 'password') {
          $pwd.attr('type', 'text');
      } else {
          $pwd.attr('type', 'password');
      }
  });
  $('.pwd').on('blur', function(){
    if(this.value.length < 8){ // checks the password value length
      $('.alert-password').html('Password <div class="text-danger">(Minimal Password 8 Karakter)</div>');
       $(this).focus(); // focuses the current field.
       return false; // stops the execution.
    }else{
      $('.alert-password').html('Password');
    }
});
$('.usn').on('blur', function(){
    if(this.value.length < 8){ // checks the password value length
      $('.alert-username').html('Username <div class="text-danger">(Minimal Username 8 Karakter)</div>');
       $(this).focus(); // focuses the current field.
       return false; // stops the execution.
    }else{
      $('.alert-username').html('username');
    }
});
</script>
</body>
</html>
