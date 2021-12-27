<!--link tambah data-->
<a href="<?php echo site_url('suplier/insert');?>" class="btn btn-secondary">Tambah</a>
<br /><br />

<table class="table" id="datatables">
	<thead class="thead-dark">
		<tr>
            <th>ID</th>
			<th>Nama</th>
			<th>No Telp</th>
			<th>Alamat</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		<!--looping data suplier-->
		<?php foreach($data_suplier as $suplier):?>

		<!--cetak data per baris-->
		<tr>
            <td><?php echo $suplier['id'];?></td>
			<td><?php echo $suplier['nama'];?></td>
			<td><?php echo $suplier['no_telp'];?></td>
			<td><?php echo $suplier['alamat'];?></td>
			<td>
				<!--link ubah data (menyertakan id per baris untuk dikirim ke controller)-->
				<a href="<?php echo site_url('suplier/update/'.$suplier['id']);?>" class="btn btn-warning">
				Ubah
				</a>

				<!--link hapus data (menyertakan id per baris untuk dikirim ke controller)-->
				<a href="<?php echo site_url('suplier/delete/'.$suplier['id']);?>" onClick="return confirm('Apakah anda yakin?')" class="btn btn-danger">
				Hapus
				</a>
				
			</td>
		</tr>
		<?php endforeach?>		
	</tbody>
</table>

<br /><br />
<a href="<?php echo site_url('suplier/data_export');?>" class="btn btn-secondary">Export Excel</a>