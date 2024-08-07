<?php
  include_once("koneksi.php");
?>

<?php
// ambil data file
$namaFile = $_FILES['berkas']['name'];
$namaSementara = $_FILES['berkas']['tmp_name'];

// tentukan lokasi file akan dipindahkan
// $dir = "http://localhost/portalbkk/adminbkk/";
$dirUpload = "pages/pendaftar/upload/";

// pindahkan file
$terupload = move_uploaded_file($namaSementara, $dirUpload.$namaFile);

if ($terupload) {
    echo "Upload berhasil!<br/>";
    echo "Link: <a href='".$dirUpload.$namaFile."'>".$namaFile."</a>";
} else {
    echo "Upload Gagal!";
}


if (isset($_POST['btnSimpan'])) {
	$sql_insert = "INSERT INTO tb_pendaftaran (id_pendaftaran,id_loker,nisn,berkas) VALUES (
				'".$_POST['txtpendaftaran']."',
				'".$_POST['txtid_loker']."',
				'".$_POST['txtnisn']."',
				'".$namaFile."')";
		$query_insert = mysqli_query($con,$sql_insert) or die ;
		if($query_insert) {
            echo "<script>alert('Upload Berhasil')</script>";
            echo "<meta http-equiv='refresh' content='0; url=index.php?halaman=pendaftar_tampil'>";
			
		}else{
			echo "<script>alert('Upload Gagal')</script>";
            echo "<meta http-equiv='refresh' content='0; url=index.php?halaman=pendaftar_tampil'>";
		}
	}
?>
