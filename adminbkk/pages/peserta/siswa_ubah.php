<?php
 include_once("koneksi.php");
    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * FROM tb_peserta WHERE nisn='".$_GET['kode']."'";
        $query_cek = mysqli_query($con, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
    }
?>

<form action="?halaman=siswa_aksi" method="post" enctype="multipart/form-data">
    <center><h2>Ubah Data Peserta</h2></center>

        <div class="form-group">
            <label>NISN :</label>
            <input type="text" class="form-control" placeholder="Masukkan Kode Jurusan" name="txtnisn" oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);"
            value="<?php echo $data_cek['nisn']; ?>" required="" readonly="">
        </div>

        <div class="form-group">
            <label>Nama Siswa :</label>
            <input type="text" class="form-control" placeholder="Masukkan Nama Jurusan" name="txtnama_siswa" oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);"
            value="<?php echo $data_cek['nama']; ?>"  required="">
        </div>
        
        <div class="form-group">
                    <label>JENIS KELAMIN :</label>
                    <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="radio" name="rbjekel" value="<?php echo $data_cek['jekel']; ?>"> Pria
                    <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="radio" name="rbjekel" value="<?php echo $data_cek['jekel']; ?>"> Wanita
        </div>
       
        <div class="form-group">
                <label>Tempat Lahir</label>
                <input type="text" class="form-control" name="txttempat" placeholder="Tempat Lahir"
                oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);"  value="<?php echo $data_cek['tempat_lhr']; ?>" required/>
                </div>
                <div class="form-group">
                    <label>Tanggal Kelahiran</label>
                    <input type='date' class="form-control" name="txttanggal"  value="<?php echo $data_cek['tgl_lhr']; ?>" />
                </div>
                        <!-- <input type="text" class="form-control" name="txtket_jur" placeholder="Keterangan Jurusan"
                        oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);" required/> -->
                        <div class="form-group">
                            <label>Nama Orang Tua / Wali</label>
                            <input type="text" class="form-control" name="txtnama_ortu" placeholder="Nama Orang Tua "
                            oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);"  value="<?php echo $data_cek['nama_ortu']; ?>" required/>
                        </div>
                        <div class="form-group">
                                <label>Alamat</label>
                                <input type="text" class="form-control" name="txtalamat"
                                oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);"  value="<?php echo $data_cek['alamat']; ?>" required/>
                               
                        </div>
                        <div class="form-group">
                            <label>No. Telp</label>
                            <input type="text" class="form-control" name="txtno_telp" placeholder="Telepon"
                            oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);"  value="<?php echo $data_cek['telp']; ?>"  required/>
                        </div>
                        <div class="form-group">
                            <label>Jurusan</label>
                            <input type="text" class="form-control" name="txtjurusan" placeholder="Telepon"
                            oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);"  value="<?php echo $data_cek['jurusan']; ?>"  required/>
                        </div>
                        <div class="form-group" <label>Asal Sekolah</label>
                         <select name="txtasal_sek" id="id_sekolah" class="form-control" required>
                         <option value="">- Pilih -</option>
                         <?php
                         $sql_jur = mysqli_query($con, "select id_sekolah, nama_sekolah from tb_sekolah") or die
                             (mysqli_error($con));
                             while($data_jur = mysqli_fetch_array($sql_jur)) {
                                 echo '<option value="'.$data_jur['id_sekolah'].'">'.$data_jur['id_sekolah'].' - '.$data_jur['nama_sekolah'].'</option>';
                             } ?>
                         </select>
                       </div>
                 <div class="form-group">
                    <label>Tahun :</label><br>
                    <select name="txttahun">
                        <option value="">Tahun Masuk</option>
                        <?php
                        $thn_skr = date('Y');
                        for ($x = $thn_skr; $x >= 2010; $x--) {
                        ?>
                            <option value="<?php echo $data_cek['tahun_lulus']; ?>"><?php echo $x ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
        <div class="form-group">
            <button type="submit" class="btn btn-warning btn-sm" name="btnUBAH">UBAH</button>
            <a href="?halaman=siswa_tampil" class='btn btn-dark btn-sm'>BATAL</a>
        </div>
        
</form>