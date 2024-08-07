<?php	
	 include_once("koneksi.php");
    ?>

<div class="form-group">

<br>
<div class="card mb-3">
<div class="card-header">
<a data-toggle="modal" data-target="#myModal" class="btn btn-primary btn-sm">Tambah Jadwal Seleksi</a> </div>
<br>
<br>
<div class="box box-primary">
<div class="box-header with-border">
  <h3 class="box-title">Jadwal Tes Seleksi</h3>

  <div class="box-tools pull-right">
    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
    </button>
    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
  </div>
</div>
<?php
          if ($data_status=="Ka. BKK" || $data_status=="Operator"){
            ?>
<div class="box-body">
<table id="example1" class="table table-bordered table-striped">
                
        <thead>
    <center>      <tr>
        <th>No</th>
        <th>Kode Jadwal</th>
        <th>Nama Perusahaan</th>
        <th>Lowongan</th>
        <th>Tanggal    </th>
        <th>Tempat</th>
        <th>Waktu</th>
        <th>Pilihan</th>
    </tr>
    </center>
    </thead>
    <tbody>
    
        <?php
            
            $sql_tampil = "SELECT tb_jadwal.kode_jadwal,tb_jadwal.id_loker, tb_loker.nm_perusahaan, tb_loker.nm_loker, tgl_tes,tempat,waktu FROM tb_jadwal,tb_loker WHERE tb_jadwal.id_loker=tb_loker.id_loker AND tb_jadwal.keterangan = 'Tampil' ";
            $query_tampil = mysqli_query($con, $sql_tampil);
            $no=1;
            while ($data = mysqli_fetch_array($query_tampil,MYSQLI_BOTH)) {
        ?>
        <tr>       
            <td><?php echo $no; ?></td>
            <td><?php echo $data['kode_jadwal']; ?></td>
            <td><?php echo $data['nm_perusahaan']; ?></td>
            <td><?php echo $data['nm_loker']; ?></td>
            <td><?php echo date('d F Y', strtotime($data['tgl_tes'])); ?></td>
            <td><?php echo $data['tempat']; ?></td>
            <td><?php echo $data['waktu']; ?></td>
            <td>
              <a href="?halaman=jadwal_arsip&kode=<?php echo $data['kode_jadwal']; ?>"class='btn btn-warning btn-sm'><i class="fa fa-archive"></i></a>
              <a href="?halaman=jadwal_ubah&kode=<?php echo $data['kode_jadwal']; ?>"class='btn btn-warning btn-sm'><i class="fa fa-edit"></i></a>
              <a href="?halaman=jadwal_aksi&kode=<?php echo $data['kode_jadwal']; ?>"onclick="return confirm('Apakah anda yakin hapus data ini ?')" class='btn btn-danger btn-sm'><i class="fa fa-trash"></i></i></a>
          </td>
        </tr>
        <?php
            $no++;
            }
        
        ?>
    </tbody>
  </table>
<?php
    } elseif ($data_status=="Perusahaan / CV"){
        ?>
<div class="box-body">
<table id="example1" class="table table-bordered table-striped">
<thead>
  <center>      <tr>
      <th>No</th>
      <th>Kode Jadwal</th>
      <th>Nama Perusahaan</th>
      <th>Lowongan</th>
      <th>Tanggal    </th>
      <th>Tempat</th>
      <th>Waktu</th>
      <th>Opsi</th>
  </tr>
  </center>
  </thead>
  <tbody>
      <?php
          
          $sql_tampil = "SELECT tb_jadwal.kode_jadwal,tb_jadwal.id_loker, tb_loker.nm_perusahaan, tb_loker.nm_loker, tgl_tes,tempat,waktu FROM tb_jadwal,tb_loker WHERE tb_jadwal.id_loker=tb_loker.id_loker AND tb_jadwal.keterangan = 'Tampil' ";
          $query_tampil = mysqli_query($con, $sql_tampil);
          $no=1;
          while ($data = mysqli_fetch_array($query_tampil,MYSQLI_BOTH)) {
      ?>
      <tr>       
          <td><?php echo $no; ?></td>
          <td><?php echo $data['kode_jadwal']; ?></td>
          <td><?php echo $data['nm_perusahaan']; ?></td>
          <td><?php echo $data['nm_loker']; ?></td>
          <td><?php echo date('d F Y', strtotime($data['tgl_tes'])); ?></td>
          <td><?php echo $data['tempat']; ?></td>
          <td><?php echo $data['waktu']; ?></td>
          <td>
              <a href="?halaman=jadwal_ubah&kode=<?php echo $data['kode_jadwal']; ?>"class='btn btn-warning btn-sm'><i class="fa fa-edit"></i></a>
              <a href="?halaman=jadwal_aksi&kode=<?php echo $data['kode_jadwal']; ?>"onclick="return confirm('Apakah anda yakin hapus data ini ?')" class='btn btn-danger btn-sm'><i class="fa fa-trash"></i></i></a>
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
        $carikode = mysqli_query($con,"SELECT MAX(kode_jadwal) FROM tb_jadwal") or die (mysqli_error());
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
        $hasilkode = $data_username."/".$tahun."/JSK/".str_pad($kode,4, "0", STR_PAD_LEFT);
        }else{
            $hasilkode = "P001/2020/JSK/0001";
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
				<h4 class="modal-title">Input Jadwal Tes Seleksi</h4>
			</div>
			<div class="modal-body">
                <form action="?halaman=jadwal_tambah" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label>Kode jadwal</label>
                        <input type="text" class="form-control" name="txtkode_jadwal" value="<?php echo $hasilkode; ?>" readonly />
                    </div>
                    <div class="form-group" 
                    <label>Kode Lowongan</label>
                    <select name="txtloker" id="id_loker" class="form-control" required>
                    <option value="">- Pilih -</option>
                    <?php
                    $sql_jur = mysqli_query($con, "select id_loker , nm_loker from tb_loker where nm_perusahaan ='$data_nama' AND status ='Tampil'") or die
                        (mysqli_error($con));
                        while($data_jur = mysqli_fetch_array($sql_jur)) {
                            echo '<option value="'.$data_jur['id_loker'].'">'.$data_jur['id_loker'].' - '.$data_jur['nm_loker'].'</option>';
                        } ?>
                    </select>
                       </div>
                    <div class="form-group">
						<label>Tanggal</label>
                        <input type="date" class="form-control" name="txttgl_tes"
                        oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);" required/>
                    </div>
                    <div class="form-group">
						<label>Tempat</label>
                        <input type="text" class="form-control" name="txttempat" placeholder="Tempat / Ruangan"
                        oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);" required/>
                    </div>
                    <div class="form-group">
						<label>Waktu</label>
                        <input type="text" class="form-control" name="txtwaktu" placeholder="Waktu Pelaksanaan"
                        oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);" required/>
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