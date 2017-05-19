<h3>Data Barang</h3>
<?php 
echo anchor('barang/add','Tambah Data Barang',array('class'=>'btn btn-primary'));
 ?>
 <hr>
 <table class="table table-bordered">
 	<tr>
 		<th>No</th>
 		<th>Nama Barang</th>
 		<th>Kategori</th>
 		<th>Harga</th>
 		<th colspan="2">Operasi</th>
 	</tr>
 	<?php 
 	$no=1;
 	foreach ($record->result() as $r) {
 		echo "<tr>
 			<td>$no</td>
 			<td>$r->nama_barang</td>
 			<td>$r->nama_kategori</td>
 			<td>$r->harga</td>
 			<td>".anchor('barang/edit/'.$r->id_barang, 'Edit', array('class'=>'btn btn-success'))."</td>
 			<td>".anchor('barang/hapus/'.$r->id_barang, 'Hapus', array('class'=>'btn btn-danger'))."</td>
 		</tr>";//$r->id_barang untuk mengambil uri(3)
 		$no++;
 	}
 	 ?>
 </table>