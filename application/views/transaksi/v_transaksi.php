<h3>Form Transaksi</h3>
<?php 
echo form_open('transaksi');//menuju con transaksi
 ?>
<table class="table table-bordered">
	<tr class="info">
		<th>Form</th>
	</tr>
	<tr>
		<td>
		<div class="form-group">
			<div class="row">
				<div class="col-xs-3"> <!-- size column -->
					<input list="barang" class="form-control" name="t_barang" placeholder="Masukkan Nama Barang">
				</div>
				<div class="col-xs-1">
					<input type="text" class="form-control" name="qty" placeholder="QTY">					
				</div>
			</div>
		</div>
		<div class="form-group">
				<input type="submit" class="btn btn-default btn-sm" name="submit" value="Simpan">
				<?php echo anchor('transaksi/selesai_belanja', 'Selesai',array('class'=>'btn btn-default btn-sm')); ?>
		</div>
		</td>
	</tr>
</table>
<?php 
echo form_close();
 ?>

<table class="table table-bordered">
	<tr class="info">
		<th colspan="6">Detail Transaksi</th>
	</tr>
	<tr>
		<th width="5">No</th>
		<th>Nama Barang</th>
		<th>Qty</th>
		<th>Harga</th>
		<th>Subtotal</th>
		<th>Cancel</th>
	</tr>
	<?php 
	$no=1;
	$total=0;
foreach ($detail->result() as $d) {//mendapatakan ddta dari $detail
	echo "<tr>
			<td>$no</td>
			<td>$d->nama_barang</td> 
			<td>$d->qty</td>
			<td>$d->harga</td>
			<td>".$d->qty*$d->harga."</td>
			<td>".anchor('transaksi/hapusitem/'.$d->id_trans_detail, 'Hapus', array('class'=>'btn btn-danger btn-sm btn-block'))."</td>
		</tr>";
	$total = $total+($d->qty*$d->harga);//$$total harus sama, nama variabelnya total semua
	$no++;
}
	 ?>
	<tr>
		<td colspan="5">
			<p align="right">Total</p>
		</td>
		<td>
			<?php echo $total; ?>
		</td>
	</tr>
</table>

<datalist id="barang">
	<?php 
	foreach ($barang->result() as $b) {//ambil data dari $barang
		echo "<option value='$b->nama_barang'>";
	}
	 ?>
</datalist>