<?php
 include_once("koneksi.php");

	if (isset($_POST['btnSimpan'])) {
		$sql_insert = "INSERT INTO tb_loker (id_loker,nm_perusahaan,nm_loker,keterangan,sumber,status) VALUES (
					'".$_POST['txtkode_loker']."',
					'".$_POST['txtnm_perusahaan']."',
					'".$_POST['txtnm_loker']."',
					'".$_POST['txtketerangan']."',
					'".$data_nama."',
					'".'Tangguhkan'."')";
		$query_insert = mysqli_query($con,$sql_insert);
		
		if($query_insert) {
            echo "<script>alert('Simpan Berhasil')</script>";
            echo "<meta http-equiv='refresh' content='0; url=index.php?halaman=loker_tampil'>";
			
		}else{
			echo "<script>alert('Simpan Gagal')</script>";
            echo "<meta http-equiv='refresh' content='0; url=index.php?halaman=loker_tampil'>";
		}
	}
?>
