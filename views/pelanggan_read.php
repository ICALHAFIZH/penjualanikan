<!--link tambah data-->
<a href="<?php echo site_url('pelanggan/insert');?>" class="btn btn-secondary">Tambah</a>
<br /><br />

<table class="table" id="datatables">
	<thead class="thead-dark">
		<tr>
            <th>ID</th>
			<th>Nama</th>
			<th>Gender</th>
			<th>No Telp</th>
			<th>Alamat</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		<!--looping data pelanggan-->
		<?php foreach($data_pelanggan as $pelanggan):?>

		<!--cetak data per baris-->
		<tr>
            <td><?php echo $pelanggan['id'];?></td>
			<td><?php echo $pelanggan['nama'];?></td>
			<td><?php echo $pelanggan['gender'];?></td>
			<td><?php echo $pelanggan['no_telp'];?></td>
			<td><?php echo $pelanggan['alamat'];?></td>
			<td>
				<!--link ubah data (menyertakan id per baris untuk dikirim ke controller)-->
				<a href="<?php echo site_url('pelanggan/update/'.$pelanggan['id']);?>" class="btn btn-warning">
				Ubah
				</a>

				<!--link hapus data (menyertakan id per baris untuk dikirim ke controller)-->
				<a href="<?php echo site_url('pelanggan/delete/'.$pelanggan['id']);?>" onClick="return confirm('Apakah anda yakin?')" class="btn btn-danger">
				Hapus
				</a>
				
			</td>
		</tr>
		<?php endforeach?>		
	</tbody>
</table>

<br /><br />
<a href="<?php echo site_url('pelanggan/data_export');?>" class="btn btn-secondary">Export Excel</a>