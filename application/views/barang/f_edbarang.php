<h3>Edit Data Barang</h3>
<?php 
echo form_open('barang/edit');
 ?>
 <hr>
 <input type="hidden" class="form-control" name="id" value="<?php echo $editdata['id_barang']  ?>"><!-- bagian untuk mendapatkan value id -->
 <div class="form-group">
 	<div class="row">
	 	<div class="col-xs-4">
		 	<label>Nama Barang</label>
		 	<input type="text" class="form-control" name="n_barang" value="<?php echo $editdata['nama_barang'] ?>"> <!-- menampilkan value -->
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
		 			echo "<option value='$k->id_kategori'";
		 			echo $editdata['id_kategori']==$k->id_kategori?'selected':'';
		 			echo ">$k->nama_kategori</option>";
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
		 	<input type="text" class="form-control" name="n_harga" value="<?php echo $editdata['harga'] ?>">
	 	</div>
 	</div>
 </div>
 	<input type="submit" class="btn" name="submit" value="Update">
 <?php
 echo anchor('barang', 'Batal', array('class'=>'btn btn-default'));
 echo form_close();
   ?>