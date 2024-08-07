<?php
     include_once("koneksi.php");
    if(isset($_GET['kode'])){
    $sql_aktif = "UPDATE user SET status = 'Aktif' where username = '".$_GET['kode']."'";
        $query_aktif = mysqli_query($con, $sql_aktif);

            if ($query_aktif) {
                echo "<script>alert('User Aktif')</script>";
                echo "<meta http-equiv='refresh' content='0; url=?halaman=super_tampil'>";
            }else{
                echo "<script>alert('konfirmasi Gagal')</script>";
                echo "<meta http-equiv='refresh' content='0; url=halaman=super_tampil'>";
            }
        }
?>