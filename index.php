<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>BKK - SMK NU MA'ARIF 3 KUDUS</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Clean responsive bootstrap website template">
  <meta name="author" content="">
  <!-- styles -->
  <link href="assets/css/bootstrap.css" rel="stylesheet">
  <link href="assets/css/bootstrap-responsive.css" rel="stylesheet">
  <link href="assets/css/docs.css" rel="stylesheet">
  <link href="assets/css/prettyPhoto.css" rel="stylesheet">
  <link href="assets/js/google-code-prettify/prettify.css" rel="stylesheet">
  <link href="assets/css/flexslider.css" rel="stylesheet">
  <link href="assets/css/refineslide.css" rel="stylesheet">
  <link href="assets/css/font-awesome.css" rel="stylesheet">
  <link href="assets/css/animate.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:400italic,400,600,700" rel="stylesheet">

  <link href="assets/css/style.css" rel="stylesheet">
  <link href="assets/color/default.css" rel="stylesheet">

  <!-- fav and touch icons -->
  <link rel="shortcut icon" href="assets/ico/favicon.ico">
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
  <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">

  <!-- =======================================================
    Theme Name: Plato
    Theme URL: https://bootstrapmade.com/plato-responsive-bootstrap-website-template/
    Author: BootstrapMade.com
    Author URL: https://bootstrapmade.com
  ======================================================= -->
</head>

