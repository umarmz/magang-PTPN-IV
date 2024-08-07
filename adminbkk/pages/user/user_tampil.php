<?php	
	 include_once("koneksi.php");
    ?>

<!-- <h4><span class="glyphicon glyphicon-briefcase"></span>User Peserta</h4> -->
<div class="form-group">

<br>
<div class="card mb-3">
<div class="card-header">
<a href="?halaman=user_tambah" class="btn btn-primary btn-sm">Tambah User</a> </div>
<br>
<div class="box box-primary">
<div class="box-header with-border">
  <h3 class="box-title">User Peserta</h3>

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
      <th>NO</th>
      <th>USERNAME/NISN</th>
      <th>NAMA PENGGUNA</th>
      <th>STATUS</th>
      <th>KET</th>
    </tr>
    </center>
    </thead>
    <tbody>
    
        <?php
            
            $sql_tampil = "SELECT tb_user.nisn,tb_peserta.nama,tb_user.password,tb_user.level FROM tb_user, tb_peserta WHERE tb_user.nisn=tb_peserta.nisn";
            $query_tampil = mysqli_query($con, $sql_tampil);
            $no=1;
            while ($data = mysqli_fetch_array($query_tampil,MYSQLI_BOTH)) {
        ?>
        <tr>       
            <td><?php echo $no; ?></td>
            <td><?php echo $data['nisn']; ?></td>
            <td><?php echo $data['nama']; ?></td>
            <td><?php echo $data['level']; ?></td>
            <td>
                <a href="?halaman=user_ubah&kode=<?php echo $data['nisn']; ?>"class='btn btn-warning btn-sm'><i class="fa fa-edit"></i></a>
                <a href="?halaman=user_aksi&kode=<?php echo $data['nisn']; ?>"onclick="return confirm('Apakah anda yakin hapus data ini ?')" class='btn btn-danger btn-sm'><i class="fa fa-trash"></i></i></a>
            </td>
        </tr>
        <?php
            $no++;
            }
        
        ?>
    </tbody>
  </table>