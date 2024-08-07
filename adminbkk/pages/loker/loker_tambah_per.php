<?php
include_once("koneksi.php");
	if (isset($_POST['btnSimpan'])) {
		$sql_insert = "INSERT INTO tb_loker (id_loker,nm_perusahaan,nm_loker,jekel,keterangan,sumber,tanggal,batas,status) VALUES (
					'".$_POST['txtkode_loker']."',
					'".$data_nama."',
					'".$_POST['txtnm_loker']."',
					'".$_POST['txtjekel']."',
					'".$_POST['txtketerangan']."',
					'".$data_nama."',
					'".$_POST['txttgl']."',
					'".$_POST['txtbatas']."',
					'".'Tangguhkan'."')";
		$query_insert = mysqli_query($con,$sql_insert) or die (mysqli_error($con));
		// include "../phpmailer/eksekutor.php"; 


		if($query_insert) {
            echo "<script>alert('Simpan Berhasil')</script>";
            echo "<meta http-equiv='refresh' content='0; url=index.php?halaman=loker_tampil'>";
			
		}else{
			echo "<script>alert('Simpan Gagal')</script>";
            echo "<meta http-equiv='refresh' content='0; url=index.php?halaman=loker_tampil'>";
		}
	}
?>