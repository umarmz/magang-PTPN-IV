<?php
 include_once("koneksi.php");

	if (isset($_POST['btnSimpan'])) {
		$sql_insert = "INSERT INTO tb_jadwal (kode_jadwal, id_loker, tgl_tes, tempat, waktu, keterangan) VALUES (
					'".$_POST['txtkode_jadwal']."',
					'".$_POST['txtloker']."',
					'".$_POST['txttgl_tes']."',
					'".addslashes($_POST['txttempat'])."',
					'".$_POST['txtwaktu']."',
					'".'Tampil'."')";
		$query_insert = mysqli_query($con,$sql_insert) or die (mysqli_connect_error());
		
		if($query_insert) {
            echo "<script>alert('Simpan Berhasil')</script>";
            echo "<meta http-equiv='refresh' content='0; url=index.php?halaman=jadwal_tampil'>";
			
		}else{
			echo "<script>alert('Simpan Gagal')</script>";
            echo "<meta http-equiv='refresh' content='0; url=index.php?halaman=jadwal_tampil'>";
		}
	}
?>
