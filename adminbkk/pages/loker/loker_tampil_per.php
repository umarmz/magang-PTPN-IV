<?php	
	$konek = mysqli_connect("localhost","root","","bkk");
    ?>

<div class="form-group">

<br>
<div class="card mb-3">
<div class="card-header">
<a data-toggle="modal" data-target="#myModal" class="btn btn-primary btn-sm">Tambah Lowongan</a> </div>
<br>
<br>
<div class="box box-primary">
<div class="box-header with-border">
  <h3 class="box-title">Lowongan Kerja</h3>

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
        <th>Kode Lowongan</th>
        <th>Nama Perusahaan</th>
        <th>Lowongan</th>
        <th>Keterangan</th>
        <th>Sumber</th>
        <th>Opsi</th>
    </tr>
    </center>
    </thead>
    <tbody>
    
        <?php
            
            $sql_tampil = "SELECT * FROM tb_loker where sumber ='$data_nama'";
            $query_tampil = mysqli_query($konek, $sql_tampil);
            $no=1;
            while ($data = mysqli_fetch_array($query_tampil,MYSQLI_BOTH)) {
        ?>
        <tr>       
            <td><?php echo $no; ?></td>
            <td><?php echo $data['id_loker']; ?></td>
            <td><?php echo $data['nm_perusahaan']; ?></td>
            <td><?php echo $data['nm_loker']; ?></td>
            <td><?php echo $data['keterangan']; ?></td>
            <td><?php echo $data['sumber']; ?></td>
            <td>
                <a href="?halaman=loker_ubah&kode=<?php echo $data['id_loker']; ?>"class='btn btn-warning btn-sm'><i class="fa fa-edit"></i></a>
                <a href="?halaman=loker_aksi&kode=<?php echo $data['id_loker']; ?>"onclick="return confirm('Apakah anda yakin hapus data ini ?')" class='btn btn-danger btn-sm'><i class="fa fa-trash"></i></i></a>
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
				<h4 class="modal-title">Tambah Lowongan Baru</h4>
			</div>
			<div class="modal-body">
                <form action="?halaman=loker_tambah_per" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label>Kode Loker</label>
                        <input type="text" class="form-control" name="txtkode_loker" placeholder="Kode Lowongan" />
                    </div>
					<div class="form-group">
						<label>Nama Perusahaan</label>
                        <input type="text" class="form-control" name="txtnm_perusahaan"
                        oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);" value=" <?php echo  $data_nama;?>" required/>
                    </div>
                    <div class="form-group">
						<label>Lowongan</label>
                        <input type="text" class="form-control" name="txtnm_loker" placeholder="Lowongan"
                        oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);" required/>
                    </div>
					<div class="form-group">
                        <label>Keterangan</label>
                        <textarea class="form-control" name="txtketerangan"
                        oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);" required/>
                </textarea>
                </div>
                <div class="form-group">
						<label>Sumber</label>
                        <?php echo  $data_nama;?>
                    </div>
                </div>
                    
				<div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary" name="btnSimpan">Simpan</button>
				</div>
			</form>
        </div>