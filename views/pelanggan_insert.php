<form method="post" action="<?php echo site_url('pelanggan/insert_submit/');?>">
	<table class="table">
		<tr>
			<td>Nama</td>
			<td><input type="text" name="nama" value="" class="form-control" required=""></td>
		</tr>
		<tr>
			<td>Gender</td>
				<td><label class="btn btn-secondary active">
					<input type="radio" name="gender" value="pria" > pria
				</label>
				<label class="btn btn-secondary">
					<input type="radio" name="gender" value="wanita" > wanita
				</label></td>
		</tr>
		<tr>
			<td>Alamat</td>
			<td><input type="text" name="alamat" value="" class="form-control" required=""></td>
		</tr>
		<tr>
			<td>No Telp</td>
			<td><input type="text" name="no_telp" value="" class="form-control" required=""></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td><input type="submit" name="submit" value="Simpan" class="btn btn-primary"></td>
		</tr>
	</table>
</form>
