<h3>Edit Data Kategori</h3>
<?php 
echo form_open('kategori/edit');
 ?>
 <div class="form-group">
 	<label>Nama Kategori</label>
 	<input type="text" name="n_kategori" value="<?php echo $editdata->nama_kategori; ?>">
 </div>
 	<button type="submit" name="submit">Simpan</button>
 <?php
 echo form_close();
   ?>