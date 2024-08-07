<?php	
 include_once("koneksi.php");
    ?>

<?php
          if ($data_status=="Operator" || $data_status=="Ka. BKK"){
            ?>
<div class="form-group">

<br>
<div class="card mb-3">
<div class="card-header">
<a data-toggle="modal" data-target="#myModal" class="btn btn-primary btn-sm">Tambah Lowongan</a> <br></div><br>

<div class="box box-primary">
<div class="box-header with-border">
  <h3 class="box-title">Lowongan Kerja</h3>

  <div class="box-tools pull-right">
    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
    </button>
    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
  </div>
</div>
<div class="box-body">
<table id="example1" class="table table-bordered table-striped">
<thead>
    <center>
      <tr>
        <th>No</th>
        <th>Kode Lowongan</th>
        <th>Nama Perusahaan</th>
        <th>Lowongan</th>
        <th>Jenis Kelamin</th>
        <th>Keterangan</th>
        <th>Sumber</th>
        <th>Batas</th>
        <th>Status</th>
        <th>Piihan</th>
    </tr>
    </center>
    </thead>
    <tbody>
    <?php
            
            $sql_otoarsip="UPDATE tb_loker SET status='Arsip' WHERE batas=curdate()";
            $query_oto = mysqli_query($con, $sql_otoarsip);
          
        ?>
        <?php
            
            $sql_tampil = "SELECT * FROM tb_loker";
            // $sql_tampil .="UPDATE tb_loker SET status='Arsip' WHERE batas=curdate()";
            $query_tampil = mysqli_query($con, $sql_tampil);
            $no=1;
            while ($data = mysqli_fetch_array($query_tampil,MYSQLI_BOTH)) {
          
        ?>
        <tr>       
            <td><?php echo $no; ?></td>
            <td><?php echo $data['id_loker']; ?></td>
            <td><?php echo $data['nm_perusahaan']; ?></td>
            <td><?php echo $data['nm_loker']; ?></td>
            <td><?php echo $data['jekel']; ?></td>
            <td><?php echo $data['keterangan']; ?></td>
            <td><?php echo $data['sumber']; ?></td>
            <td><?php echo date('d F Y', strtotime($data['batas'])); ?></td>
            <td><?php echo $data['status']; ?></td>
            <td>
                <a href="?halaman=loker_konfirm&kode=<?php echo $data['id_loker']; ?>"class='btn btn-warning btn-sm'><i class="fa fa-eye"></i></a>
                <a href="?halaman=loker_arsip&kode=<?php echo $data['id_loker']; ?>"class='btn btn-warning btn-sm'><i class="fa fa-archive"></i></a>
                <a href="?halaman=loker_ubah&kode=<?php echo $data['id_loker']; ?>"class='btn btn-warning btn-sm'><i class="fa fa-edit"></i></a>
                <a href="?halaman=loker_aksi&kode=<?php echo $data['id_loker']; ?>"onclick="return confirm('Apakah anda yakin hapus data ini ?')" class='btn btn-danger btn-sm'><i class="fa fa-trash"></i></i></a>
            </td>
        </tr>
        <?php
            $no++;
            }
        
        ?>
    </tbody>
  </table>
  <div id="myModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Tambah Lowongan Baru</h4>
			</div>
			<div class="modal-body">
                <form action="?halaman=loker_tambah" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label>Kode Loker</label>
                        <input type="text" class="form-control" name="txtkode_loker" placeholder="Kode Lowongan" />
                    </div>
					<div class="form-group">
						<label>Nama Perusahaan</label>
                        <input type="text" class="form-control" name="txtnm_perusahaan" placeholder="Nama Perusahaan / CV"
                        oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);" required/>
                    </div>
                    <div class="form-group">
						<label>Lowongan</label>
                        <input type="text" class="form-control" name="txtnm_loker" placeholder="Lowongan"
                        oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);" required/>
                    </div>
					<div class="form-group">
                        <label>Keterangan</label>
                        <textarea class="form-control" name="txtketerangan"
                        oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);" required/>
                </textarea>
                <div class="form-group">
						<label>Sumber</label>
                        <?php echo  $data_nama;?>
                    </div>
                </div>
                    
				<div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary" name="btnSimpan">Simpan</button>
				</div>
			</form>
        </div>
        <?php
        } elseif ($data_status=="Perusahaan / CV"){
          ?>
          <div class="form-group">

<br>
<div class="card mb-3">
<div class="card-header">
<a data-toggle="modal" data-target="#myModal" class="btn btn-primary btn-sm">Tambah Lowongan</a> </div>
<br>
<br>
<div class="box box-primary">
<div class="box-header with-border">
  <h3 class="box-title">Lowongan Kerja</h3>

  <div class="box-tools pull-right">
    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
    </button>
    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
  </div>
</div>
<div class="box-body">
    <table id="example1" class="table table-bordered table-striped">
                <thead>
    <center>
      <tr>
        <th>No</th>
        <th>Kode Lowongan</th>
        <th>Nama Perusahaan</th>
        <th>Lowongan</th>
        <th>Jenis Kelamin</th>
        <th>Keterangan</th>
        <th>Tanggal</th>
        <th>Batas Akhir</th>
        <th>Status</th>
        <th>Opsi</th>
    </tr>
    </center>
    </thead>
    <tbody>
   
        <?php
            $sql_tampil = "SELECT * FROM tb_loker where sumber ='$data_nama'";
            $query_tampil = mysqli_query($con, $sql_tampil);
            $no=1;
            while ($data = mysqli_fetch_array($query_tampil,MYSQLI_BOTH)) {
        ?>
        <tr>       
            <td><?php echo $no; ?></td>
            <td><?php echo $data['id_loker']; ?></td>
            <td><?php echo $data['nm_perusahaan']; ?></td>
            <td><?php echo $data['nm_loker']; ?></td>
            <td><?php echo $data['jekel']; ?></td>
            <td><?php echo $data['keterangan']; ?></td>
            <td><?php echo date('d F Y', strtotime($data['tanggal'])); ?></td>
            <td><?php echo date('d F Y', strtotime($data['batas'])); ?></td>
            <td><?php echo $data['status']; ?></td>
            <td>
                <a href="?halaman=loker_ubah&kode=<?php echo $data['id_loker']; ?>"class='btn btn-warning btn-sm'><i class="fa fa-edit"></i></a>
                <a href="?halaman=loker_aksi&kode=<?php echo $data['id_loker']; ?>"onclick="return confirm('Apakah anda yakin hapus data ini ?')" class='btn btn-danger btn-sm'><i class="fa fa-trash"></i></i></a>
            </td>
        </tr>
        <?php
            $no++;
            }
        
        ?>
        <?php 
         include_once("koneksi.php");
        $tahun = date ('Y');
        // KODE OTOMATIS
        // membuat query max untuk kode
        $carikode = mysqli_query($con,"SELECT MAX(id_loker) FROM tb_loker") or die (mysqli_error());
        // menjadikannya array
        $datakode = mysqli_fetch_array($carikode);
        // jika $datakode
        if ($datakode) {
        // membuat variabel baru untuk mengambil kode mulai dari 3   P001/2020/HSL001
        $nilaikode = substr($datakode[0], 14);   
        // menjadikan $nilaikode ( int )
        $kode = (int) $nilaikode;
        // setiap $kode di tambah 1
        $kode = $kode + 1;
        // hasil untuk menambahkan kode 
        // angka 3 untuk menambahkan tiga angka setelah B dan angka 0 angka yang berada di tengah
        // atau angka sebelum $kode
        $hasilkode = $data_username."/".$tahun."/LK/".str_pad($kode,4, "0", STR_PAD_LEFT);
        }else{
            $hasilkode = "P001/2020/LK/0001";
        }
        // KODE OTOMATIS
    ?>
    
    </tbody>
  </table>
  <div id="myModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Tambah Lowongan Baru</h4>
			</div>
			<div class="modal-body">
                <form action="?halaman=loker_tambah_per" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label>Kode Loker</label>
                        <input type="text" class="form-control" name="txtkode_loker" value="<?php echo $hasilkode; ?>" readonly />
                    </div>
					<div class="form-group">
						<label>Nama Perusahaan</label>
                        <input type="text" class="form-control" name="txtnm_perusahaan"
                        oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);" value=" <?php echo  $data_nama;?>" readonly />
                    </div>
                    <div class="form-group">
						<label>Lowongan</label>
                        <input type="text" class="form-control" name="txtnm_loker" placeholder="Lowongan"
                        oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);" required/>
                    </div>
                    <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <select name="txtjekel" class="form-control" required>
                    <option value="">- Pilih -</option>
                        <option>Pria</option>
                        <option>Wanita</option>
                        <option>Pria/Wanita</option>
                    </select>
                  </div>
					<div class="form-group">
                        <label>Keterangan</label>
                        <textarea class="form-control" name="txtketerangan"
                        oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);" required/>
                </textarea>
                </div>
                <div class="form-group">
						<label>Tanggal</label>
                        <input type="date" class="form-control" name="txttgl"
                        oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);" required/>
                    </div>
                <div class="form-group">
						<label>Batas Tanggal</label>
                        <input type="date" class="form-control" name="txtbatas"
                        oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);" required/>
                    </div>
                <div class="form-group">
						<label>Sumber</label>
                        <?php echo  $data_nama;?>
                    </div>
                </div>
				<div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary" name="btnSimpan">Simpan</button>
				</div>
			</form>
        </div>
        <?php
                    }
                ?>