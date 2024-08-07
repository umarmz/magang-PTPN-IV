<?php
 include_once("../koneksi.php");
    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * FROM tb_loker WHERE id_loker='".$_GET['kode']."'";
        $sql_name = "SELECT nm_loker FROM tb_loker WHERE id_loker='".$_GET['kode']."'";
        $query_cek = mysqli_query($con, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
    }
?>
<div class="form-group">

<br>
<div class="card mb-3">
<div class="card-header">


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
<form action="?halaman=daftar_tambah" method="post" enctype="multipart/form-data">
<center><h2>Daftar Lowongan Kerja <?php echo $data_cek['nm_loker']; ?></h2></center>

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
        <label>NISN :</label>
            <input type="text" class="form-control" name="txtnisn" oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);"
            value="<?php echo $data_nisn; ?>"  required="">
        </div>
        <div class="form-group">
                        <form action="daftar_tambah.php" method="post" enctype="multipart/form-data">
                        Pilih Berkas :  <br>
                        Format : NIM_NAMA PT_POSISI.pdf
                        <input type="file" name="berkas" />
                        <input type="submit" name="btnSimpan" value="Upload" />
                    </form>
                    </div>

       
        <div class="form-group">
            <button type="submit" class="btn btn-warning btn-sm" name="btnDaftar">Daftar</button>
            <a href="?halaman=loker" class='btn btn-dark btn-sm'>BATAL</a>
        </div>
        
</form>