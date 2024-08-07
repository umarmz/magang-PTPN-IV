<?php
if(isset($_GET['kode'])){
    include_once("koneksi.php");
    $sql = $con->query("select * from tb_peserta, tb_sekolah WHERE tb_peserta.id_sekolah=tb_sekolah.id_sekolah AND nisn='".$_GET['kode']."'");
    $tampil = $sql->fetch_assoc();
}
?>
<br>
<div class="card mb-3">
<div class="card-header">
  <i class="fa fa-table"></i> <b>Data Lengkap Siswa  : <?php echo $tampil['nama'];?></b> </div>
<div class="card-body">
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                <tbody>
                                        <tr>
                                            <td>NISN</td>                                          
                                            <td width="80%">: <?php echo $tampil['nisn'];?></td>
                                        </tr>
                                        <tr>
                                            <td>Nama Siswa</td>
                                            <td>: <?php echo $tampil['nama'];?></td>
                                        </tr>
                                        <tr>
                                            <td>Jenis Kelamin</td>
                                            <td>: <?php echo $tampil['jekel'];?></td>
                                        </tr>
                                        <tr>
                                            <td>Tempat Lahir</td>
                                            <td>: <?php echo $tampil['tempat_lhr'];?></td>
                                        </tr>
                                        <tr>
                                            <td>Tanggal Lahir</td>
                                            <td>: <?php echo $tampil['tgl_lhr'];?></td>
                                        </tr>
                                        <tr>
                                            <td>Nama Orang Tua</td>
                                            <td>: <?php echo $tampil['nama_ortu'];?></td>
                                        </tr>
                                        <tr>
                                            <td>Alamat</td>
                                            <td>: <?php echo $tampil['alamat'];?></td>
                                        </tr>
                                        <tr>
                                            <td>No. Telp</td>
                                            <td>: <?php echo $tampil['telp'];?></td>
                                        </tr>
                                        <tr>
                                            <td>Jurusan</td>
                                            <td>: <?php echo $tampil['jurusan'];?></td>
                                        </tr>
                                        <tr>
                                            <td>Asal Sekolah</td>
                                            <td>: <?php echo $tampil['nama_sekolah'];?></td>
                                        </tr>
                                        <tr>
                                            <td>Tahun Lulus</td>
                                            <td>: <?php echo $tampil['tahun_lulus'];?></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <a href="?halaman=siswa_tampil" class="btn btn-primary">Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
                </div>