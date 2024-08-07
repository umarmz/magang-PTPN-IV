<?php 
     include_once("koneksi.php");
    ?>
<div class>
      <div>
      <div class="panel-heading">
      <form action="?halaman=super_aksi" method="post" enctype="multipart/form-data">
      <b>Data User</b>
      </div>
    <form action="?halaman=super_aksi" method="post" enctype="multipart/form-data">
    <center><h2>TAMBAH USER</h2></center>

    			<div class="form-group">
						<label>Username</label>
                        <input type="text" class="form-control" name="txtusername" placeholder="Username" />
                    </div>
					<div class="form-group">
						<label>Nama</label>
                        <input type="text" class="form-control" name="txtnama" placeholder="Nama Perusahaan / Bagian"
                        oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);" required/>
                    </div>
                    <div class="form-group">
						<label>Password</label>
                        <input type="text" class="form-control" name="txtpassword" placeholder="Password"
                        oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);" required/>
                    </div>
                    <div class="form-group">
						<label>Email</label>
                        <input type="text" class="form-control" name="txtemail" placeholder="Email"
                        oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);" required/>
                    </div>
                    <div class="form-group">
						<label>Alamat</label>
                        <input type="text" class="form-control" name="txtalamat" placeholder="Alamat"
                        oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);" required/>
                    </div>
                    <div class="form-group">
					    <label>Status :</label>
                            <select name="rbstatus" class="form-control" required="">
                            <option>Ka. BKK</option>
                            <option>Perusahaan / CV</option>
                            <option>Operator</option>
                            <option>Waka Humas</option>
                            </select>
                    </div>
       <div class="form-group">
            <button type="submit" class="btn btn-success btn-sm" name="btnSIMPAN">SIMPAN</button>
            <a href="?halaman=super_tampil" class='btn btn-dark btn-sm'>BATAL</a>
        </div>
        
</form>
