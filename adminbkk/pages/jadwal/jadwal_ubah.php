<?php
$konek = mysqli_connect("localhost","root","","bkk");
    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * FROM tb_jadwal WHERE kode_jadwal='".$_GET['kode']."'";
        $query_cek = mysqli_query($konek, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
    }
?>

<form action="?halaman=jadwal_aksi" method="post" enctype="multipart/form-data">
    <center><h3>Ubah Data Jadwal Tes</h3></center>

        <div class="form-group">
            <label>Kode Lowongan :</label>
            <input type="text" class="form-control"  name="txtkode_jadwal" oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);"
            value="<?php echo $data_cek['kode_jadwal']; ?>" required="" readonly="">
        </div>

        <div class="form-group">
            <label>Kode Lowongan :</label>
            <input type="text" class="form-control"  name="txtkode_loker" oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);"
            value="<?php echo $data_cek['id_loker']; ?>"  required="" readonly="">
        </div>

        <div class="form-group">
            <label>Tanggal :</label>
            <input type="date" class="form-control" name="txttgl_tes" oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);"
            value="<?php echo $data_cek['tgl_tes']; ?>"  required="">
        </div>

        <div class="form-group">
            <label>Tempat :</label>
            <input type="text" class="form-control" name="txttempat" oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);"
            value="<?php echo $data_cek['tempat']; ?>"  required="">

        <div class="form-group">
            <label>Waktu :</label>
            <input type="text" class="form-control" name="txtwaktu" oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);"
            value="<?php echo $data_cek['waktu']; ?>"  required="">
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-warning btn-sm" name="btnUBAH">UBAH</button>
            <a href="?halaman=jadwal_tampil" class='btn btn-dark btn-sm'>BATAL</a>
        </div>
        
</form>