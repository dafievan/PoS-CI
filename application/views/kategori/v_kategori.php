<h3>Kategori Barang</h3>
<?php 
echo anchor('kategori/add','Tambah Data Kategori',array('class'=>'btn btn-primary'));
 ?>
 <hr>
 <table class="table table-bordered">
 	<tr>
 		<th>No</th>
 		<th>Nama Kategori</th>
 		<th colspan="2">Operasi</th>
 	</tr>
 	<?php 
 	$no=1+$this->uri->segment(3);
 	foreach ($record->result() as $r) {
 		echo "<tr>
 			<td>$no</td>
 			<td>$r->nama_kategori</td>
 			<td align='center'>".anchor('kategori/edit/'.$r->id_kategori, 'Edit', array('class'=>'btn btn-success'))."</td>
 			<td align='center'>".anchor('kategori/hapus/'.$r->id_kategori, 'Hapus', array('class'=>'btn btn-danger'))."</td>
 		</tr>";
 		$no++;
 	}
 	 ?>
 </table>

 <?php 
echo $paging;
  ?>