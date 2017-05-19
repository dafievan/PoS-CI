<table border="1">
	<tr class="info">
		<th>No</th>
		<th>Tanggal Transaksi</th>
		<th>Operator</th>
		<th>Total Transaksi</th>
	</tr>
	<?php 
	$no=1;
	$total=0;
	foreach ($transdetail->result() as $td) {
		echo "<tr>
				<td>$no</td>
				<td>$td->tgl_transaksi</td>
				<td>$td->nama_lengkap</td>
				<td>$td->total</td>
			</tr>";
	$total = $total+$td->total;
	$no++;
	}
	 ?>
	<tr>
		<td colspan="3">
			Total
		</td>
		<td>
			<?php echo $total; ?>
		</td>
	</tr>
</table>