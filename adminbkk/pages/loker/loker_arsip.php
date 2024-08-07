<?php
     include_once("koneksi.php");
    if(isset($_GET['kode'])){
    $sql_arsip = "UPDATE tb_loker SET status = 'Arsip' where id_loker = '".$_GET['kode']."'";
        $query_arsip = mysqli_query($con, $sql_arsip);

            if ($query_arsip) {
                echo "<script>alert('Arsip Berhasil')</script>";
                echo "<meta http-equiv='refresh' content='0; url=?halaman=loker_tampil'>";
            }else{
                echo "<script>alert('Arsip Gagal')</script>";
                echo "<meta http-equiv='refresh' content='0; url=halaman=loker_tampil'>";
            }
        }
?>