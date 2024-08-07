<?php	
error_reporting(0);
include_once("koneksi.php");
    ?>

<div class="form-group">
<br>
<a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#cetak1"><i class="fa fa-year"></i>
                                  Lihat
                                </a>		
<br>

<div class="modal fade" id="cetak1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel">Lihat Laporan</h4>
                                      </div>
                                      <div class="modal-body">
                                        <!--FORM MODAL-->
										<form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
											<fieldset>
											<div class="form-group">
											  <label for="inputnim" class="col-lg-2 control-label">Asal Sekolah</label>
											  <div class="col-lg-10">
                                              <select class="form-control" name="txtasal" id="txtasal">
        <option value="">- Pilih -</option>
        <?php
            $asal=['txtasal'];
            $sql_asal = mysqli_query($con, "select distinct id_sekolah, nama_sekolah from tb_sekolah") or die
            (mysqli_error($con));
            while($data_asal = mysqli_fetch_array($sql_asal)) {
            echo '<option value="'.$data_asal['id_sekolah'].'">'.$data_asal['nama_sekolah'].' </option>';              
        }?>
        </select><br>
        <form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
											<fieldset>

        <div class="col-lg-5">
           <select class="form-control" name="tahun" id="tahun">
                <option value="">- Tahun -</option>
                <?php
                 $thn_skr = date('Y');
              for ($x = $thn_skr; $x >= 2017; $x--) {
                        ?>
    <option value="<?php echo $x ?>"><?php echo $x ?></option>
                        <?php
                        }
                        ?>
                        </select>
                      </div>
											  </div>
											</div>
											<div class="form-group">
											  <div class="col-lg-10 col-lg-offset-2">
												<button type="reset" class="btn btn-default" data-dismiss="modal">Batal</button>
												<button type="submit" value="Pilih" class="btn btn-primary">Lihat</button>
											  </div>
                        
											</div>
											</fieldset>
										</form>
<!--END FORM MODAL-->
                                      </div>
                                      
                                    </div>
                                  </div>
                                </div>
<br>
<div class="box box-primary">
<div class="box-header with-border">
  <h3 class="box-title">Alumni Bekerja</h3>
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
        <th>Id Alumni</th>
        <th>Nama</th>
        <th>Asal Sekolah</th>
        <th>Instansi</th>
        <th>Tahun</th>
        <th>Piihan</th>
    </tr>
    </center>
    </thead>
    <tbody>
        <?php
            $no = 1;
            $query = $_POST['txtasal'];
            $tahun = $_POST['tahun'];
            if($query != ''){
            $sql_tampil = mysqli_query($con,"SELECT tb_tracer.id_alumni, tb_peserta.nisn, tb_peserta.nama, tb_sekolah.id_sekolah, tb_sekolah.nama_sekolah, status, nama_instansi, tb_peserta.tahun_lulus FROM tb_tracer, tb_peserta, tb_sekolah WHERE tb_tracer.nisn=tb_peserta.nisn AND tb_peserta.id_sekolah=tb_sekolah.id_sekolah AND tb_tracer.status='Bekerja' AND tb_sekolah.id_sekolah LIKE'".$query."' AND tb_peserta.tahun_lulus = $tahun ORDER BY id_alumni ASC");
            }else{
            $sql_tampil = mysqli_query($con,"SELECT DISTINCT tb_tracer.id_alumni, tb_peserta.nisn, tb_peserta.nama, tb_sekolah.nama_sekolah, status, nama_instansi, tb_peserta.tahun_lulus FROM tb_tracer, tb_peserta, tb_sekolah WHERE tb_tracer.nisn=tb_peserta.nisn AND tb_peserta.id_sekolah=tb_sekolah.id_sekolah AND tb_tracer.status='Bekerja' ORDER BY id_alumni DESC ");		
            }            
            while($data = mysqli_fetch_array($sql_tampil)){
                
            ?>
       
    
        <tr>       
            <td><?php echo $no; ?></td>
            <td><?php echo $data['id_alumni']; ?></td>
            <td><?php echo $data['nama']; ?></td>
            <td><?php echo $data['nama_sekolah']; ?></td>
            <td><?php echo $data['nama_instansi']; ?></td>
            <td><?php echo $data['tahun_lulus']; ?></td>
            <td>
                <a href="?halaman=tracer_detail&kode=<?php echo $data['id_alumni']; ?>"class='btn btn-warning btn-sm'><i class="fa fa-link"></i></a>
                <a href="?halaman=tracer_ubah&kode=<?php echo $data['id_alumni']; ?>"class='btn btn-warning btn-sm'><i class="fa fa-edit"></i></a>
                <a href="?halaman=tracer_aksi&kode=<?php echo $data['id_alumni']; ?>"  onclick="return confirm('Apakah anda yakin hapus data ini ?')" class='btn btn-danger btn-sm'><i class="fa fa-trash"></i></a>
            </td>
        </tr>
        <?php
            $no++;
            }
        
        ?>
    </tbody>
  </table>
  <!-- Querry Laporan Alumni Per Sekolah
SELECT tb_tracer.id_alumni, tb_peserta.nisn, tb_peserta.nama, tb_sekolah.nama_sekolah, status, nama_instansi, tb_peserta.tahun_lulus FROM tb_tracer, tb_peserta, tb_sekolah WHERE tb_tracer.nisn=tb_peserta.nisn AND tb_peserta.id_sekolah=tb_sekolah.id_sekolah AND tb_tracer.status='Bekerja' AND tb_sekolah.id_sekolah='YSM01'ORDER BY id_alumni DESC  -->