  <?php
  include_once("koneksi.php");
  if (isset ($_POST['btnUBAH'])){
        //mulai proses ubah
        $sql_ubah = "UPDATE tb_jadwal SET
            id_loker='".$_POST['txtkode_loker']."',
            tgl_tes='".$_POST['txttgl_tes']."',
            tempat='".$_POST['txttempat']."',
            waktu='".$_POST['txtwaktu']."'
            WHERE kode_jadwal='".$_POST['txtkode_jadwal']."'";
        $query_ubah = mysqli_query($con, $sql_ubah);

        if ($query_ubah) {
            echo "<script>alert('Ubah Berhasil')</script>";
            echo "<meta http-equiv='refresh' content='0; url=index.php?halaman=jadwal_tampil'>";
        }else{
            echo "<script>alert('Ubah Gagal')</script>";
            echo "<meta http-equiv='refresh' content='0; url=index.php?halaman=jadwal_tampil'>";
        }
        //selesai proses ubah

    }else{
        //mulai proses hapus
        if(isset($_GET['kode'])){
            $sql_hapus = "DELETE FROM tb_jadwal WHERE kode_jadwal='".$_GET['kode']."'";
            $query_hapus = mysqli_query($con, $sql_hapus);

            if ($query_hapus) {
                echo "<script>alert('Hapus Berhasil')</script>";
                echo "<meta http-equiv='refresh' content='0; url=index.php?halaman=jadwal_tampil'>";
            }else{
                echo "<script>alert('Hapus Gagal')</script>";
                echo "<meta http-equiv='refresh' content='0; url=index.php?halaman=jadwal_tampil'>";
            }
        }
        //selesai proses hapus
    }

?>