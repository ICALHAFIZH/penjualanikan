<form method="post" action="<?php echo site_url('user/update_submit/'.$data_user_single['id']);?>">
	<table class="table table-striped">
        <tr>
			<td>Username</td>
			<td><input type="text" name="username" value="<?php echo $data_user_single['username'];?>" required="" class="form-control"></td>
		</tr>
        <tr>
			<td>Password</td>
			<td><input type="password" name="password" value="<?php echo $data_user_single['password'];?>" required="" class="form-control"></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td><input type="submit" name="submit" value="Simpan" class="btn btn-warning"></td>
		</tr>
	</table>
</form>