<body>
  <header>
    <!-- Navbar
    ================================================== -->
    <div class="cbp-af-header bg-blue">
      <div class=" cbp-af-inner bg-blue">
        <div class="container">
          <div class="row">

            <div class="span4">
              <!-- logo -->
              <div class="logo">
                <h4><a href="?halaman=beranda">Portal BKK Yayasan Ma'arif Kudus</a></h4>
                <!-- <img src="assets/img/logo.png" alt="" /> -->
              </div>
              <!-- end logo -->
            </div>

            <div class="span8">
              <!-- top menu -->
              <div class="navbar">
                <div class="navbar-inner">
                  <nav>
                    <ul class="nav topnav">
                      <li >
                        <a href="?halaman=beranda">Home</a>
                      </li>
                      <li>
                        <a href="?halaman=profil">Profil BKK</a>
                      </li>
                      <li class="dropdown">
                        <a href="#">Informasi</a>
                        <ul class="dropdown-menu">
                          <!-- <li><a href="scaffolding.html">Scaffolding</a></li>
                          <li><a href="base-css.html">Base CSS</a></li>
                          <li><a href="components.html">Components</a></li>
                          <li><a href="icons.html">Icons</a></li>
                          <li><a href="list.html">Styled lists</a></li> -->
                          <li class="dropdown"><a href="?halaman=info_loker">Lowongan Kerja</a>
                          </li>
                          <li class="dropdown"><a href="?halaman=info_jadwal">Jadwal Tes</a>
                          </li>
                          <li class="dropdown"><a href="?halaman=info_hasil">Pengumuman Hasil</a>
                          </li>
                        </ul>
                      </li>
                      <!-- <li class="dropdown">
                        <a href="#">Alumni Kami</a>
                        <ul class="dropdown-menu">
                          <li class="dropdown"><a href="?halaman=alumnib">Alumni Bekerja</a>
                          </li>
                          <li class="dropdown"><a href="?halaman=alumnis">Alumni Kuliah</a>
                          </li>
                          <li class="dropdown"><a href="?halaman=cari">Alumni</a>
                          </li>
                        </ul>
                      </li> -->
                      <li>
                        <a href="?halaman=contact">Contact</a>
                      </li>
                      <!-- <li>
                        <a href="?halaman=login">Login1</a>
                      </li> -->
                      <li>
                        <a href="login_fix.php">Login</a>
                      </li>
                      <li class="dropdown">
                        <a href="#">Daftar</a>
                        <ul class="dropdown-menu">
                          <!-- <li class="dropdown"><a href="login/register_peserta.php">Perusahaan</a>
                          </li> -->
                          <li class="dropdown"><a href="?halaman=reg_peserta">Registrasi</a>
                          </li>
                          <li class="dropdown"><a href="?halaman=reg_tracer">Alumni</a>
                          </li>
                        </ul>
                      </li>
                    </ul>
                  </nav>
                </div>
              </div>
              <!-- end menu -->
            </div>

          </div>
        </div>
      </div>
    </div>
  </header>
  
  <div class="content-wrapper">
    <div class="container-fluid">
            <!-- Menjadikan halaman web dinamis, 
                dengan menjadikan halaman lain yang dipanggil sebagai sebuah konten dari index.php-->
                <?php 
                    if(isset($_GET['halaman'])){
                        $hal = $_GET['halaman'];
                
                        switch ($hal) {
                            case 'beranda':
                                include "beranda.php";
                                break;
                            case 'profil':
                                include "profilbkk.php";
                                break;
                            case 'info_loker':
                                include "informasi_loker.php";
                                break;
                            case 'info_jadwal':
                                include "jadwal_tes.php";
                                break;
                            case 'info_hasil':
                                include "kelulusan_tampil.php";
                                break;
                            case 'alumnib':
                                include "alumni_bekerja.php";
                                break;
                            case 'alumnis':
                                include "alumni_kuliah.php";
                                break;
                            case 'alumni':
                                include "lacak_alumni.php";
                                break;
                            case 'cari':
                                include "cari.php";
                                break;
                            case 'contact':
                                include "contact.php";
                                break;
                            case 'reg_peserta':
                                include "reg_peserta.php";
                                break;
                            case 'reg_tracer':
                                include "tracer_add.php";
                                break;
                            case 'user_add':
                                include "user_add.php";
                                break;
                            case 'login':
                                include "login/alumni.php";
                                break;
                            case 'alumni_det':
                                include "alumni_detail.php";
                                break;
                            case 'lacak':
                              include "lacak.php";
                              break;
                            // case 'bm_tambah':
                            //     include "bm_tambah.php";
                            //     break;
                            // case 'bm_ubah':
                            //     include "bm_ubah.php";
                            //     break;
                            // case 'bm_hapus':
                            //     include "bm_hapus.php";
                            //     break;
                            // case 'bm_laporan':
                            //     include "bm_laporan.php";
                            //     break;
                            // case 'bk_tampil':
                            //     include "bk_tampil.php";
                            //     break;
                            // case 'bk_tambah':
                            //     include "bk_tambah.php";
                            //     break;
                            // case 'bk_hapus':
                            //     include "bk_hapus.php";
                            //     break;
                            // case 'bk_laporan':
                            //     include "bk_laporan.php";
                            //     break;
                            default:
                                echo "<center><h3> ERROR !</h3></center>";
                                break;    
                        }
                    }else{
                        include "berandas.php";
                    }
                ?>
                </div>
    </div>
  <!-- Footer
 ================================================== -->
  <script src="assets/js/jquery.js"></script>
  <script src="assets/js/modernizr.js"></script>
  <script src="assets/js/jquery.easing.1.3.js"></script>
  <script src="assets/js/google-code-prettify/prettify.js"></script>
  <script src="assets/js/bootstrap.js"></script>
  <script src="assets/js/jquery.prettyPhoto.js"></script>
  <script src="assets/js/portfolio/jquery.quicksand.js"></script>
  <script src="assets/js/portfolio/setting.js"></script>
  <script src="assets/js/hover/jquery-hover-effect.js"></script>
  <script src="assets/js/jquery.flexslider.js"></script>
  <script src="assets/js/classie.js"></script>
  <script src="assets/js/cbpAnimatedHeader.min.js"></script>
  <script src="assets/js/jquery.refineslide.js"></script>
  <script src="assets/js/jquery.ui.totop.js"></script>

  <!-- Template Custom Javascript File -->
  <script src="assets/js/custom.js"></script>

</body>

</html>
