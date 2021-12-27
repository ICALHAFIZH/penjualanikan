<!--$data_barang_single['id'] : perlu diletakan di url agar bisa diterima/tangkap pada controller (sbg penanda id yang akan diupdate) -->
<form method="post" action="<?php echo site_url('barang/update_submit/'.$data_barang_single['id']);?>">
	<table class="table">
		<tr>
			<td>kategori barang</td>
			<!--$data_barang_single['nama'] : menampilkan data barang yang dipilih dari database -->
			<td>
				<select name="kategori_barang_id" class="form-control">
				<?php foreach($data_kategori_barang as $kategori_barang):?>
					<?php if($kategori_barang['id'] == $data_barang_single['kategori_barang_id']):?>
					<option value="<?php echo $kategori_barang['id'];?>" selected><?php echo $kategori_barang['nama'];?></option>
					<?php else:?>
					<option value="<?php echo $kategori_barang['id'];?>"><?php echo $kategori_barang['nama'];?></option>
					<?php endif;?>
				<?php endforeach;?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Nama</td>
			<!--$data_barang_single['nama'] : menampilkan data barang yang dipilih dari database -->
			<td><input type="text" name="nama" value="<?php echo $data_barang_single['nama'];?>" required="" class="form-control"></td>
		</tr>
        <tr>
			<td>Stok</td>
			<!--$data_barang_single['nama'] : menampilkan data barang yang dipilih dari database -->
			<td><input type="text" name="stok" value="<?php echo $data_barang_single['stok'];?>" required="" class="form-control"></td>
		</tr>
		<tr>
			<td>Harga</td>
			<!--$data_barang_single['nama'] : menampilkan data barang yang dipilih dari database -->
			<td><input type="text" name="harga" value="<?php echo $data_barang_single['harga'];?>" required="" class="form-control"></td>
		</tr>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td><input type="submit" name="submit" value="Simpan" class="btn btn-primary"></td>
		</tr>
	</table>
</form>
