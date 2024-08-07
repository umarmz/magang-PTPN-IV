<?php	
error_reporting(0);
include_once("koneksi.php");
    ?>
<?php
          if ($data_status=="Operator"){
            ?>
<div class="form-group">
<br>
<div class="card mb-3">
<div class="card-header">
<a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#cetak1"><i class="fa fa-year"></i>
                                  Lihat
                                </a>		<br>
                                <div class="modal fade" id="cetak1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel">Lihat Laporan</h4>
                                      </div>
                                      <div class="modal-body">
                                        <!--FORM MODAL-->
										<form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
											<fieldset>
											<div class="form-group">
											  <label for="inputnim" class="col-lg-2 control-label">Asal Sekolah</label>
											  <div class="col-lg-10">
                                              <select class="form-control" name="txtasal" id="txtasal">
        <option value="">- Pilih -</option>
        <?php
            $asal=['txtasal'];
            $sql_asal = mysqli_query($con, "select distinct id_sekolah, nama_sekolah from tb_sekolah") or die
            (mysqli_error($con));
            while($data_asal = mysqli_fetch_array($sql_asal)) {
            echo '<option value="'.$data_asal['id_sekolah'].'">'.$data_asal['nama_sekolah'].' </option>';              
        }?>
        </select><br>
        <form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
											<fieldset>

        <div class="col-lg-5">
           <select class="form-control" name="tahun" id="tahun">
                <option value="">- Tahun -</option>
                <?php
                 $thn_skr = date('Y');
              for ($x = $thn_skr; $x >= 2017; $x--) {
                        ?>
    <option value="<?php echo $x ?>"><?php echo $x ?></option>
                        <?php
                        }
                        ?>
                        </select>
                      </div>
											  </div>
											</div>
											<div class="form-group">
											  <div class="col-lg-10 col-lg-offset-2">
												<button type="reset" class="btn btn-default" data-dismiss="modal">Batal</button>
												<button type="submit" value="Pilih" class="btn btn-primary">Lihat</button>
											  </div>
                        
											</div>
											</fieldset>
										</form>
<!--END FORM MODAL-->
                                      </div>
                                      
                                    </div>
                                  </div>
                                </div>
<br>
<div class="box box-primary">
<div class="box-header with-border">
  <h3 class="box-title">Peserta</h3>

  <div class="box-tools pull-right">
    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
    </button>
    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
  </div>
</div>
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
    <center>
      <tr>
        <th>No</th>
        <th>NISN</th>
        <th>Nama</th>
        <th>Jenis Kelamin</th>
        <th>Jurusan</th>
        <th>Tahun Lulus</th>
        <th>Piihan</th>
    </tr>
    </center>
    </thead>
    <tbody>
    
        
        <?php
            $no = 1;
            $query = $_POST['txtasal'];
            $tahun = $_POST['tahun'];
            if($query != ''){
            $sql_tampil = mysqli_query($con,"select * from tb_peserta, tb_sekolah WHERE tb_peserta.id_sekolah=tb_sekolah.id_sekolah AND tb_sekolah.id_sekolah LIKE'".$query."' AND tb_peserta.tahun_lulus = $tahun ORDER BY tahun_lulus DESC");
            }else{
            $sql_tampil = mysqli_query($con,"SELECT * FROM tb_peserta ");		
            }            
            while($data = mysqli_fetch_array($sql_tampil)){
                
            ?>
        <tr>       
            <td><?php echo $no; ?></td>
            <td><?php echo $data['nisn']; ?></td>
            <td><?php echo $data['nama']; ?></td>
            <td><?php echo $data['jekel']; ?></td>
            <td><?php echo $data['jurusan']; ?></td>
            <td><?php echo $data['tahun_lulus']; ?></td>
            <td>
                <a href="?halaman=siswa_detail&kode=<?php echo $data['nisn']; ?>"class='btn btn-warning btn-sm'><i class="fa fa-link"></i></a>
                <a href="?halaman=siswa_ubah&kode=<?php echo $data['nisn']; ?>"class='btn btn-warning btn-sm'><i class="fa fa-edit"></i> Edit</a>
                <a href="?halaman=siswa_aksi&kode=<?php echo $data['nisn']; ?>"  onclick="return confirm('Apakah anda yakin hapus data ini ?')" class='btn btn-danger btn-sm'><i class="fa fa-trash"></i></a>
            </td>
        </tr>
        <?php
            $no++;
            }
        
        ?>
       
    </tbody>
  </table>
  <?php
        } elseif ($data_status=="Ka. BKK"){
          ?>
 <div class="form-group">
<br>
<div class="card mb-3">
<div class="card-header">
<a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#cetak1"><i class="fa fa-year"></i>
                                  Lihat
                                </a>		<br>
                                <div class="modal fade" id="cetak1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel">Lihat Peserta</h4>
                                      </div>
                                      <div class="modal-body">
                                        <!--FORM MODAL-->
										<form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
											<fieldset>
											<div class="form-group">
											  <label for="inputnim" class="col-lg-2 control-label">Tahun</label>
											  <div class="col-lg-10">
                                       <br>
        <form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
											<fieldset>

        <div class="col-lg-5">
           <select class="form-control" name="tahun" id="tahun">
                <option value="">- Tahun -</option>
                <?php
                 $thn_skr = date('Y');
              for ($x = $thn_skr; $x >= 2017; $x--) {
                        ?>
    <option value="<?php echo $x ?>"><?php echo $x ?></option>
                        <?php
                        }
                        ?>
                        </select>
                      </div>
											  </div>
											</div>
											<div class="form-group">
											  <div class="col-lg-10 col-lg-offset-2">
												<button type="reset" class="btn btn-default" data-dismiss="modal">Batal</button>
												<button type="submit" value="Pilih" class="btn btn-primary">Lihat</button>
											  </div>
                        
											</div>
											</fieldset>
										</form>
<!--END FORM MODAL-->
                                      </div>
                                      
                                    </div>
                                  </div>
                                </div>
<br>
<div class="box box-primary">
<div class="box-header with-border">
  <h3 class="box-title">Peserta</h3>

  <div class="box-tools pull-right">
    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
    </button>
    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
  </div>
</div>
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
    <center>
      <tr>
        <th>No</th>
        <th>NISN</th>
        <th>Nama</th>
        <th>Jenis Kelamin</th>
        <th>Asal</th>
        <th>Jurusan</th>
        <th>Tahun Lulus</th>
        <th>Piihan</th>
    </tr>
    </center>
    </thead>
    <tbody>
    
        
        <?php
            $no = 1;
            
            $tahun = $_POST['tahun'];
            if($tahun != ''){
            $sql_tampil = mysqli_query($con,"select * from tb_peserta, tb_sekolah WHERE tb_peserta.id_sekolah=tb_sekolah.id_sekolah AND tb_sekolah.id_sekolah='$data_username' AND tb_peserta.tahun_lulus = $tahun ORDER BY tahun_lulus DESC");
            }else{
            $sql_tampil = mysqli_query($con,"SELECT * from tb_peserta, tb_sekolah WHERE tb_peserta.id_sekolah=tb_sekolah.id_sekolah AND tb_sekolah.id_sekolah='$data_username' ORDER BY tahun_lulus DESC");		
            }            
            while($data = mysqli_fetch_array($sql_tampil)){
                
            ?>
        <tr>       
            <td><?php echo $no; ?></td>
            <td><?php echo $data['nisn']; ?></td>
            <td><?php echo $data['nama']; ?></td>
            <td><?php echo $data['jekel']; ?></td>
            <td><?php echo $data['nama_sekolah']; ?></td>
            <td><?php echo $data['jurusan']; ?></td>
            <td><?php echo $data['tahun_lulus']; ?></td>
            <td>
                <a href="?halaman=siswa_detail&kode=<?php echo $data['nisn']; ?>"class='btn btn-warning btn-sm'><i class="fa fa-link"></i></a>
                <a href="?halaman=siswa_ubah&kode=<?php echo $data['nisn']; ?>"class='btn btn-warning btn-sm'><i class="fa fa-edit"></i> Edit</a>
                <a href="?halaman=siswa_aksi&kode=<?php echo $data['nisn']; ?>"  onclick="return confirm('Apakah anda yakin hapus data ini ?')" class='btn btn-danger btn-sm'><i class="fa fa-trash"></i></a>
            </td>
        </tr>
        <?php
            $no++;
            }
        
        ?>
       
    </tbody>
  </table>
  <?php
                    }
                ?>

        <!-- jQuery 3 -->
<script src="../../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="../../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="../../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- page script -->
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
</body>
</html>