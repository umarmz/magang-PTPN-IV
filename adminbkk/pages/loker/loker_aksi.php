 <?php
   include_once("koneksi.php");
  if (isset ($_POST['btnUBAH'])){
        //mulai proses ubah
        $sql_ubah = "UPDATE tb_loker SET
            nm_perusahaan='".$_POST['txtnm_perusahaan']."',
            nm_loker='".$_POST['txtnm_loker']."',
            jekel='".$_POST['txtjekel']."',
            keterangan='".$_POST['txtketerangan']."',
            tanggal='".$_POST['txttanggal']."',
            batas='".$_POST['txtbatas']."'
            WHERE id_loker='".$_POST['txtkode_loker']."'";
        $query_ubah = mysqli_query($con, $sql_ubah);

        if ($query_ubah) {
            echo "<script>alert('Ubah Berhasil')</script>";
            echo "<meta http-equiv='refresh' content='0; url=index.php?halaman=loker_tampil'>";
        }else{
            echo "<script>alert('Ubah Gagal')</script>";
            echo "<meta http-equiv='refresh' content='0; url=index.php?halaman=loker_tampil'>";
        }
        //selesai proses ubah

    }else if (isset ($_POST['btnArsip'])){
        //mulai proses ubah
        $sql_ubah = "UPDATE tb_loker SET
            staus ='".'Arsip'."'
            WHERE id_loker='".$_POST['txtkode_loker']."'";
        $query_ubah = mysqli_query($con, $sql_ubah);

        if ($query_ubah) {
            echo "<script>alert('Ubah Berhasil')</script>";
            echo "<meta http-equiv='refresh' content='0; url=index.php?halaman=loker_tampil'>";
        }else{
            echo "<script>alert('Ubah Gagal')</script>";
            echo "<meta http-equiv='refresh' content='0; url=index.php?halaman=loker_tampil'>";
        }
        //selesai proses ubah
    }else{
        //mulai proses hapus
        if(isset($_GET['kode'])){
            $sql_hapus = "DELETE FROM tb_loker WHERE id_loker='".$_GET['kode']."'";
            $query_hapus = mysqli_query($con, $sql_hapus);

            if ($query_hapus) {
                echo "<script>alert('Hapus Berhasil')</script>";
                echo "<meta http-equiv='refresh' content='0; url=index.php?halaman=loker_tampil'>";
            }else{
                echo "<script>alert('Hapus Gagal')</script>";
                echo "<meta http-equiv='refresh' content='0; url=index.php?halaman=loker_tampil'>";
            }
        }
        //selesai proses hapus
    }

?>