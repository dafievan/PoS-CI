<h3>Login</h3>
<?php 
echo form_open('autho/login');
 ?>
 <hr>
 <div class="form-group">
 	<div class="row">
	 	<div class="col-xs-4">
		 	<label>Username</label>
		 	<input type="text" class="form-control" name="username" placeholder="username">
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
 echo form_close();
   ?>