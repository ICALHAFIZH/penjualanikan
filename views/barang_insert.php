<form method="post" action="<?php echo site_url('barang/insert_submit/');?>">
	<table class="table">
		<tr>
			<td>kategori barang</td>
			<!--$data_barang_single['nama'] : menampilkan data barang yang dipilih dari database -->
			<td>
				<select name="kategori_barang_id" class="form-control">
				<?php foreach($data_kategori_barang as $kategori_barang):?>
				<option value="<?php echo $kategori_barang['id'];?>">
					<?php echo $kategori_barang['nama'];?>
				</option>
				<?php endforeach;?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Nama</td>
			<td><input type="text" name="nama" value="" required="" class="form-control"></td>
		</tr>
		<tr>
			<td>Stok</td>
			<td><input type="text" name="stok" value="" required="" class="form-control"></td>
		</tr>
		<tr>
			<td>Harga</td>
			<td><input type="text" name="harga" value="" required="" class="form-control"></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td><input type="submit" name="submit" value="Simpan" class="btn btn-danger"></td>
		</tr>
	</table>
</form>
