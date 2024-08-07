<?php	
	 include_once("koneksi.php");
    ?>

<!-- <h4><span class="glyphicon glyphicon-briefcase"></span>Super User</h4> -->
<div class="form-group">

<br>
<div class="card mb-3">
<div class="card-header">
<a href="?halaman=super_tambah" class="btn btn-primary btn-sm">Tambah User</a> </div>
<br>
<div class="box box-primary">
<div class="box-header with-border">
  <h3 class="box-title">Super User</h3>

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
        <th>Username</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Alamat</th>
        <th>Posisi</th>
        <th>Status</th>
        <th>Piihan</th>
    </tr>
    </center>
    </thead>
    <tbody>
    
        <?php
            
            $sql_tampil = "SELECT * FROM user";
            $query_tampil = mysqli_query($con, $sql_tampil);
            $no=1;
            while ($data = mysqli_fetch_array($query_tampil,MYSQLI_BOTH)) {
        ?>
        <tr>       
            <td><?php echo $no; ?></td>
            <td><?php echo $data['username']; ?></td>
            <td><?php echo $data['nama']; ?></td>
            <td><?php echo $data['email']; ?></td>
            <td><?php echo $data['alamat']; ?></td>
            <td><?php echo $data['level']; ?></td>
            <td><?php echo $data['status']; ?></td>
            <td>
                <a href="?halaman=super_aktif&kode=<?php echo $data['username']; ?>"class='btn btn-warning btn-sm'><i class="fa fa-check"></i></a>
                <a href="?halaman=super_ubah&kode=<?php echo $data['username']; ?>"class='btn btn-warning btn-sm'><i class="fa fa-edit"></i></a>
                <a href="?halaman=super_aksi&kode=<?php echo $data['username']; ?>"onclick="return confirm('Apakah anda yakin hapus data ini ?')" class='btn btn-danger btn-sm'><i class="fa fa-trash"></i></i></a>
            </td>
        </tr>
        <?php
            $no++;
            }
        
        ?>
    </tbody>
  </table>
  