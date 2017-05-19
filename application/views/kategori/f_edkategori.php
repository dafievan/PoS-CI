<h3>Edit Data Kategori</h3>
<?php 
echo form_open('kategori/edit');
 ?>
 <hr>
 <input type="hidden" class="form-control" name="id" value="<?php echo $editdata['id_kategori']  ?>">
 <div class="form-group">
 	<div class="row">
	 	<div class="col-xs-4">
		 	<label>Nama Kategori</label>
		 	<input type="text" class="form-control" name="n_kategori" value="<?php echo $editdata['nama_kategori'] ?>">
	 	</div>
 	</div>
 </div>
 	<input type="submit" class="btn" name="submit" value="Update">
 <?php
 echo anchor('kategori', 'Batal', array('class'=>'btn btn-default'));
 echo form_close();
   ?>