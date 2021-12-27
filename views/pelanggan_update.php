<!--$data_pelanggan_single['id'] : perlu diletakan di url agar bisa diterima/tangkap pada controller (sbg penanda id yang akan diupdate) -->
<form method="post" action="<?php echo site_url('pelanggan/update_submit/'.$data_pelanggan_single['id']);?>">
	<table class="table">
		<tr>
			<td>Nama</td>
			<td><input type="text" name="nama" value="<?php echo $data_pelanggan_single['nama'];?>" class="form-control" required=""></td>
		</tr>
		<tr>
			<td>Gender</td>
				<td><label class="btn btn-secondary active">
					<input type="radio" name="gender" value="pria" > pria
				</label>
				<label class="btn btn-secondary">
					<input type="radio" name="gender" value="wanita"> wanita
				</label></td>
		</tr>
		<tr>
			<td>Alamat</td>
			<td><input type="text" name="alamat" value="<?php echo $data_pelanggan_single['alamat'];?>" class="form-control" required=""></td>
		</tr>
		<tr>
			<td>No Telp</td>
			<td><input type="text" name="no_telp" value="<?php echo $data_pelanggan_single['no_telp'];?>" class="form-control" required=""></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td><input type="submit" name="submit" value="Simpan" class="btn btn-primary"></td>
		</tr>
	</table>
</form>
