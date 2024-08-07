<div id="page-wrapper" >
<div id="page-inner">
<?php
 include_once("koneksi.php");
    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * FROM user WHERE username='".$_GET['kode']."'";
        $query_cek = mysqli_query($con, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
    }
?>

<form action="?halaman=super_aksi" method="post" enctype="multipart/form-data">
    <center><h4>Ubah Data Super User</h4></center>

<div class="form-group">
    <label>NIP :</label>
    <input type="text" class="form-control"  name="txtusername" value="<?php echo $data_cek['username']; ?>" required="" readonly="">
</div>
<div class="form-group">
    <label>Nama :</label>
    <input type="text" class="form-control"  name="txtnama" value="<?php echo $data_cek['nama']; ?>" required="">
</div>
<div class="form-group">
    <label>Password :</label>
    <input type="text" class="form-control" name="txtpassword" value="<?php echo $data_cek['password']; ?>" required="">
</div>
<div class="form-group">
    <label>Email :</label>
    <input type="text" class="form-control" name="txtemail" value="<?php echo $data_cek['email']; ?>" required="">
</div>
<div class="form-group">
    <label>Alamat :</label>
    <input type="text" class="form-control" name="txtalamat" value="<?php echo $data_cek['alamat']; ?>" required="">
</div>
<label>Level Pengguna :</label>
         <select name="rbstatus" class="form-control" value="<?php echo $data_cek['level']; ?>" required="">
         <option>Ka. BKK</option>
         <option>Perusahaan / CV</option>
         <option>Operator</option>
        </select>

<div class="form-group">
    <button type="submit" class="btn btn-warning btn-sm" name="btnUBAH">UBAH</button>
    <a href="?halaman=super_tampil" class='btn btn-dark btn-sm'>BATAL</a>
</div>

</form>