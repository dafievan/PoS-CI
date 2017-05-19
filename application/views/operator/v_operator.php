<h3>Data Operator</h3>
<?php 
echo anchor('operator/add','Tambah Data Operator',array('class'=>'btn btn-primary'));
 ?>
 <hr>
 <table class="table table-bordered">
 	<tr>
 		<th>No</th>
 		<th>Nama Lengkap</th>
 		<th>Username</th>
 		<th>Login Terakhir</th>
 		<th colspan="2">Operasi</th>
 	</tr>
 	<?php 
 	$no=1;
 	foreach ($record->result() as $r) {
 		echo "<tr>
 			<td>$no</td>
 			<td>$r->nama_lengkap</td>
 			<td>$r->username</td>
 			<td>$r->login_terakhir</td>
 			<td>".anchor('operator/edit/'.$r->id_operator, 'Edit', array('class'=>'btn btn-success'))."</td>
 			<td>".anchor('operator/hapus/'.$r->id_operator, 'Hapus', array('class'=>'btn btn-danger'))."</td>
 		</tr>";//$r->id_barang untuk mengambil uri(3)
 		$no++;
 	}
 	 ?>
 </table>