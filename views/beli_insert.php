<form method="post" action="<?php echo site_url('beli/insert_submit/');?>">
	<table class="table">
         <tr>
			<td>Suplier </td>
			<!--$data_barang_single['nama'] : menampilkan data barang yang dipilih dari database -->
			<td>
				<select name="suplier_id" class="form-control">
				<?php foreach($data_suplier as $suplier):?>
				<option value="<?php echo $suplier['id'];?>">
					<?php echo $suplier['nama'];?>
				</option>
				<?php endforeach;?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Barang</td>
			<!--$data_barang_single['nama'] : menampilkan data barang yang dipilih dari database -->
			<td>
				<select name="barang_id" class="form-control">
				<?php foreach($data_barang as $barang):?>
				<option value="<?php echo $barang['id'];?>">
					<?php echo $barang['nama'];?> - <?php echo $barang['harga'];?>
				</option>
				<?php endforeach;?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Tanggal</td>
			<td><input type="date" name="tanggal" value="" required="" class="form-control"></td>
		</tr>
		<tr>
			<td>Harga</td>
			<td><input type="text" name="harga" value="" required="" class="form-control"></td>
		</tr>
        <tr>
			<td>Jumlah</td>
			<td><input type="text" name="jumlah" value="" required="" class="form-control"></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td><input type="submit" name="submit" value="Simpan" class="btn btn-danger"></td>
		</tr>
	</table>
</form>
