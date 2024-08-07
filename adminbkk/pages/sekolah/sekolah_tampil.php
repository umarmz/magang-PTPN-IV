<?php 
     include_once("koneksi.php");
    // KODE OTOMATIS
	// membuat query max untuk kode
	$carikode = mysqli_query($con,"SELECT MAX(id_sekolah) FROM tb_sekolah") or die (mysqli_error());
	// menjadikannya array
	$datakode = mysqli_fetch_array($carikode);
	// jika $datakode
	if ($datakode) {
	// membuat variabel baru untuk mengambil kode mulai dari 3
	$nilaikode = substr($datakode[0], 3);
	// menjadikan $nilaikode ( int )
	$kode = (int) $nilaikode;
	// setiap $kode di tambah 1
	$kode = $kode + 1;
	// hasil untuk menambahkan kode 
	// angka 3 untuk menambahkan tiga angka setelah B dan angka 0 angka yang berada di tengah
	// atau angka sebelum $kode
	$hasilkode = "YSM".str_pad($kode,2, "0", STR_PAD_LEFT);
	}else{
		$hasilkode = "YSM01";
	}
    // KODE OTOMATIS
    ?>
<!-- <h4><span class="glyphicon glyphicon-briefcase"></span>Yayasan SMK NU Ma'arif Kudus</h4> -->
<div class="form-group">

<br>
<div class="card mb-3">
<div class="card-header">
<a data-toggle="modal" data-target="#myModal" class="btn btn-primary btn-sm">Tambah Data Sekolah</a> </div>
<br>
<div class="box box-primary">
<div class="box-header with-border">
  <h3 class="box-title">Peserta</h3>

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
        <th>Id Sekolah</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Keterangan</th>
        <th>Tahun</th>
        <th>Piihan</th>
    </tr>
    </center>
    </thead>
    <tbody>
    
        <?php
            
            $sql_tampil = "SELECT * FROM tb_sekolah";
            $query_tampil = mysqli_query($con, $sql_tampil);
            $no=1;
            while ($data = mysqli_fetch_array($query_tampil,MYSQLI_BOTH)) {
        ?>
        <tr>       
            <td><?php echo $no; ?></td>
            <td><?php echo $data['id_sekolah']; ?></td>
            <td><?php echo $data['nama_sekolah']; ?></td>
            <td><?php echo $data['email']; ?></td>
            <td><?php echo $data['keterangan']; ?></td>
            <td><?php echo $data['tahun']; ?></td>
            <td>
                <a href="?halaman=sekolah_ubah&kode=<?php echo $data['id_sekolah']; ?>"class='btn btn-warning btn-sm'><i class="fa fa-edit"></i></a>
                <a href="?halaman=sekolah_aksi&kode=<?php echo $data['id_sekolah']; ?>"onclick="return confirm('Apakah anda yakin hapus data ini ?')" class='btn btn-danger btn-sm'><i class="fa fa-trash"></i></i></a>
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
				<h4 class="modal-title">Tambah Sekolah</h4>
			</div>
			<div class="modal-body">
                <form action="?halaman=sekolah_tambah" method="post" enctype="multipart/form-data">
					<div class="form-group">
                    <label>Id Sekolah</label>
                    <input type="text" class="form-control" name="txtidsekolah" value="<?php echo $hasilkode; ?>" readonly />
                </div>
                <div class="form-group">
                    <label>Nama Sekolah</label>
                    <input type="text" class="form-control" name="txtnama_sekolah"/>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" class="form-control" name="txtemail" placeholder="Email"
                    oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);" required/>
                </div>
                <div class="form-group">
                    <label>Keterangan</label>
                    <textarea class="form-control" name="txtketerangan"
                    oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);" required/>
            </textarea>
            </div>
            <div class="form-group">
            <label>Tahun Berdiri</label><br>
            <select name="txttahun">
                <option value="">Tahun</option>
                <?php
                $thn_skr = date('Y');
                for ($x = $thn_skr; $x >= 1980; $x--) {
                ?>
                    <option value="<?php echo $x ?>"><?php echo $x ?></option>
                <?php
                }
                ?>
            </select>
        </div>
            </div>
                
				<div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary" name="btnSimpan">Simpan</button>
				</div>
			</form>
        </div>