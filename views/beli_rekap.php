<br /><br />

<table class="table" id="datatables">
	<thead class="thead-dark">
		<tr>
            <th>Tanggal</th>
			<th>Total per Tanggal</th>
		</tr>
	</thead>
	<tbody>
		<!--looping data rekap_beli-->
		<?php foreach($data_rekap_beli as $rekap_beli):?>

		<!--cetak data per baris-->
		<tr>
            <td><?php echo $rekap_beli['tanggal'];?></td>
			<td><?php echo number_format($rekap_beli['total_pertanggal']); ?></td>
		</tr>
		<?php endforeach?>		
	</tbody>
</table>

<br /><br />
<a href="<?php echo site_url('beli/rekap_export');?>" class="btn btn-secondary">Export Excel</a>