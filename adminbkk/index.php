<?php
    session_start();
    if (isset($_SESSION['ses_username'])=="") {
        echo"<meta http-equiv='refresh' content='0;url=../login_fix.php'>";
    }else{
        $data_username = $_SESSION["ses_username"];
        $data_nama=$_SESSION["ses_nama"];
        $data_status = $_SESSION["ses_level"];
      
    }

    include_once("koneksi.php");
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Portal BKK | Ma'arif</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- fullCalendar -->
  <link rel="stylesheet" href="bower_components/fullcalendar/dist/fullcalendar.min.css">
  <link rel="stylesheet" href="bower_components/fullcalendar/dist/fullcalendar.print.min.css" media="print">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Morris charts -->
  <link rel="stylesheet" href="bower_components/morris.js/morris.css">
  <link rel="stylesheet" href="bower_components/chart.js/Chart.js">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="index.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>BKK</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Portal </b>BKK</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">      
          <!-- Notifications: style can be found in dropdown.less -->
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning"><?php 
              if ($data_status=="Operator"){
                    $sql_hitung = "SELECT COUNT(id_loker) from tb_loker where status ='Tangguhkan'";
                    $q_hit= mysqli_query($con, $sql_hitung);
                    while($row = mysqli_fetch_array($q_hit)) {
                        echo  $row[0]."";
                    }
                  }
                    ?></span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have notifications</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                <?php if ($data_status=="Operator"){
					$periksa=mysqli_query($con,"SELECT id_loker FROM tb_loker WHERE status='Tangguhkan' ORDER BY id_loker DESC LIMIT 1 ");
					while($q=mysqli_fetch_array($periksa)){	
						if($q['id_loker']<=5){			
							echo "<div style='padding:5px' class='alert alert-info'><span class='glyphicon glyphicon-info-sign'></span> Lowongan  <a style='color:blue'>". $q['id_loker']."</a> Masuk . Silahkan Cek Untuk Detail Loker !!</div>";	
						}
					}}
          ?>
                  <li>
                  <?php if ($data_status=="Operator"){
					$periksa=mysqli_query($con,"SELECT id_loker FROM tb_loker WHERE status='Tangguhkan' ORDER BY id_loker DESC LIMIT 1 ");
					while($q=mysqli_fetch_array($periksa)){	
						if($q['id_loker']<=5){			
							echo "<div style='padding:5px' class='alert alert-info'><span class='glyphicon glyphicon-info-sign'></span> Lowongan  <a style='color:blue'>". $q['id_loker']."</a> Masuk . Silahkan Cek Untuk Detail Loker !!</div>";	
						}
					}}
          ?>
                    <a href="#">
                      <i class="fa fa-users text-aqua"></i> Silahkan Cek Untuk Detail Loker
                    </a>
                  </li>
                  <!-- <li>
                    <a href="#">
                      <i class="fa fa-user text-red"></i> You changed your username
                    </a>
                  </li> -->
                </ul>
              </li>
              <li class="footer"><a href="?halaman=loker_tampil">View all</a></li>
            </ul>
          </li>
          <!-- Tasks: style can be found in dropdown.less -->
          
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <span class="hidden-xs"><?php echo $data_nama ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li>
              <div class="text-center">
                    <a href="#"> <?php echo $data_nama ?> - <?php echo $data_status ?></a>
                  </div>
              
              </li>
              <li class="user-footer">
                <div class="pull-left">
                  <a href="?halaman=profile" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                <!-- <a class="nav-link" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-sign-out"></i> <span>Logout</span></a></li> -->
                  <a class="btn btn-default btn-flat" data-toggle="modal" data-target="#exampleModal">Sign out</a>
                  
                </div>
              </li>
        </ul>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/pegawai.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $data_nama ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
     
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Menu System</li>
        <li class="active treeview">
        <li>
          <a href="?halaman=beranda">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <?php
          if ($data_status=="Ka. BKK"){
            ?>
        <li>
          <a href="?halaman=sekolah_tampil">
          <i class="fa fa-building"></i> <span>Kelola Data Sekolah</span>
          </a>
        </li>
        <li>
          <a href="?halaman=siswa_tampil">
            <i class="fa fa-users"></i> <span>Kelola Data Peserta</span>
          </a>
        </li>
        <li class="treeview">
        <a href="#">
          <i class="fa fa-files-o"></i>
          <span>Kelola Lowongan</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="?halaman=loker_tampil"><i class="fa fa-briefcase"></i> Lowongan Kerja</a></li>
          <li><a href="?halaman=pendaftar_tampil"><i class="fa fa-user"></i> Pendaftar</a></li>
        </ul>
      </li>
        <li class="treeview">
          <a href="#">
          <i class="fa fa-info-circle"></i>
          <span>Kelola Informasi</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
        </a>
          <ul class="treeview-menu">
          
            <li><a href="?halaman=hasil_tampil"><i class="fa fa-bullhorn"></i> Pengumuman Hasil</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-share"></i> <span>Kelola User</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="?halaman=super_tampil"><i class="fa fa-user-secret"></i> Super User</a></li>
            <li><a href="?halaman=user_tampil"><i class="fa fa-user-secret"></i> User Peserta</a></li>
          </ul>
        </li>
        <li class="treeview">
        <a href="#">
          <i class="fa fa-share"></i> <span>laporan</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="?halaman=laporan_per"><i class="fa fa-circle-o"></i> Data Perusahaan</a></li>
          <li><a href="?halaman=laporan_loker"><i class="fa fa-circle-o"></i> Data Loker</a></li>          
          <li class="treeview">
          <a href="#"><i class="fa fa-circle-o"></i> Data Alumni
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="?halaman=laporan_alumnib"><i class="fa fa-circle-o"></i> Alumni Bekerja</a></li>
          <li><a href="?halaman=laporan_alumnis"><i class="fa fa-circle-o"></i> Alumni Studi</a></li>
        </ul>
        <li><a href="?halaman=laporan_pendaftar"><i class="fa fa-circle-o"></i> Data Pendaftar</a></li>
      </li>
    </ul>
      </li>
        <li class="header">Menu Lain</li>
        <li>
        <a class="nav-link" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-sign-out"></i> <span>Logout</span></a></li>
        <!-- <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li> -->
        <?php
        } elseif ($data_status=="Perusahaan / CV"){
          ?>
          <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Kelola Lowongan</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="?halaman=loker_tampil"><i class="fa fa-briefcase"></i> Lowongan Kerja</a></li>
            <li><a href="?halaman=pendaftar_tampil"><i class="fa fa-user"></i> Pendaftar</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
          <i class="fa fa-info-circle"></i>
          <span>Kelola Informasi</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="?halaman=jadwal_tampil"><i class="fa fa-calendar"></i> Penjadwalan Ujian</a></li>
            <li><a href="?halaman=hasil_tampil"><i class="fa fa-bullhorn"></i> Pengumuman Hasil</a></li>
        </ul>
        </li>
        
        <li class="header">Menu Lain</li>
        <li>
        <a class="nav-link" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-sign-out"></i> <span>Logout</span></a></li>
        <?php
        } elseif ($data_status=="Waka Humas"){
          ?>
         <li class="treeview">
         <a href="#">
           <i class="fa fa-share"></i> <span>laporan</span>
           <span class="pull-right-container">
             <i class="fa fa-angle-left pull-right"></i>
           </span>
         </a>
         <ul class="treeview-menu">
           <li><a href="?halaman=laporan_per"><i class="fa fa-circle-o"></i> Data Perusahaan</a></li>
           <li><a href="?halaman=laporan_loker"><i class="fa fa-circle-o"></i> Data Loker</a></li>          
           <li class="treeview">
           <a href="#"><i class="fa fa-circle-o"></i> Data Alumni
             <span class="pull-right-container">
               <i class="fa fa-angle-left pull-right"></i>
             </span>
           </a>
           <ul class="treeview-menu">
             <li><a href="?halaman=laporan_alumnib"><i class="fa fa-circle-o"></i> Alumni Bekerja</a></li>
             <li><a href="?halaman=laporan_alumnis"><i class="fa fa-circle-o"></i> Alumni Studi</a></li>
           </ul>
           <li><a href="?halaman=laporan_pendaftar"><i class="fa fa-circle-o"></i> Data Pendaftar</a></li>
         </li>
       </ul>
       </li>
        <li class="header">Menu Lain</li>
        <li>
        <a class="nav-link" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-sign-out"></i> <span>Logout</span></a></li>
      </ul>
        <?php
        } elseif ($data_status=="Operator"){
          ?>
          <li>
          <a href="?halaman=sekolah_tampil">
            <i class="fa fa-building"></i> <span>Kelola Data Sekolah</span>
          </a>
        </li>
          <li><a href="?halaman=siswa_tampil">
            <i class="fa fa-users"></i> <span>Kelola Data Peserta</span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Kelola Lowongan</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="?halaman=loker_tampil"><i class="fa fa-briefcase"></i> Lowongan Kerja</a></li>
            <li><a href="?halaman=pendaftar_tampil"><i class="fa fa-user"></i> Pendaftar</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-info-circle"></i>
            <span>Kelola Informasi</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
          </a>
          <ul class="treeview-menu">
          <li><a href="?halaman=jadwal_tampil"><i class="fa fa-calendar"></i> Penjadwalan Ujian</a></li>
          <li><a href="?halaman=hasil_tampil"><i class="fa fa-bullhorn"></i> Pengumuman Hasil</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-user-o"></i>
            <span>Pelacakan Alumni</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right">2</span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="?halaman=tracerb"><i class="fa fa-building"></i> Alumni Bekerja</a></li>
            <li><a href="?halaman=tracers"><i class="fa fa-university"></i> Alumni Studi Lanjut</a></li>
          </ul>
        </li>
        <!-- <li>
          <a href="pages/widgets.html">
            <i class="fa fa-th"></i> <span>Widgets</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">new</small>
            </span>
          </a>
        </li>
         -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-share"></i> <span>Kelola User</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="?halaman=super_tampil"><i class="fa fa-user-secret"></i> Super User</a></li>
            <li><a href="?halaman=user_tampil"><i class="fa fa-user-secret"></i> User Peserta</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-share"></i> <span>Laporan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <!-- <li><a href="?halaman=laporan_per"><i class="fa fa-circle-o"></i> Data Perusahaan</a></li>
            <li><a href="?halaman=laporan_loker"><i class="fa fa-circle-o"></i> Data Loker</a></li>           -->
            <li class="treeview">
              <a href="#"><i class="fa fa-circle-o"></i> Data Alumni
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="?halaman=laporan_alumnib"><i class="fa fa-circle-o"></i> Alumni Bekerja</a></li>
                <li><a href="?halaman=laporan_alumnis"><i class="fa fa-circle-o"></i> Alumni Studi</a></li>
              </ul>
              <li><a href="?halaman=laporan_pendaftar"><i class="fa fa-circle-o"></i> Data Pendaftar</a></li>
            </li>
          </ul>
        </li>
        <li class="header">Menu Lain</li>
        <li>
        <a class="nav-link" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-sign-out"></i> <span>Logout</span></a></li>
      </ul>
      <?php
                    }
                ?>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  
  <div class="content-wrapper">
    <div class="container-fluid">
            <!-- Menjadikan halaman web dinamis, 
                dengan menjadikan halaman lain yang dipanggil sebagai sebuah konten dari index.php-->
                <?php 
                    if(isset($_GET['halaman'])){
                        $hal = $_GET['halaman'];
                
                        switch ($hal) {
                            case 'beranda':
                                include "pages/beranda.php";
                                break;
                            case 'profile':
                                include "pages/profile.php";
                                break;
                            case 'siswa_tampil':
                                include "pages/peserta/siswa_tampil.php";
                            case 'siswa_tambah':
                                include "pages/peserta/siswa_tambah.php";
                                break;
                            case 'siswa_detail':
                                include "pages/peserta/siswa_detail.php";
                                break;
                            case 'siswa_ubah':
                                include "pages/peserta/siswa_ubah.php";
                                break;		
                            case 'siswa_aksi':
                                include "pages/peserta/siswa_aksi.php";
                                break;
                                
                            
                            case 'loker_tampil':
                                include "pages/loker/loker_tampil.php";
                                break;
                            case 'loker_tampil_per':
                                include "pages/loker/loker_tampil_per.php";
                                break;	
                            case 'loker_ubah':
                                include "pages/loker/loker_ubah.php";
                                break;
                            case 'loker_arsip':
                                include "pages/loker/loker_arsip.php";
                                break;
                            case 'loker_konfirm':
                                include "pages/loker/loker_konfirm.php";
                                break;
                            case 'loker_tambah':
                                include "pages/loker/loker_tambah.php";
                                break;
                            case 'loker_tambah_per':
                                include "pages/loker/loker_tambah_per.php";
                                break;
                            case 'loker_aksi':
                                include "pages/loker/loker_aksi.php";
                                break;


                            case 'jadwal_tampil':
                                include "pages/jadwal/jadwal_tampil.php";
                                break;
                            case 'jadwal_tambah':
                                include "pages/jadwal/jadwal_tambah.php";
                                break;    
                            case 'jadwal_ubah':
                                include "pages/jadwal/jadwal_ubah.php";
                                break;
                            case 'jadwal_arsip':
                                include "pages/jadwal/jadwal_arsip.php";
                                break;
                            case 'jadwal_aksi':
                                include "pages/jadwal/jadwal_aksi.php";
                                break;


                            case 'hasil_tampil':
                                include "pages/kelulusan/hasil_tampil.php";
                                break;
                            case 'hasil_tambah_per':
                                include "pages/kelulusan/hasil_tambah_per.php";
                                break;
                            case 'download':
                                include "pages/kelulusan/download.php";
                                break;
                            case 'hasil_ubah' :
                                include "pages/kelulusan/hasil_ubah.php";
                                break;
                            case 'hasil_aksi' :
                                include "pages/kelulusan/hasil_aksi.php";
                                break;
                            case 'hasil_arsip' :
                                include "pages/kelulusan/hasil_arsip.php";
                                break;
                            case 'hasil_unarsip' :
                                include "pages/kelulusan/hasil_unarsip.php";
                                break;


                            case 'user_tampil':
                                include "pages/user/user_tampil.php";
                                break;
                            case 'user_tambah':
                                include "pages/user/user_tambah.php";
                                break;    
                            case 'user_ubah':
                                include "pages/user/user_ubah.php";
                                break;
                            case 'user_aksi':
                                include "pages/user/user_aksi.php";
                                break;


                            case 'super_tampil':
                                include "pages/user/super_tampil.php";
                                break;
                            case 'super_tambah':
                                include "pages/user/super_tambah.php";
                                break;    
                            case 'super_ubah':
                                include "pages/user/super_ubah.php";
                                break;
                            case 'super_aksi':
                                include "pages/user/super_aksi.php";
                                break;
                            case 'super_aktif':
                                include "pages/user/super_aktif.php";
                                break;


                            case 'pendaftar_tampil' :
                                include "pages/pendaftar/pendaftar_tampil.php";
                                break;
                            case 'pendaftar_tambah' :
                                include "pages/pendaftar/pendaftar_tambah.php";
                                break;
                            case 'pendaftar_aksi' :
                                include "pages/pendaftar/pendaftar_aksi.php";
                                break;
                            case 'pendaftar_detail' :
                                include "pages/pendaftar/detail.php";
                                break;


                            case 'sekolah_tampil' :
                                include "pages/sekolah/sekolah_tampil.php";
                                break;
                            case 'sekolah_tambah' :
                                include "pages/sekolah/sekolah_tambah.php";
                                break;
                            case 'sekolah_ubah' :
                                include "pages/sekolah/sekolah_ubah.php";
                                break;
                            case 'sekolah_aksi' :
                                include "pages/sekolah/sekolah_aksi.php";
                                break;

                            case 'lowongan' :
                                include "pages/informasi_loker.php";
                                break;

                            case 'laporan_per' :
                                include "pages/laporan/laporan_perusahaan.php";
                                break;
                            case 'laporan_loker' :
                                include "pages/laporan/laporan_loker.php";
                                break;
                            case 'laporan_alumnib' :
                                include "pages/laporan/laporan_alumnib.php";
                                break;
                            case 'laporan_alumnis' :
                                include "pages/laporan/laporan_alumnis.php";
                                break;
                            case 'laporan_chart' :
                                include "pages/laporan/grafik.php";
                                break;
                            case 'laporan_pendaftar' :
                                include "pages/laporan/laporan_pendaftar.php";
                                break;
                            case 'cetak_kerja_semua' :
                                include "pages/laporan/cetak_alumni.php";
                                break;
                            case 'cetak_kerja' :
                                include "pages/laporan/cetak_alumnib.php";
                                break;
                            case 'cetak_studi' :
                                include "pages/laporan/cetak_alumni_s.php";
                                break;
                                
                                
                            case 'tracerb' :
                              include "pages/tracer/tracer_tampil.php";
                              break;
                             case 'tracers' :
                              include "pages/tracer/tracer_tampilsl.php";
                              break;
                            case 'tracer_detail' :
                              include "pages/tracer/tracer_detail.php";
                              break;
                            case 'tracer_tampilbkk':
                                include "pages/tracer/tracer_tampilbkk.php";
                                break;
                            case 'tracer_tampilbkk_sl':
                                include "pages/tracer/tracer_tampilbkk_sl.php";
                                break;
                            case 'tracer_ubah':
                                include "pages/tracer/tracer_ubah.php";
                                break;
                            
                            default:
                                echo "<center><h3> ERROR !</h3></center>";
                                break;    
                        }
                    }else{
                        include "pages/beranda.php";
                    }
                ?>
                </div>
    </div>
  <!-- /.content-wrapper -->
 
