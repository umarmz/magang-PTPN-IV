<?php	
	 include_once("../koneksi.php");
    ?>

<div class="form-group">

<br>
<div class="card mb-3">
<div class="card-header">
<br>
<div class="box box-primary">
<div class="box-header with-border">
  <h3 class="box-title">Jadwal Tes Seleksi</h3>

  <div class="box-tools pull-right">
    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
    </button>
    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
  </div>
</div>

<div class="box-body">
<table id="example1" class="table table-bordered table-striped">
                
        <thead>
    <center>      <tr>
        <th>No</th>
        <th>Kode Jadwal</th>
        <th>Nama Perusahaan</th>
        <th>Lowongan</th>
        <th>Tanggal    </th>
        <th>Tempat</th>
        <th>Waktu</th>
        
    </tr>
    </center>
    </thead>
    <tbody>
    
        <?php
            
            $sql_tampil = "SELECT tb_jadwal.kode_jadwal,tb_jadwal.id_loker, tb_loker.nm_perusahaan, tb_loker.nm_loker, tgl_tes,tempat,waktu FROM tb_jadwal,tb_loker WHERE tb_jadwal.id_loker=tb_loker.id_loker AND tb_jadwal.keterangan = 'Tampil' ";
            $query_tampil = mysqli_query($con, $sql_tampil);
            $no=1;
            while ($data = mysqli_fetch_array($query_tampil,MYSQLI_BOTH)) {
        ?>
        <tr>       
            <td><?php echo $no; ?></td>
            <td><?php echo $data['kode_jadwal']; ?></td>
            <td><?php echo $data['nm_perusahaan']; ?></td>
            <td><?php echo $data['nm_loker']; ?></td>
            <td><?php echo date('d F Y', strtotime($data['tgl_tes'])); ?></td>
            <td><?php echo $data['tempat']; ?></td>
            <td><?php echo $data['waktu']; ?></td>
            
        </tr>
        <?php
            $no++;
            }
        
        ?>
    </tbody>
  </table>
