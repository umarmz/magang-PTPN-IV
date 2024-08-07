<?php	
error_reporting(0);
include_once("koneksi.php");
    ?>

<?php
          if ($data_status=="Operator" || $data_status=="Ka. BKK"){
            ?>

<div class="form-group">
<br>
<div class="card mb-3">
<div class="card-header">
<!-- <a data-toggle="modal" data-target="#myModal" class="btn btn-primary btn-sm">Tambah Data</a> -->
<!-- <a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#cetak1"><i class="fa fa-year"></i>
                                  Lowongan Kerja
                                </a>	 -->
                                <button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#cetak1"><i class="fa fa-book"></i>
                                Lowongan Kerja
                                </button>
                                <button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#cetak"><i class="fa fa-book"></i>
                                  Cetak Daftar
                                </button>

                                <!-- <a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#cetak1"><i class="fa fa-book"></i>
                                Lihat Laporan
                                </a>	 -->
                                </div>
                                <br>
              <div class="modal fade" id="cetak" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Lowongan</h4>
                          </div>
                          <div class="modal-body">
                            <!--FORM MODAL-->
                            <form class="form-horizontal" method="post" action="./pages/pendaftar/cetak_daftar.php" enctype="multipart/form-data" target="_blank">
                            <fieldset>
                                <div class="form-group">
                                  <label for="inputnim" class="col-lg-2 control-label">Lowongan</label>
                                  <div class="col-lg-10">
                                  <select class="form-control" name="txttahun" id="txttahun">
                                                <option value="">- Pilih -</option>
                                                <?php
                                                $tahun=['txttahun'];
                                                $sql_loker = mysqli_query($con, "Select DISTINCT tb_pendaftaran.id_loker, tb_loker.nm_perusahaan, tb_loker.nm_loker FROM tb_pendaftaran, tb_loker WHERE tb_pendaftaran.id_loker=tb_loker.id_loker") or die
                                                (mysqli_error($con));
                                                while($data_loker = mysqli_fetch_array($sql_loker)) {
                                                echo '<option value="'.$data_loker['id_loker'].'">'.$data_loker['nm_loker'].' - '.$data_loker['nm_perusahaan'].'</option>';              
                                                }?>
                                                </select>
                                  </div>
                                </div>
                                <div class="form-group">
                                  <div class="col-lg-10 col-lg-offset-2">
                                    <button type="reset" class="btn btn-default" data-dismiss="modal">Batal</button>
                                    <button type="submit" id="cetak" name="cetak" class="btn btn-primary">Cetak</button>
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
              <div class="modal fade" id="cetak1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Lowongan</h4>
                          </div>
                          <div class="modal-body">
                            <!--FORM MODAL-->
                            <form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
                                <fieldset>
                                <div class="form-group">
                                  <label for="inputnim" class="col-lg-2 control-label">Lowongan</label>
                                  <div class="col-lg-10">
                                  <select class="form-control" name="txttahun" id="txttahun">
                                                <option value="">- Pilih -</option>
                                                <?php
                                                $tahun=['txttahun'];
                                                $sql_tahun = mysqli_query($con, "Select DISTINCT tb_pendaftaran.id_loker, tb_loker.nm_perusahaan, tb_loker.nm_loker FROM tb_pendaftaran, tb_loker WHERE tb_pendaftaran.id_loker=tb_loker.id_loker") or die
                                                (mysqli_error($con));
                                                while($data_tahun = mysqli_fetch_array($sql_tahun)) {
                                                echo '<option value="'.$data_tahun['id_loker'].'">'.$data_tahun['nm_loker'].' - '.$data_tahun['nm_perusahaan'].'</option>';              
                                                }?>
                                                </select>
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

<div class="box box-primary">
<div class="box-header with-border">
  <h3 class="box-title">Pendaftaran</h3>
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
        <th>No. Pendaftaran</th>
        <th>NISN</th>
        <th>Nama</th>
        <th>Perusahaan</th>
        <th>Loker</th>
        <th>Berkas</th>
        <th>Piihan</th>
    </tr>
    </center>
    </thead>
    <tbody>
    <?php
            $no = 1;
            $query = $_POST['txttahun'];
            if($query != ''){
            $sql_tampil = mysqli_query($con,"SELECT tb_pendaftaran.id_pendaftaran, tb_peserta.nisn, tb_peserta.nama, tb_loker.nm_perusahaan, tb_loker.nm_loker, tb_pendaftaran.berkas FROM tb_pendaftaran, tb_peserta, tb_loker WHERE tb_pendaftaran.nisn=tb_peserta.nisn AND tb_pendaftaran.id_loker=tb_loker.id_loker AND tb_loker.id_loker LIKE'".$query."' ORDER BY id_pendaftaran ASC");
            }else{
            $sql_tampil = mysqli_query($con,"SELECT tb_pendaftaran.id_pendaftaran, tb_pendaftaran.nisn, tb_peserta.nama, tb_loker.nm_perusahaan, tb_loker.nm_loker, berkas FROM tb_peserta, tb_pendaftaran, tb_loker WHERE tb_pendaftaran.nisn=tb_peserta.nisn AND tb_pendaftaran.id_loker=tb_loker.id_loker ORDER BY id_pendaftaran DESC");		
            }            
            while($data = mysqli_fetch_array($sql_tampil)){
            ?>
        <tr>
            <td><?php echo $no; ?></td>
            <td><?php echo $data['id_pendaftaran']; ?></td>
            <td><?php echo $data['nisn']; ?></td>
            <td><?php echo $data['nama']; ?></td>
            <td><?php echo $data['nm_perusahaan']; ?></td>
            <td><?php echo $data['nm_loker']; ?></td>
            <td><?php echo $data['berkas']; ?></td>
            <td>
                <a href="pages/pendaftar/download.php?filename=<?=$data['berkas'];?>"><i class="fa fa-download"></i></a>	
                <a href="?halaman=pendaftar_detail&kode=<?php echo $data['id_pendaftaran']; ?>"class='btn btn-warning btn-sm'><i class="fa fa-link"></i></a>
                <a href="?halaman=pendaftar_ubah&kode=<?php echo $data['id_pendaftaran']; ?>"class='btn btn-warning btn-sm'><i class="fa fa-edit"></i></a>
                <a href="?halaman=pendaftar_aksi&kode=<?php echo $data['id_pendaftaran']; ?>"  onclick="return confirm('Apakah anda yakin hapus data ini ?')" class='btn btn-danger btn-sm'><i class="fa fa-trash"></i></a>
            </td>
        </tr>
        <?php
            $no++;
            }
        ?>
    </tbody>
  </table>
  <div id="myModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Tambah Pendaftaran Baru</h4>
			</div>
			<div class="modal-body">
                <form action="?halaman=pendaftar_tambah" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label>ID Pendaftaran</label>
                        <input type="text" class="form-control" name="txtpendaftaran" placeholder="Id Pendaftaran" 
                        oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);" required/>
                    </div>
					<div class="form-group">
						<label>ID Loker</label>
                        <input type="text" class="form-control" name="txtid_loker" placeholder="Lowongan Kerja"
                        oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);" required/>
                    </div>
                    <div class="form-group">
						<label>NISN</label>
                        <input type="text" class="form-control" name="txtnisn" placeholder="NISN Peserta"
                        oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);" required/>
                    </div>
                    <div class="form-group">
                    <form action="hasil_tambah_per.php" method="post" enctype="multipart/form-data">
                    Pilih Berkas: <input type="file" name="berkas" />
                    <input type="submit" name="btnSimpan" value="Upload" />
                </form>
                </div>
				<div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <!-- <button type="submit" class="btn btn-primary" name="btnSimpan">Simpan</button> -->
				</div>
			</form>
        </div>
        <?php
        } elseif ($data_status=="Perusahaan / CV"){
          ?>
          
<div class="form-group">
<br>
<div class="card mb-3">
<div class="card-header">
<a data-toggle="modal" data-target="#myModal" class="btn btn-primary btn-sm">Tambah Data</a>
<a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#cetak1"><i class="fa fa-year"></i>
                                  Lowongan Kerja
                                </a>	
                                <!-- <a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#cetak1"><i class="fa fa-book"></i>
                                Lihat Laporan
                                </a>	 -->
                                </div><br>
<div class="modal fade" id="cetak1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Lowongan</h4>
                          </div>
                          <div class="modal-body">
                            <!--FORM MODAL-->
                            <form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
                                <fieldset>
                                <div class="form-group">
                                  <label for="inputnim" class="col-lg-2 control-label">Lowongan</label>
                                  <div class="col-lg-10">
                                  <select class="form-control" name="txttahun" id="txttahun">
                                                <option value="">- Pilih -</option>
                                                <?php
                                                $tahun=['txttahun'];
                                                $sql_tahun = mysqli_query($con, "select id_loker , nm_loker from tb_loker where nm_perusahaan ='$data_nama' AND status ='Tampil'") or die
                                                (mysqli_error($con));
                                                while($data_tahun = mysqli_fetch_array($sql_tahun)) {
                                                echo '<option value="'.$data_tahun['id_loker'].'">'.$data_tahun['nm_loker'].' - '.$data_tahun['nm_perusahaan'].'</option>';              
                                                }?>
                                                </select>
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

<div class="box box-primary">
<div class="box-header with-border">
  <h3 class="box-title">Pendaftaran</h3>
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
        <th>No. Pendaftaran</th>
        <th>NISN</th>
        <th>Nama</th>
        <th>Perusahaan</th>
        <th>Loker</th>
        <th>Berkas</th>
        <th>Status</th>
        <th>Piihan</th>
    </tr>
    </center>
    </thead>
    <tbody>
    <?php
            $no = 1;
            $query = $_POST['txttahun'];
            if($query != ''){
            $sql_tampil = mysqli_query($con,"SELECT tb_pendaftaran.id_pendaftaran, tb_peserta.nisn, tb_peserta.nama, tb_loker.nm_perusahaan, tb_pendaftaran.berkas FROM tb_pendaftaran, tb_peserta, tb_loker WHERE tb_pendaftaran.nisn=tb_peserta.nisn AND tb_pendaftaran.id_loker=tb_loker.id_loker AND tb_loker.nm_perusahaan ='$data_nama' AND tb_loker.id_loker='$query' ORDER BY id_pendaftaran ASC");
            }else{
            $sql_tampil = mysqli_query($con,"SELECT tb_pendaftaran.id_pendaftaran, tb_pendaftaran.nisn, tb_peserta.nama, tb_loker.nm_perusahaan, tb_loker.nm_loker, berkas, status FROM tb_peserta, tb_pendaftaran, tb_loker WHERE tb_pendaftaran.nisn=tb_peserta.nisn AND tb_pendaftaran.id_loker=tb_loker.id_loker AND tb_loker.nm_perusahaan ='$data_nama' ORDER BY id_pendaftaran DESC");		
            }            
            while($data = mysqli_fetch_array($sql_tampil)){
            ?>
        <tr>
            <td><?php echo $no; ?></td>
            <td><?php echo $data['id_pendaftaran']; ?></td>
            <td><?php echo $data['nisn']; ?></td>
            <td><?php echo $data['nama']; ?></td>
            <td><?php echo $data['nm_perusahaan']; ?></td>
            <td><?php echo $data['nm_loker']; ?></td>
            <td><?php echo $data['berkas']; ?></td>
            <td><?php echo $data['status']; ?></td>
            <td>
                <a href="pages/pendaftar/download.php?filename=<?=$data['berkas'];?>"><i class="fa fa-download"></i></a>	
                <a href="?halaman=pendaftar_detail&kode=<?php echo $data['id_pendaftaran']; ?>"class='btn btn-warning btn-sm'><i class="fa fa-link"></i></a>
                <a href="?halaman=pendaftar_ubah&kode=<?php echo $data['id_pendaftaran']; ?>"class='btn btn-warning btn-sm'><i class="fa fa-edit"></i></a>
                <a href="?halaman=pendaftar_aksi&kode=<?php echo $data['id_pendaftaran']; ?>"  onclick="return confirm('Apakah anda yakin hapus data ini ?')" class='btn btn-danger btn-sm'><i class="fa fa-trash"></i></a>
            </td>
        </tr>
        <?php
            $no++;
            }
        ?>
    </tbody>
  </table>
  <div id="myModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Tambah Pendaftaran Baru</h4>
			</div>
			<div class="modal-body">
                <form action="?halaman=pendaftar_tambah" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label>ID Pendaftaran</label>
                        <input type="text" class="form-control" name="txtpendaftaran" placeholder="Id Pendaftaran" 
                        oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);" required/>
                    </div>
					<div class="form-group">
						<label>ID Loker</label>
                        <input type="text" class="form-control" name="txtid_loker" placeholder="Lowongan Kerja"
                        oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);" required/>
                    </div>
                    <div class="form-group">
						<label>NISN</label>
                        <input type="text" class="form-control" name="txtnisn" placeholder="NISN Peserta"
                        oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);" required/>
                    </div>
                    <div class="form-group">
                    <form action="pendaftar_tambah.php" method="post" enctype="multipart/form-data">
                    Pilih Berkas: <input type="file" name="berkas" />
                    <input type="submit" name="btnSimpan" value="Upload" />
                </form>
                </div>
				<div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <!-- <button type="submit" class="btn btn-primary" name="btnSimpan">Simpan</button> -->
				</div>
			</form>
        </div>
        <?php
                    }
                ?>