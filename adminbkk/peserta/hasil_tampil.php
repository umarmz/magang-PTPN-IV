<?php	
	 include_once("../koneksi.php");;
    ?>

<div class="form-group">

<br>
<div class="card mb-3">
<div class="card-header">
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
                 <a href="../pages/kelulusan/download.php?filename=<?=$data['berkas'];?>"><i class="fa fa-download"></i></a>	
            </td>
        </tr>
        <?php
            $no++;
            }
        
        ?>
    </tbody>
  </table>

  