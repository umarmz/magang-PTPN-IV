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
        <th>Status</th>

        <th>Piihan</th>
    </tr>
    </center>
    </thead>
    <tbody>
    
        <?php
            
            $sql_tampil = "SELECT * FROM tb_pendaftaran WHERE nisn = '".$data_nisn."'";
            // $sql_tampil .="UPDATE tb_loker SET status='Arsip' WHERE batas=curdate()";
            $query_tampil = mysqli_query($con, $sql_tampil);
            $no=1;
            while ($data = mysqli_fetch_array($query_tampil,MYSQLI_BOTH)) {
          
        ?>
        <tr>       
            <td><?php echo $no; ?></td>
            <td><?php echo $data['id_pendaftaran']; ?></td>
            <td><?php echo $data['id_loker']; ?></td>
            <td><?php echo $data['berkas']; ?></td>
               
            <td><?php echo $data['status']; ?></td>
            <td>
                <!-- <a href="#"class='btn btn-primary btn-sm'>DAFTAR</a> -->
                <!-- <a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#cetak1" ><i class="fa fa-info"></i> DAFTAR </a> -->
                <a href="?halaman=daftar&kode=<?php echo $data['id_loker']; ?>"lass="btn btn-primary btn-sm"><i class="fa fa-info"></i> DAFTAR </a>
            </td>
        </tr>
        <?php
            $no++;
            }
        
        ?>
    </tbody>
  </table>