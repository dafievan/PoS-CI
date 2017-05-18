<h3>Tambah Data Kategori</h3>
<?php 
echo form_open('kategori/add');
 ?>
 <div class="form-group">
 	<label>Nama Kategori</label>
 	<input type="text" name="n_kategori" placeholder="Kategori">
 </div>
 	<button type="submit" name="submit">Simpan</button>
 <?php
 echo form_close();
   ?>