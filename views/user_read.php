<!--link tambah data-->
<a href="<?php echo site_url('user/insert');?>" class="btn btn-secondary">Tambah</a>
<br /><br />

<table class="table">
	<thead class="thead-dark">
		<tr>
            <th>ID</th>
			<th>Nama</th>
			<th>Username</th>
			<th>Password</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		<!--looping data user-->
		<?php foreach($data_user as $user):?>

		<!--cetak data per baris-->
		<tr>
            <td><?php echo $user['id'];?></td>
			<td><?php echo $user['nama'];?></td>
			<td><?php echo $user['username'];?></td>
			<td><?php echo $user['password'];?></td>			
			<td>
				
			<!--link ubah data (menyertakan id per baris untuk dikirim ke controller)-->
			<a href="<?php echo site_url('user/update/'.$user['id']);?>" class="btn btn-warning">
			Ubah
			</a>
			
			<!--link hapus data (menyertakan id per baris untuk dikirim ke controller)-->
			<a href="<?php echo site_url('user/delete/'.$user['id']);?>" onClick="return confirm('Apakah anda yakin?')" class="btn btn-danger">
			Hapus
			</a>
			
			<!--link ubah data (menyertakan id per baris untuk dikirim ke controller)-->
			<a href="<?php echo site_url('user/reset_password/'.$user['id']);?>" class="btn btn-primary">
			Reset Password
			</a>
				
			</td>
		</tr>
		<?php endforeach?>		
	</tbody>
</table>

<br /><br />
<a href="<?php echo site_url('user/data_export');?>" class="btn btn-secondary">Export Excel</a>

