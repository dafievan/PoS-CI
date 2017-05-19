<h3>Tambah Data Operator</h3>
<?php 
echo form_open('operator/add');
 ?>
 <hr>
 <div class="form-group">
 	<div class="row">
	 	<div class="col-xs-4">
		 	<label>Nama Lengkap</label>
		 	<input type="text" class="form-control" name="n_lengkap" placeholder="Nama Lengkap">
	 	</div>
 	</div>
 </div>

 <div class="form-group">
 	<div class="row">
	 	<div class="col-xs-4">
		 	<label>Username</label>
		 	<input type="text" class="form-control" name="n_user" placeholder="Username">
	 	</div>
 	</div>
 </div>

 <div class="form-group">
 	<div class="row">
	 	<div class="col-xs-4">
		 	<label>Password</label>
		 	<input type="password" class="form-control" name="password" placeholder="Password">
	 	</div>
 	</div>
 </div>
 	<input type="submit" class="btn" name="submit" value="Simpan">
 <?php
 echo anchor('operator', 'Batal', array('class'=>'btn btn-default'));
 echo form_close();
   ?>