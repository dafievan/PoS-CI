<h3>Laporan Transaksi</h3>
<?php 
echo form_open('transaksi/laporan');
 ?>
<table class="table table-bordered">
 	<tr>
		<td>
		 	<div class="form-group">
				<div class="row">
					<div class="col-xs-3"> <!-- size column -->
						<input type="text" class="form-control" name="tanggal1" placeholder="Tanggal Awal">
					</div>
					<div class="col-xs-3">
						<input type="text" class="form-control" name="tanggal2" placeholder="Tanggal Akhir">					
					</div>
				</div>
			</div>
			<div class="form-group">
					<input type="submit" class="btn btn-default btn-sm" name="submit" value="Proses">
			</div>
		</td>
	</tr>
</table>
<?php 
echo form_close();
 ?>
<hr>
<table class="table table-bordered">
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