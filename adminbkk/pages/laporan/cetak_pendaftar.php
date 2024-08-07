<?php 
    include_once("../../koneksi.php");
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Laporan Data Perusahaan</title>

    <!-- Bootstrap core CSS -->
    <link href="css/sb-admin.min.css" rel="stylesheet">
</head>

<body style=color:black;>

<table border="0" cellspacing="0" cellpadding="0">
    <thead>

    </thead>
    <tbody>
        <tr>       
            <td style=width:150px;>
				<center>
				<img src="img/maarif.jpg" width="110" height="110">
				</center>
			</td>
            <td style=width:1066px;>
                <center>
				BURSA KERJA KHUSUS<br>
				<b>YAYASAN SMK MA'ARIF KUDUS</b><br>
				Desa Prambatan Lor No.679, Pereng, Prambatan Lor, Kec. Kaliwungu <br> Kabupaten Kudus, Jawa Tengah 59361<br>
                Email : smknumaarifkudus@yahoo.com <br>
                <!-- Website : kecamatangembong.patikab.go.id<br> -->
                </center>
            </td>
			<td style=width:150px;>
            <center>
				<img src="img/iso.jpg" width="130" height="110">
				</center>
			</td>
        </tr>
    </tbody>
</table>

<hr>
<br>
<center>
<h3>Laporan Data Perusahaan</h3>
</center>
<table class="table table-bordered" >
		<thead>
			<tr>
				<th>No</th>
				<th>Id</th>
                <th>NISN</th>
				<th>Nama</th>
                <th>Loker</th> 
				<th>Perusahaan</th>
				<th>Asal Sekolah</th>
			</tr>
		</thead>
	<tbody>
    <?php
         
            $sql_tampil = "SELECT tb_pendaftaran.id_pendaftaran, tb_peserta.nisn, tb_peserta.nama, tb_loker.id_loker,tb_loker.nm_loker, tb_loker.nm_perusahaan, tb_sekolah.nama_sekolah FROM tb_pendaftaran, tb_peserta, tb_loker, tb_sekolah WHERE tb_pendaftaran.nisn=tb_peserta.nisn AND tb_pendaftaran.id_loker=tb_loker.id_loker AND tb_peserta.id_sekolah=tb_sekolah.id_sekolah ORDER BY id_pendaftaran DESC ";
            $query_tampil = mysqli_query($con, $sql_tampil);
            $no=1;
            while ($data = mysqli_fetch_array($query_tampil,MYSQLI_BOTH)) {
        ?>
        <tr>       
        <td><?php echo $no; ?></td>
        <td><?php echo $data['id_pendaftaran']; ?></td>
        <td><?php echo $data['nisn']; ?></td>
        <td><?php echo $data['nama']; ?></td>
        <td><?php echo $data['nm_loker']; ?></td>
        <td><?php echo $data['nm_perusahaan']; ?></td>
        <td><?php echo $data['nama_sekolah']; ?></td>
            
        </tr>
        </center>
        <?php
            $no++;
            }
        ?>

		</tbody>
	</table>

<br>
<table border="0" cellspacing="0" cellpadding="0">
    <thead>

    </thead>
    <tbody>
        <tr>       
            <td style=width:1040px;></td>
            <td style=width:330px;>
            <br><br><br>
                <div style=text-align:center;><b>Kudus, <?php echo date("d-m-Y"); ?></b><br></div>
                <br>
                <center>KEPALA BKK SMK
                <br><br><br><br>
                <u><b>Arif Syaifudin, ST</b></u><br>
                Pembina Tingkat I<br>
                NIP : 0123456789
                </center>
            </td>
        </tr>
    </tbody>
</table>
</center>
<script>
    window.print();
</script>

</body>
</html>

