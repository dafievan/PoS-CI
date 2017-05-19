<h3>Tambah Data Barang</h3>
<?php 
echo form_open('barang/add');
 ?>
 <hr>
 <div class="form-group">
 	<div class="row">
	 	<div class="col-xs-4">
		 	<label>Nama Barang</label>
		 	<input type="text" class="form-control" name="n_barang" placeholder="Nama Barang">
	 	</div>
 	</div>
 </div>

 <div class="form-group">
 	<div class="row">
	 	<div class="col-xs-4">
		 	<label>Nama Kategori</label>
		 	<select class="form-control" name="n_kategori">
		 		<?php 
		 		foreach ($kategori->result() as $k) {
		 			echo "<option value='$k->id_kategori'>$k->nama_kategori</option>";
		 		}
		 		 ?>
		 	</select>
	 	</div>
 	</div>
 </div>

 <div class="form-group">
 	<div class="row">
	 	<div class="col-xs-4">
		 	<label>Harga</label>
		 	<input type="text" class="form-control" name="n_harga" placeholder="Harga">
	 	</div>
 	</div>
 </div>
 	<input type="submit" class="btn" name="submit" value="Simpan">
 <?php
 echo anchor('barang', 'Batal', array('class'=>'btn btn-default'));
 echo form_close();
   ?>