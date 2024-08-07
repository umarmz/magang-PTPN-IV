  <?php
   include_once("koneksi.php");
  if (isset ($_POST['btnSIMPAN'])){
    //mulai proses simpan
    $sql_simpan = "INSERT INTO user (username,nama,password,email,alamat,level) VALUES (
        '".$_POST['txtusername']."',
        '".$_POST['txtnama']."',
        '".$_POST['txtpassword']."',
        '".$_POST['txtemail']."',
        '".$_POST['txtalamat']."',
        '".$_POST['rbstatus']."')";
    $query_simpan = mysqli_query($con, $sql_simpan);

    if ($query_simpan) {
        echo "<script>alert('Simpan Berhasil')</script>";
        echo "<meta http-equiv='refresh' content='0; url=index.php?halaman=super_tampil'>";
    }else{
        echo "<script>alert('Simpan Gagal')</script>";
        echo "<meta http-equiv='refresh' content='0; url=index.php?halaman=super_tampil'>";
    }
    //selesai proses simpan

}else if (isset ($_POST['btnUBAH'])){
    //mulai proses ubah
    $sql_ubah = "UPDATE user SET
        nama ='".$_POST['txtnama']."',
       password='".$_POST['txtpassword']."',
       email ='".$_POST['txtemail']."',
      alamat ='".$_POST['txtalamat']."',
       level='".$_POST['rbstatus']."'
       WHERE username='".$_POST['txtusername']."'";
    $query_ubah = mysqli_query($con, $sql_ubah);

    if ($query_ubah) {
        echo "<script>alert('Ubah Berhasil')</script>";
        echo "<meta http-equiv='refresh' content='0; url=index.php?halaman=super_tampil'>";
    }else{
        echo "<script>alert('Ubah Gagal')</script>";
        echo "<meta http-equiv='refresh' content='0; url=index.php?halaman=super_tampil'>";
    }
    //selesai proses ubah

}else{
    //mulai proses hapus
    if(isset($_GET['kode'])){
        $sql_hapus = "DELETE FROM user WHERE username='".$_GET['kode']."'";
        $query_hapus = mysqli_query($con, $sql_hapus);

        if ($query_hapus) {
            echo "<script>alert('Hapus Berhasil')</script>";
            echo "<meta http-equiv='refresh' content='0; url=index.php?halaman=super_tampil'>";
        }else{
            echo "<script>alert('Hapus Gagal')</script>";
            echo "<meta http-equiv='refresh' content='0; url=index.php?halaman=super_tampil'>";
        }
    }
    //selesai proses hapus
}
?>