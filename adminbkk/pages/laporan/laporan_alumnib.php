<?php
error_reporting(0);
include_once("koneksi.php");
?>
<?php
          if ($data_status=="Operator"){
            ?>
<div id="page-wrapper" >
<div id="page-inner">
<div class="row">
        <div class="col-md-12">
                    <!-- Advanced Tables -->                        
                                <br>
                                <button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#cetak1"><i class="fa fa-book"></i>
                                  Lihat Laporan
                                </button>
                                <!-- <button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#grafik"><i class="fa fa-book"></i>
                                  Grafik
                                </button>		 -->
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
										<form class="form-horizontal" method="post" action="./pages/laporan/cetak_alumnib_op.php" enctype="multipart/form-data" target="_blank">
											<fieldset>
											<div class="input-group">
											<input type="text" value="<?php echo $row['id_user']; ?>"  name="id_user" id="id_user" hidden> 
											</div>
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
        </select>
        <br>
        <div class="col-lg-10">
           <select class="form-control" name="tahun" id="tahun">
                <option value="">- Pilih -</option>
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
												<button type="submit" id="cetak" name="cetak" class="btn btn-primary">Cetak</button>
                        <form method="post" enctype="multipart/form-data">
                    
                </form>
                       
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
        <div class="form-group">
											  <label for="inputnim" class="col-lg-2 control-label">Tahun</label>
        <div class="col-lg-5">
           <select class="form-control" name="tahun" id="tahun">
                <option value="">- Pilih -</option>
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


                                <div class="panel panel-info">
                                <div class="panel-heading">
                                  <b>Data Alumni Bekerja</b>
                                  </div>
                               <div class="panel-body">
                                   <div class="table-responsive">
                                       <table class="table table-striped table-bordered table-hover  id="dataTables-example"">
                                       <thead>
                  <tr>
                    <th>No</th>
                    <th>Id Alumni</th>
                    <th>NISN</th>
                    <th>Nama</th>
                    <th>Asal</th>
                    <th>Status</th>
                    <th>Instansi</th>
                    <th>Tahun</th>
                  </tr>
                </thead>
                <tbody>
                    
               
                <?php
            $no = 1;
            $query = $_POST['txtasal'];
            $tahun = $_POST['tahun'];
            if($query != ''){
            $sql_tampil = mysqli_query($con,"SELECT tb_tracer.id_alumni, tb_peserta.nisn, tb_peserta.nama, tb_sekolah.id_sekolah, tb_sekolah.nama_sekolah, status, nama_instansi, tb_peserta.tahun_lulus FROM tb_tracer, tb_peserta, tb_sekolah WHERE tb_tracer.nisn=tb_peserta.nisn AND tb_peserta.id_sekolah=tb_sekolah.id_sekolah AND tb_tracer.status='Bekerja' AND tb_sekolah.id_sekolah LIKE'".$query."' AND tb_peserta.tahun_lulus=$tahun ORDER BY id_alumni ASC");
            }else{
            $sql_tampil = mysqli_query($con,"SELECT tb_tracer.id_alumni, tb_peserta.nisn, tb_peserta.nama, tb_sekolah.nama_sekolah, status, nama_instansi, tb_peserta.tahun_lulus FROM tb_tracer, tb_peserta, tb_sekolah WHERE tb_tracer.nisn=tb_peserta.nisn AND tb_peserta.id_sekolah=tb_sekolah.id_sekolah AND tb_tracer.status='Bekerja' ORDER BY id_alumni DESC ");		
            }            
            while($data = mysqli_fetch_array($sql_tampil)){
                
            ?>
                    <tr>       
                        <td><?php echo $no; ?></td>
                        <td><?php echo $data['id_alumni']; ?></td>
                        <td><?php echo $data['nisn']; ?></td>
                        <td><?php echo $data['nama']; ?></td>
                        <td><?php echo $data['nama_sekolah']; ?></td>
                        <td><?php echo $data['status']; ?></td>
                        <td><?php echo $data['nama_instansi']; ?></td>
                        <td><?php echo $data['tahun_lulus']; ?></td>
                        
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
                           <?php
        } elseif ($data_status=="Ka. BKK"){
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
										<form class="form-horizontal" method="post" action="?halaman=cetak_kerja" enctype="multipart/form-data" target="_blank">
											<fieldset>
											<div class="input-group">
											<input type="text" value="<?php echo $row['id_user']; ?>"  name="id_user" id="id_user" hidden> 
											</div>
											<div class="form-group">
											  <label for="inputnim" class="col-lg-2 control-label">Tahun Lulus</label>
											  <div class="col-lg-10">
                                             
        <br>
        <div class="col-lg-10">
           <select class="form-control" name="tahun" id="tahun">
                <option value="">- Pilih -</option>
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
												<button type="submit" id="cetak" name="cetak" class="btn btn-primary">Cetak</button>
                        <form method="post" enctype="multipart/form-data">
                    <div class="modal-footer">
                    <a href="?halaman=cetak_kerja_semua" class="btn btn-primary"target="_blank"><i class="fa fa-fw fa-print"></i> Cetak Semua</a>
                    </div>
                </form>
                       
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
											  <label for="inputnim" class="col-lg-2 control-label">Tahun Lulus</label>
											  <div class="col-lg-10">
                                              <br>
        
        <div class="col-lg-5">
           <select class="form-control" name="tahun" id="tahun">
                <option value="">- Pilih -</option>
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


                                <div class="panel panel-info">
                                <div class="panel-heading">
                                  <b>Data Alumni Bekerja</b>
                                  </div>
                               <div class="panel-body">
                                   <div class="table-responsive">
                                       <table class="table table-striped table-bordered table-hover  id="dataTables-example"">
                                       <thead>
                  <tr>
                    <th>No</th>
                    <th>Id Alumni</th>
                    <th>NISN</th>
                    <th>Nama</th>
                    <th>Asal</th>
                    <th>Status</th>
                    <th>Instansi</th>
                    <th>Tahun</th>
                  </tr>
                </thead>
                <tbody>
                    
               
                <?php
            $no = 1;
            $query = $_POST['txtasal'];
            $tahun = $_POST['tahun'];
            
            if($tahun != ''){
            $sql_tampil = mysqli_query($con,"SELECT tb_tracer.id_alumni, tb_peserta.nisn, tb_peserta.nama, tb_sekolah.id_sekolah, tb_sekolah.nama_sekolah, status, nama_instansi, tb_peserta.tahun_lulus FROM tb_tracer, tb_peserta, tb_sekolah WHERE tb_tracer.nisn=tb_peserta.nisn AND tb_peserta.id_sekolah=tb_sekolah.id_sekolah AND tb_sekolah.id_sekolah='$data_username' AND tb_tracer.status='Bekerja' AND tb_peserta.tahun_lulus=$tahun ORDER BY id_alumni ASC");
            }else{
            $sql_tampil = mysqli_query($con,"SELECT tb_tracer.id_alumni, tb_peserta.nisn, tb_peserta.nama, tb_sekolah.nama_sekolah, status, nama_instansi, tb_peserta.tahun_lulus FROM tb_tracer, tb_peserta, tb_sekolah WHERE tb_tracer.nisn=tb_peserta.nisn AND tb_peserta.id_sekolah=tb_sekolah.id_sekolah AND tb_sekolah.id_sekolah='$data_username' AND tb_tracer.status='Bekerja' ORDER BY id_alumni DESC");		
            }             
            while($data = mysqli_fetch_array($sql_tampil)){
                
            ?>
                    <tr>       
                        <td><?php echo $no; ?></td>
                        <td><?php echo $data['id_alumni']; ?></td>
                        <td><?php echo $data['nisn']; ?></td>
                        <td><?php echo $data['nama']; ?></td>
                        <td><?php echo $data['nama_sekolah']; ?></td>
                        <td><?php echo $data['status']; ?></td>
                        <td><?php echo $data['nama_instansi']; ?></td>
                        <td><?php echo $data['tahun_lulus']; ?></td>
                        
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
                           <?php
                    }
                ?>