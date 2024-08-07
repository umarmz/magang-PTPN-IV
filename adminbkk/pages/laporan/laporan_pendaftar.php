<?php
error_reporting(0);
include_once("koneksi.php");
?>
<div id="page-wrapper" >
<div id="page-inner">
<div class="row">
        <div class="col-md-12">
                    <!-- Advanced Tables -->                        
                                <br>
                                <button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#cetak"><i class="fa fa-book"></i>
                                  Cetak Laporan
                                </button>
                                <button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#cetak1"><i class="fa fa-book"></i>
                                  Lihat Laporan
                                </button>		
                                <br>

                                <div class="modal fade" id="cetak" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel">Cetak Laporan</h4>
                                      </div>
                                      <div class="modal-body">
                                        <!--FORM MODAL-->
										<form class="form-horizontal" method="post" action="./pages/laporan/cetak_pendaftar.php" enctype="multipart/form-data" target="_blank">
											<fieldset>
											<div class="input-group">
											<input type="text" value="<?php echo $row['id_user']; ?>"  name="id_user" id="id_user" hidden> 
											</div>
											<div class="form-group">
											  <label for="inputnim" class="col-lg-2 control-label">Asal Sekolah</label>
											  <div class="col-lg-10">
                                              <select class="form-control" name="txttahun" id="txttahun">
        <option value="">- Pilih -</option>
        <?php
            $tahun=['txttahun'];
            $sql_tahun = mysqli_query($con, "select distinct id_loker, nm_loker, nm_perusahaan from tb_loker") or die
            (mysqli_error($con));
            while($data_tahun = mysqli_fetch_array($sql_tahun)) {
            echo '<option value="'.$data_tahun['id_loker'].'">'.$data_tahun['id_loker'].' -'.$data_tahun['nm_loker'].' -'.$data_tahun['nm_perusahaan'].' </option>';              
        }?>
        </select>
											  </div>
											</div>
											<div class="form-group">
											  <div class="col-lg-10 col-lg-offset-2">
												<button type="reset" class="btn btn-default" data-dismiss="modal">Batal</button>
												<button type="submit" id="cetak" name="cetak" class="btn btn-primary">Cetak</button>
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
                                              <select class="form-control" name="txttahun" id="txttahun">
        <option value="">- Pilih -</option>
        <?php
            $tahun=['txttahun'];
            $sql_tahun = mysqli_query($con, "select distinct id_loker, nm_loker from tb_loker") or die
            (mysqli_error($con));
            while($data_tahun = mysqli_fetch_array($sql_tahun)) {
            echo '<option value="'.$data_tahun['id_loker'].'">'.$data_tahun['nm_loker'].' </option>';              
        }?>
        </select>
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

                                
                                <div class="panel panel-info">
                                <div class="panel-heading">
                                  <b>Data Pendaftar</b>
                                  </div>
                               <div class="panel-body">
                                   <div class="table-responsive">
                                       <table class="table table-striped table-bordered table-hover  id="dataTables-example"">
                                       <thead>
                  <tr>
                    <th>No</th>
                    <th>No. Pendaftaran</th>
                    <th>NISN</th>
                    <th>Nama</th>
                    <th>Loker</th>
                    <th>Perusahaan</th>
                    <th>Asal Sekolah</th>
                  </tr>
                </thead>
                <tbody>
                    
               
            <?php
            $no = 1;
            $query = $_POST['txttahun'];
            if($query != ''){
            $sql_tampil = mysqli_query($con,"SELECT tb_pendaftaran.id_pendaftaran, tb_peserta.nisn, tb_peserta.nama, tb_loker.nm_loker, tb_loker.nm_perusahaan, tb_sekolah.nama_sekolah FROM tb_pendaftaran, tb_peserta, tb_loker, tb_sekolah WHERE tb_pendaftaran.nisn=tb_peserta.nisn AND tb_pendaftaran.id_loker=tb_loker.id_loker AND tb_peserta.id_sekolah=tb_sekolah.id_sekolah AND tb_loker.id_loker LIKE'".$query."' ORDER BY id_pendaftaran ASC");
            }else{
            $sql_tampil = mysqli_query($con,"SELECT tb_pendaftaran.id_pendaftaran, tb_peserta.nisn, tb_peserta.nama, tb_loker.id_loker,tb_loker.nm_loker, tb_loker.nm_perusahaan, tb_sekolah.nama_sekolah FROM tb_pendaftaran, tb_peserta, tb_loker, tb_sekolah WHERE tb_pendaftaran.nisn=tb_peserta.nisn AND tb_pendaftaran.id_loker=tb_loker.id_loker AND tb_peserta.id_sekolah=tb_sekolah.id_sekolah ORDER BY id_pendaftaran DESC ");		
            }
            while($data = mysqli_fetch_array($sql_tampil)){
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
                                   </div>
                               </div>
                           </div>
            
