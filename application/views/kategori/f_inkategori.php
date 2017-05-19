<h3>Tambah Data Kategori</h3>
<?php 
echo form_open('kategori/add');
 ?>
 <hr>
 <div class="form-group">
 	<div class="row">
	 	<div class="col-xs-4">
		 	<label>Nama Kategori</label>
		 	<input type="text" class="form-control" name="n_kategori" placeholder="Kategori">
	 	</div>
 	</div>
 </div>
 	<input type="submit" class="btn" name="submit" value="Simpan">
 <?php
 echo anchor('kategori', 'Batal', array('class'=>'btn btn-default'));
 echo form_close();
   ?>