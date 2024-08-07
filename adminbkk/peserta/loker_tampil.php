<?php	
 include_once("../koneksi.php");
    ?>


<div class="form-group">

<br>
<div class="card mb-3">
<div class="card-header">


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
        <th>Jenis Kelamin</th>
        <th>Keterangan</th>
        <th>Sumber</th>
        <th>Batas</th>

        <th>Piihan</th>
    </tr>
    </center>
    </thead>
    <tbody>
    
        <?php
            
            $sql_tampil = "SELECT * FROM tb_loker";
            // $sql_tampil .="UPDATE tb_loker SET status='Arsip' WHERE batas=curdate()";
            $query_tampil = mysqli_query($con, $sql_tampil);
            $no=1;
            while ($data = mysqli_fetch_array($query_tampil,MYSQLI_BOTH)) {
          
        ?>
        <tr>       
            <td><?php echo $no; ?></td>
            <td><?php echo $data['id_loker']; ?></td>
            <td><?php echo $data['nm_perusahaan']; ?></td>
            <td><?php echo $data['nm_loker']; ?></td>
            <td><?php echo $data['jekel']; ?></td>
            <td><?php echo $data['keterangan']; ?></td>
            <td><?php echo $data['sumber']; ?></td>
            <td><?php echo date('d F Y', strtotime($data['batas'])); ?></td>
            <td><?php echo $data['status']; ?></td>
            <td>
                <!-- <a href="#"class='btn btn-primary btn-sm'>DAFTAR</a> -->
                <!-- <a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#cetak1" ><i class="fa fa-info"></i> DAFTAR </a> -->
                <a href="?halaman=daftar&kode=<?php echo $data['id_loker']; ?>"class="btn btn-primary btn-sm">DAFTAR </a>
            </td>
        </tr>
        <?php
            $no++;
            }
        
        ?>
    </tbody>
  </table>
  <div id="cetak1" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Pendaftaran Lowongan</h4>
			</div>
			<div class="modal-body">
                <form action="?halaman=hasil_tambah_per" method="post" enctype="multipart/form-data">
                <div class="form-group">
						<label>Kode Lowongan</label>
                        <input type="text" class="form-control" name="txtkode_hasil" value="<?php echo $data['id_loker'];?>" readonly />
                    </div>
					<div class="form-group">
						<label>NISN</label>
                        <input type="text" class="form-control" name="txtkode_hasil" value="<?php echo $data_nisn; ?>" readonly />
                    </div>
                    
					<div class="form-group">
                        <form action="hasil_tambah_per.php" method="post" enctype="multipart/form-data">
                        Pilih Berkas :  <br>
                        Format : NISN_PT.Loker.pdf <br>
                        Contoh : 0001678908_AHM_TEKNISI.pdf
                        <input type="file" name="berkas" />
                        <input type="submit" name="btnSimpan" value="Upload" />
                    </form>
                    </div>
				<div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
				</div>
			</form>
        </div>
       
 