<?php
	header( "Content-Type: application/vnd.ms-excel" );
	header( "Content-disposition: attachment; filename=export_data_rekap_beli.xls" );
?>

<table border="1">
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
