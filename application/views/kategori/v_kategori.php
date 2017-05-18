<h3>Kategori Barang</h3>
<?php 
echo anchor('kategori/add','Tambah Data Kategori');
 ?>
 <table border="1">
 	<tr>
 		<th>No</th>
 		<th>Nama Kategori</th>
 		<th colspan="2">Operasi</th>
 	</tr>
 	<?php 
 	$no=1;
 	foreach ($record->result() as $r) {
 		echo "<tr>
 			<td>$no</td>
 			<td>$r->nama_kategori</td>
 			<td>".anchor('kategori/edit/'.$r->id_kategori, 'Edit', array('class'=>'btn btn-success'))."</td>
 			<td>".anchor('kategori/hapus/'.$r->id_kategori, 'Hapus', array('class'=>'btn btn-danger'))."</td>
 		</tr>";
 		$no++;
 	}
 	 ?>
 </table>