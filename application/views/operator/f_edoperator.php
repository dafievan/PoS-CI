<h3>Edit Data Operator</h3>
<?php 
echo form_open('operator/edit');
 ?>
 <hr>
 <input type="text" name="id" value="<?php echo $editdata['id_operator'] ?>">
 <div class="form-group">
 	<div class="row">
	 	<div class="col-xs-4">
		 	<label>Nama Lengkap</label>
		 	<input type="text" class="form-control" name="n_lengkap" value="<?php echo $editdata['nama_lengkap'] ?>">
	 	</div>
 	</div>
 </div>

 <div class="form-group">
 	<div class="row">
	 	<div class="col-xs-4">
		 	<label>Username</label>
		 	<input type="text" class="form-control" name="n_user" value="<?php echo $editdata['username'] ?>">
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