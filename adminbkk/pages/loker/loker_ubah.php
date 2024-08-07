<?php
 include_once("koneksi.php");
    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * FROM tb_loker WHERE id_loker='".$_GET['kode']."'";
        $query_cek = mysqli_query($con, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
    }
?>

<form action="?halaman=loker_aksi" method="post" enctype="multipart/form-data">
    <center><h2>Ubah Data Lowongan</h2></center>

        <div class="form-group">
            <label>Kode Lowongan :</label>
            <input type="text" class="form-control"  name="txtkode_loker" oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);"
            value="<?php echo $data_cek['id_loker']; ?>" required="" readonly="">
        </div>

        <div class="form-group">
            <label>Nama Perusahaan :</label>
            <input type="text" class="form-control"  name="txtnm_perusahaan" oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);"
            value="<?php echo $data_cek['nm_perusahaan']; ?>"  required="">
        </div>

        <div class="form-group">
            <label>Lowongan :</label>
            <input type="text" class="form-control" name="txtnm_loker" oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);"
            value="<?php echo $data_cek['nm_loker']; ?>"  required="">
        </div>
        <div class="form-group">
            <label>Jenis Kelamin :</label>
            <select name="txtjekel" id="jekel" class="form-control" required>
            <option value="<?php echo $data_cek['jekel']; ?>">- Pilih -</option>
                <option>Pria</option>
                <option>Wanita</option>
                <option>Pria/Wanita</option>
            </select>
        </div>

        <div class="form-group">
            <label>Keterangan :</label>
            <input type="text" class="form-control" name="txtketerangan" oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);"
            value="<?php echo $data_cek['keterangan']; ?>" required="">
        </div>
        <div class="form-group">
						<label>Tanggal</label>
                        <input type="date" class="form-control" name="txttanggal"
                        oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);" 
                        value="<?php echo $data_cek['tanggal']; ?>"required/>
                    </div>
        <div class="form-group">
						<label>Batas Tanggal</label>
                        <input type="date" class="form-control" name="txtbatas"
                        oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);" 
                        value="<?php echo $data_cek['batas']; ?>"required/>
                    </div>

        <div class="form-group">
            <button type="submit" class="btn btn-warning btn-sm" name="btnUBAH">UBAH</button>
            <a href="?halaman=loker_tampil" class='btn btn-dark btn-sm'>BATAL</a>
        </div>
        
</form>