  <?php
   include_once("koneksi.php");
     if (isset ($_POST['btnUBAH'])){
        //mulai proses ubah
        $sql_ubah = "UPDATE tb_peserta SET
            nama='".$_POST['txtnama_siswa']."',
            jekel='".$_POST['rbjekel']."',
            tempat_lhr='".$_POST['txttempat']."',
            tgl_lhr='".$_POST['txttanggal']."',
            nama_ortu='".$_POST['txtnama_ortu']."',
            alamat='".$_POST['txtalamat']."',
            telp='".$_POST['txtno_telp']."',
            jurusan='".$_POST['txtjurusan']."',
            id_sekolah='".$_POST['txtasal_sek']."',
            tahun_lulus='".$_POST['txttahun']."'
            WHERE nisn='".$_POST['txtnisn']."'";
        $query_ubah = mysqli_query($con, $sql_ubah);

        if ($query_ubah) {
            echo "<script>alert('Ubah Berhasil')</script>";
            echo "<meta http-equiv='refresh' content='0; url=index.php?halaman=siswa_tampil'>";
        }else{
            echo "<script>alert('Ubah Gagal')</script>";
            echo "<meta http-equiv='refresh' content='0; url=index.php?halaman=siswa_tampil'>";
        }
        //selesai proses ubah

    }else{
        //mulai proses hapus
        if(isset($_GET['kode'])){
            $sql_hapus = "DELETE FROM tb_siswa WHERE nisn='".$_GET['kode']."'";
            $query_hapus = mysqli_query($con, $sql_hapus);

            if ($query_hapus) {
                echo "<script>alert('Hapus Berhasil')</script>";
                echo "<meta http-equiv='refresh' content='0; url=index.php?halaman=siswa_tampil'>";
            }else{
                echo "<script>alert('Hapus Gagal')</script>";
                echo "<meta http-equiv='refresh' content='0; url=index.php?halaman=siswa_tampil'>";
            }
        }
        //selesai proses hapus
    }

?>