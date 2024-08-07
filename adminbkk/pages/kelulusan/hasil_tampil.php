<?php	
	 include_once("koneksi.php");;
    ?>
<?php
          if ($data_status=="Ka. BKK" || $data_status=="Operator"){
            ?>
<div class="form-group">

<br>
<div class="card mb-3">
<div class="card-header">
<a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#cetak1"><i class="fa fa-info"></i> Keterangan </a>	 <br>	
<div class="modal fade" id="cetak1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Keterangan</h4>
                          </div>
                          <div class="modal-body">
                            <!-- < FORM MODAL -->
                            <form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
                                <fieldset>
                                <div class="form-group">
                                  <label for="inputnim" class="col-lg-6 control-label">Keterangan</label>
                                  <div class="col-lg-10">
                                  <select class="form-control" name="txtket" id="txtket">
                                        <option value="">- Pilih -</option>
                                        <?php
                                        $tahun=['txtket'];
                                        $sql_tahun = mysqli_query($con, "SELECT DISTINCT keterangan FROM tb_kelulusan") or die
                                        (mysqli_error($con));
                                        while($data_tahun = mysqli_fetch_array($sql_tahun)) {
                                        echo '<option value="'.$data_tahun['keterangan'].'">'.$data_tahun['keterangan'].' </option>';              
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
                                <br>
<div class="box box-primary">
<div class="box-header with-border">
  <h3 class="box-title">Hasil Kelulusan</h3>
<div class="box-tools pull-right">
    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
    </button>
    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
  </div>
</div>
<div class="box-body">
<table id="example1" class="table table-bordered table-striped">
<thead>
      <tr>
        <th>No</th>
        <th>Kode</th>
        <th>Nama Perusahaan</th>
        <th>Lowongan</th>
        <th>File Pengumuman</th>
        <th>Keterangan</th>
        <th>Opsi</th>
    </tr>
    </center>
    </thead>
    <tbody>
        

         <?php
                $no = 1;
                
                // if($query != ''){
                // $sql_tampil = "SELECT tb_kelulusan.kode_hasil, tb_loker.nm_perusahaan, tb_loker.nm_loker, berkas,tb_kelulusan.keterangan FROM tb_kelulusan, tb_loker WHERE tb_kelulusan.id_loker=tb_loker.id_loker AND tb_kelulusan.keterangan LIKE'".$query."' ORDER BY kode_hasil DESC";
                // }else{
                // $sql_tampil = "SELECT tb_kelulusan.kode_hasil, tb_loker.nm_perusahaan, tb_loker.nm_loker, berkas,tb_kelulusan.keterangan FROM tb_kelulusan, tb_loker WHERE tb_kelulusan.id_loker=tb_loker.id_loker ORDER BY kode_hasil DESC";
                // }
                $sql_tampil = "SELECT tb_kelulusan.kode_hasil, tb_loker.nm_perusahaan, tb_loker.nm_loker, berkas,tb_kelulusan.keterangan FROM tb_kelulusan, tb_loker WHERE tb_kelulusan.id_loker=tb_loker.id_loker ORDER BY kode_hasil DESC";
                $query_tampil = mysqli_query($con, $sql_tampil);
                while ($data = mysqli_fetch_array($query_tampil,MYSQLI_BOTH)) {
            // $sql_tampil = "SELECT tb_kelulusan.kode_hasil, tb_loker.nm_perusahaan, tb_loker.nm_loker, berkas,tb_kelulusan.keterangan FROM tb_kelulusan, tb_loker WHERE tb_kelulusan.id_loker=tb_loker.id_loker AND tb_loker.nm_perusahaan ='$data_nama' ORDER BY kode_hasil DESC";
            // $query_tampil = mysqli_query($konek, $sql_tampil);
            
            // while ($data = mysqli_fetch_array($query_tampil,MYSQLI_BOTH)) {
            ?>

        <tr>       
            <td><?php echo $no; ?></td>
            <td><?php echo $data['kode_hasil']; ?></td>
            <td><?php echo $data['nm_perusahaan']; ?></td>
            <td><?php echo $data['nm_loker']; ?></td>
            <td><?php echo $data['berkas']; ?></td>
            <td><?php echo $data['keterangan']; ?></td>
            <td>
                 <a href="pages/kelulusan/download.php?filename=<?=$data['berkas'];?>"><i class="fa fa-download"></i></a>	
                 <a href="?halaman=hasil_arsip&kode=<?php echo $data['kode_hasil']; ?>"class='btn btn-warning btn-sm'><i class="fa fa-archive"></i></a>
                 <a href="?halaman=hasil_unarsip&kode=<?php echo $data['kode_hasil']; ?>"class='btn btn-warning btn-sm'><i class="fa fa-eye"></i></a>
                 <a href="?halaman=hasil_ubah&kode=<?php echo $data['kode_hasil']; ?>"class='btn btn-warning btn-sm'><i class="fa fa-edit"></i></a>
                <a href="?halaman=hasil_aksi&kode=<?php echo $data['kode_hasil']; ?>"onclick="return confirm('Apakah anda yakin hapus data ini ?')" class='btn btn-danger btn-sm'><i class="fa fa-trash"></i></i></a>
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
				<h4 class="modal-title">Tambah Hasil Baru</h4>
			</div>
			<div class="modal-body">
                <form action="?halaman=hasil_tambah_per" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label>Kode Hasil</label>
                        <input type="text" class="form-control" name="txtkode_hasil" placeholder="Kode" />
                    </div>
                    
					<!-- <div class="form-group">
						<label>Nama Perusahaan</label>
                        <input type="text" class="form-control" name="txtnm_perusahaan"
                        oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);" value=" <?php echo  $data_nama;?>" required/>
                    </div> -->
                    <div class="form-group">
                    <label>Lowongan</label>
                            <select name="txtloker" id="id_loker" class="form-control" required>
                            <option value="">- Pilih -</option>
                            <?php
                            $sql_jur = mysqli_query($con, "select id_loker , nm_loker from tb_loker where nm_perusahaan ='$data_nama'AND status ='Tampil'") or die
                                (mysqli_error($con));
                                while($data_jur = mysqli_fetch_array($sql_jur)) {
                                    echo '<option value="'.$data_jur['id_loker'].'">'.$data_jur['id_loker'].' - '.$data_jur['nm_loker'].'</option>';
                                } ?>
                            </select>
                  </div>
					<div class="form-group">
                        <form action="hasil_tambah_per.php" method="post" enctype="multipart/form-data">
                        Pilih Berkas: Filetype .pdf<input type="file" name="berkas" />
                        <input type="submit" name="btnSimpan" value="Upload" />
                    </form>
                    </div>
				<div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <!-- <button type="submit" class="btn btn-primary" name="btnSimpan" value="upload" />Simpan</button> -->
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
<a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal" class="btn btn-primary btn-sm">Tambah Data Hasil Tes <br></a><br>
<br>
<div class="box box-primary">
<div class="box-header with-border">
  <h3 class="box-title">Pengumuman Kelulusan</h3>

  <div class="box-tools pull-right">
    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
    </button>
    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
  </div>
</div>
<div class="box-body">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
    <center>
      <tr>
        <th>No</th>
        <th>Kode</th>
        <th>Nama Perusahaan</th>
        <th>Lowongan</th>
        <th>File Pengumuman</th>
        <th>Keterangan</th>
        <th>Opsi</th>
    </tr>
    </center>
    </thead>
    <tbody>
    <?php 
        $tahun = date ('Y');
        // KODE OTOMATIS
        // membuat query max untuk kode
        $carikode = mysqli_query($con,"SELECT MAX(kode_hasil) FROM tb_kelulusan") or die (mysqli_error());
        // menjadikannya array
        $datakode = mysqli_fetch_array($carikode);
        // jika $datakode
        if ($datakode) {
        // membuat variabel baru untuk mengambil kode mulai dari 3   P001/2020/HSL001
        $nilaikode = substr($datakode[0], 14);   
        // menjadikan $nilaikode ( int )
        $kode = (int) $nilaikode;
        // setiap $kode di tambah 1
        $kode = $kode + 1;
        // hasil untuk menambahkan kode 
        // angka 3 untuk menambahkan tiga angka setelah B dan angka 0 angka yang berada di tengah
        // atau angka sebelum $kode
        $hasilkode = $data_username."/".$tahun."/HSL/".str_pad($kode,4, "0", STR_PAD_LEFT);
        }else{
            $hasilkode = "P001/2020/HSL/0001";
        }
        // KODE OTOMATIS
    ?>
         <?php
                $no = 1;
                
                $sql_tampil = "SELECT tb_kelulusan.kode_hasil, tb_loker.nm_perusahaan, tb_loker.nm_loker, berkas,tb_kelulusan.keterangan FROM tb_kelulusan, tb_loker WHERE tb_kelulusan.id_loker=tb_loker.id_loker AND tb_loker.nm_perusahaan ='$data_nama' ORDER BY kode_hasil DESC";
                $query_tampil = mysqli_query($con, $sql_tampil);
                while ($data = mysqli_fetch_array($query_tampil,MYSQLI_BOTH)) {
            ?>
            <!-- SELECT * FROM `tb_loker` WHERE id_loker LIKE '%2020%'  -->
        <tr>       
            <td><?php echo $no; ?></td>
            <td><?php echo $data['kode_hasil']; ?></td>
            <td><?php echo $data['nm_perusahaan']; ?></td>
            <td><?php echo $data['nm_loker']; ?></td>
            <td><?php echo $data['berkas']; ?></td>
            <td><?php echo $data['keterangan']; ?></td>
            <td>
                 <a href="pages/kelulusan/download.php?filename=<?=$data['berkas'];?>"><i class="fa fa-download"></i></a>	
                <a href="?halaman=hasil_ubah&kode=<?php echo $data['kode_hasil']; ?>"class='btn btn-warning btn-sm'><i class="fa fa-edit"></i></a>
                <a href="?halaman=hasil_aksi&kode=<?php echo $data['kode_hasil']; ?>"onclick="return confirm('Apakah anda yakin hapus data ini ?')" class='btn btn-danger btn-sm'><i class="fa fa-trash"></i></i></a>
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
				<h4 class="modal-title">Tambah Hasil Baru</h4>
			</div>
			<div class="modal-body">
                <form action="?halaman=hasil_tambah_per" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label>Kode Hasil</label>
                        <input type="text" class="form-control" name="txtkode_hasil" value="<?php echo $hasilkode; ?>" readonly />
                    </div>
                    
                    <div class="form-group">
                    <label>Lowongan</label>
                            <select name="txtloker" id="id_loker" class="form-control" required>
                            <option value="">- Pilih -</option>
                            <?php
                            $sql_jur = mysqli_query($con, "select id_loker , nm_loker from tb_loker where nm_perusahaan ='$data_nama'") or die
                                (mysqli_error($con));
                                while($data_jur = mysqli_fetch_array($sql_jur)) {
                                    echo '<option value="'.$data_jur['id_loker'].'">'.$data_jur['id_loker'].' - '.$data_jur['nm_loker'].'</option>';
                                } ?>
                            </select>
                  </div>
					<div class="form-group">
                        <form action="hasil_tambah_per.php" method="post" enctype="multipart/form-data">
                        Pilih Berkas :  <br>
                        Format : Perusahaan_Kelulusan.pdf
                        <input type="file" name="berkas" />
                        <input type="submit" name="btnSimpan" value="Upload" />
                    </form>
                    </div>
				<div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
				</div>
			</form>
        </div>
        <?php
                    }
                ?>