<!-- Logout Modal-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Yakin Keluar?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Pilih Log Out Jika ingin keluar.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="../index.php">Logout</a>
          </div>
        </div>
      </div>
    </div>
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark" style="display: none;">
     <!-- Create the tabs -->
     <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <!-- <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div> -->
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <!-- <div class="tab-pane" id="control-sidebar-settings-tab"> -->
        
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

<script src="bower_components/chart.js/Chart.js"></script>
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="bower_components/raphael/raphael.min.js"></script>
<script src="bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="bower_components/moment/min/moment.min.js"></script>
<script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- DataTables -->
<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<script src="bower_components/fullcalendar/dist/fullcalendar.min.js"></script>
<!-- page script -->
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
<!-- <script>
  $(function () {
    "use strict";

   
    //BAR CHART
    var bar = new Morris.Bar({
      element: 'bar-chart',
      resize: true,
      data: [
        {y: '2006', a: 100, b: 90},
        {y: '2007', a: 75, b: 65},
        {y: '2008', a: 50, b: 40},
        {y: '2009', a: 75, b: 65},
        {y: '2010', a: 50, b: 40},
        {y: '2011', a: 75, b: 65},
        {y: '2012', a: 100, b: 90}
      ],
      barColors: ['#00a65a', '#f56954'],
      xkey: 'y',
      ykeys: ['a', 'b'],
      labels: ['CPU', 'DISK'],
      hideHover: 'auto'
    });
  });
</script> -->
</body>
</html>
