<?php
if(isset($_GET['kode'])){
    include_once("koneksi.php");
    $sql = $con->query("SELECT id_alumni, tb_tracer.nisn, tb_peserta.nama, tb_peserta.jekel, tb_peserta.alamat, tb_sekolah.nama_sekolah, tb_peserta.jurusan, tb_peserta.telp, status, nama_instansi, tb_peserta.tahun_lulus, mulai, pekerjaan, waktu, jenis_perusahaan, gaji FROM tb_tracer, tb_peserta, tb_sekolah WHERE tb_tracer.nisn=tb_peserta.nisn AND tb_peserta.id_sekolah=tb_sekolah.id_sekolah AND id_alumni ='".$_GET['kode']."'");
    $tampil = $sql->fetch_assoc();
}
?>
<br>
<div class="card mb-3">
<div class="card-header">
  <i class="fa fa-table"></i> <b>Data Lengkap Alumni  : <?php echo $tampil['nama'];?></b> </div><br>
<div class="card-body">
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                <tbody>
                                         <tr>
                                            <td>ID Alumni</td>                                          
                                            <td width="85%">: <?php echo $tampil['id_alumni'];?></td>
                                        </tr>
                                        <tr>
                                            <td>NISN</td>                                          
                                            <td width="85%">: <?php echo $tampil['nisn'];?></td>
                                        </tr>
                                        <tr>
                                            <td>Nama</td>
                                            <td>: <?php echo $tampil['nama'];?></td>
                                        </tr>
                                        <tr>
                                            <td>Jenis Kelamin</td>
                                            <td>: <?php echo $tampil['jekel'];?></td>
                                        </tr>
                                        <tr>
                                            <td>Alamat</td>
                                            <td>: <?php echo $tampil['alamat'];?></td>
                                        </tr>
                                        <tr>
                                            <td>Asal Sekolah</td>
                                            <td>: <?php echo $tampil['nama_sekolah'];?></td>
                                        </tr>
                                        <tr>
                                            <td>Jurusan</td>
                                            <td>: <?php echo $tampil['jurusan'];?></td>
                                        </tr>
                                        <tr>
                                            <td>Nomor HP</td>
                                            <td>: <?php echo $tampil['telp'];?></td>
                                        </tr>
                                        <tr>
                                            <td>Status</td>
                                            <td>: <?php echo $tampil['status'];?></td>
                                        </tr>
                                        <tr>
                                            <td>Instansi</td>
                                            <td>: <?php echo $tampil['nama_instansi'];?></td>
                                        </tr>
                                        <tr>
                                            <td>Tahun Lulus</td>
                                            <td>: <?php echo $tampil['tahun_lulus'];?></td>
                                        </tr>
                                        <tr>
                                            <td>Mulai bekerja</td>
                                            <td>: <?php echo $tampil['mulai'];?></td>
                                        </tr>
                                        <tr>
                                            <td>Status Pekerjaan</td>
                                            <td>: <?php echo $tampil['pekerjaan'];?></td>
                                        </tr>
                                        <tr>
                                            <td>Waktu Kerja</td>
                                            <td>: <?php echo $tampil['waktu'];?></td>
                                        </tr>
                                        <tr>
                                            <td>Jenis Instansi</td>
                                            <td>: <?php echo $tampil['jenis_perusahaan'];?></td>
                                        </tr>
                                        <tr>
                                            <td>Gaji Pertama</td>
                                            <td>: <?php echo $tampil['gaji'];?></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <a href="?halaman=tracerb" class="btn btn-primary">Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
                </div>