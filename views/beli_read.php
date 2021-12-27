<!--link tambah data-->
<a href="<?php echo site_url('beli/insert');?>" class="btn btn-secondary">Tambah</a>
<a href="<?php echo site_url('beli/chart_column');?>" class="btn btn-primary">Chart</a>
<a href="<?php echo site_url('beli/read_rekap');?>" class="btn btn-primary">Data Rekap</a>

<br /><br />

<table class="table" id="datatables">
	<thead class="thead-dark">
		<tr>
            <th>ID</th>
			<th>Suplier ID</th>
			<th>Barang ID</th>
			<th>Tanggal</th>
			<th>Harga</th>
            <th>Jumlah</th>
            <th>Total</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		<!--looping data beli-->
		<?php foreach($data_beli as $beli):?>

		<!--cetak data per baris-->
		<tr>
            <td><?php echo $beli['id'];?></td>
			<td><?php echo $beli['suplier_id'];?></td>
			<td><?php echo $beli['barang_id'];?></td>
			<td><?php echo $beli['tanggal'];?></td>
            <td><?php echo number_format( $beli['harga']);?></td>
            <td><?php echo $beli['jumlah'];?></td>
            <td><?php echo number_format($beli['total']) ;?></td>
			<td>	
				<!--link ubah data (menyertakan id per baris untuk dikirim ke controller)-->
				<a href="<?php echo site_url('beli/update/'.$beli['id']);?>" class="btn btn-warning">
				Ubah
				</a>

				<!--link hapus data (menyertakan id per baris untuk dikirim ke controller)-->
				<a href="<?php echo site_url('beli/delete/'.$beli['id']);?>" onClick="return confirm('Apakah anda yakin?')" class="btn btn-danger">
				Hapus
				</a>
				
			</td>
		</tr>
		<?php endforeach?>		
	</tbody>
</table>

<br /><br />
<a href="<?php echo site_url('beli/data_export');?>" class="btn btn-secondary">Export Excel</a>

