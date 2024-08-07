<?php	
	 include_once("koneksi.php");
    ?>


<?php
          if ($data_status=="Ka. BKK" || $data_status=="Operator"){
            ?>
<div class="form-group">

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Beranda
        <small>Portal BKK SMK Ma'arif</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
 <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php // menghitung
                    $sql_hitung = "SELECT COUNT(id_loker) from tb_loker where status ='Tampil'";
                    $q_hit= mysqli_query($con, $sql_hitung);
                    while($row = mysqli_fetch_array($q_hit)) {
                        echo  $row[0]."";
                    }
                    ?></h3>

              <p>Lowongan Baru</p>
            </div>
            <div class="icon">
              <i class="ion ion-person"></i>
            </div>
            <a href="?halaman=loker_tampil" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php // menghitung
                    $sql_hitung = "SELECT COUNT(username) from user where level ='Perusahaan / CV'";
                    $q_hit= mysqli_query($con, $sql_hitung);
                    while($row = mysqli_fetch_array($q_hit)) {
                        echo  $row[0]."";
                    }
                    ?>
                    </h3>

              <p>Perusahaan</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="?halaman=super_tampil" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php // menghitung
                    $sql_hitung = "SELECT COUNT(nisn) from tb_peserta";
                    $q_hit= mysqli_query($con, $sql_hitung);
                    while($row = mysqli_fetch_array($q_hit)) {
                        echo  $row[0]."";
                    }
                    ?></h3>

              <p>User Terdaftar</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="?halaman=siswa_tampil" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?php // menghitung
                    $sql_hitung = "SELECT COUNT(id_loker) from tb_loker where status ='Tangguhkan'";
                    $q_hit= mysqli_query($con, $sql_hitung);
                    while($row = mysqli_fetch_array($q_hit)) {
                        echo  $row[0]."";
                    }
                    ?></h3>

              <p>Lowongan Masuk</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <p>
          <center>
          <br> <font face="Courier new"> Portal Bursa Kerja Khusus </font>
          <br> <font face="Courier new">YAYASAN SMK NU MA'ARIF KUDUS</font>
          <br> <br><br>
          <img src="../images/logo3smk.png" height="200px" width="350px;" align="center"/>
          </center>
      </p>
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-7 connectedSortable">
          <!-- Custom tabs (Charts with tabs)-->
          <div class="nav-tabs-custom">
          </div>

    </section>

    </section>
    <!-- /.content -->
    
  </div>
  <?php
        } elseif ($data_status=="Perusahaan / CV"){
          ?>
  <div class="form-group">

<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Beranda
    <small>Portal BKK SMK Ma'arif</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Dashboard</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <!-- Small boxes (Stat box) -->
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-blue">
        <div class="inner">
          <h3><?php // menghitung
                $sql_hitung = "SELECT COUNT(id_loker) from tb_loker where status ='Tangguhkan'";
                $q_hit= mysqli_query($con, $sql_hitung);
                while($row = mysqli_fetch_array($q_hit)) {
                    echo  $row[0]."";
                }
                ?></h3>

          <p>Lowongan Kerja</p>
        </div>
        <div class="icon">
          <i class="ion ion-person-add"></i>
        </div>
        <a href="#" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    
  </div>
  
  <p>
      <center>
      <br> <font face="Courier new"> Portal Bursa Kerja Khusus </font>
      <br> <font face="Courier new">YAYASAN SMK NU MA'ARIF KUDUS</font>
      <br> <br><br>
      <img src="../images/logo3smk.png" height="200px" width="350px;" align="center"/>
      </center>
  </p>
  <!-- /.row -->
  <!-- Main row -->
  <div class="row">
    <!-- Left col -->
    <section class="col-lg-7 connectedSortable">
      <!-- Custom tabs (Charts with tabs)-->
      <div class="nav-tabs-custom">
      </div>

</section>

</section>
<!-- /.content -->

</div>
<?php
                    }
                ?>