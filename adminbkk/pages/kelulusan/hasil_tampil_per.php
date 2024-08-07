<?php	
	$konek = mysqli_connect("localhost","root","","bkk");
    ?>

<!-- <h4><span class="glyphicon glyphicon-briefcase"></span>Pengumuman Hasil Tes</h4> -->
<div class="form-group">

<br>
<div class="card mb-3">
<div class="card-header">
<a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal" class="btn btn-primary btn-sm">Tambah Data Hasil Tes</a>		
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
                $no = 1;
                
                $sql_tampil = "SELECT tb_kelulusan.kode_hasil, tb_loker.nm_perusahaan, tb_loker.nm_loker, berkas,tb_kelulusan.keterangan FROM tb_kelulusan, tb_loker WHERE tb_kelulusan.id_loker=tb_loker.id_loker ORDER BY kode_hasil DESC";
                $query_tampil = mysqli_query($konek, $sql_tampil);
                while ($data = mysqli_fetch_array($query_tampil,MYSQLI_BOTH)) {
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
                 <a href="?halaman=hasil_arsip&kode=<?php echo $data['kode_hasil']; ?>"<i class="fa fa-archive"></i></a>
                 <a href="?halaman=hasil_unarsip&kode=<?php echo $data['kode_hasil']; ?>"<i class="fa fa-edit"></i></a>
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
                            $sql_jur = mysqli_query($konek, "select id_loker , nm_loker from tb_loker where nm_perusahaan ='$data_nama'") or die
                                (mysqli_error($con));
                                while($data_jur = mysqli_fetch_array($sql_jur)) {
                                    echo '<option value="'.$data_jur['id_loker'].'">'.$data_jur['id_loker'].' - '.$data_jur['nm_loker'].'</option>';
                                } ?>
                            </select>
                  </div>
					<div class="form-group">
                        <form action="hasil_tambah_per.php" method="post" enctype="multipart/form-data">
                        Pilih Berkas: <input type="file" name="berkas" />
                        <input type="submit" name="btnSimpan" value="Upload" />
                    </form>
                    </div>
				<div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <!-- <button type="submit" class="btn btn-primary" name="btnSimpan" value="upload" />Simpan</button> -->
				</div>
			</form>
        </div>
    