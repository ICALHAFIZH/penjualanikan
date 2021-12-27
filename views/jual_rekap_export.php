<?php
	header( "Content-Type: application/vnd.ms-excel" );
	header( "Content-disposition: attachment; filename=export_data_rekap_jual.xls" );
?>

<table border="1">
	<thead class="thead-dark">
		<tr>
            <th>Tanggal</th>
			<th>Total per Tanggal</th>
		</tr>
	</thead>
	<tbody>
		<!--looping data rekap_jual-->
		<?php foreach($data_rekap_jual as $rekap_jual):?>

		<!--cetak data per baris-->
		<tr>
            <td><?php echo $rekap_jual['tanggal'];?></td>
			<td><?php echo number_format($rekap_jual['total_pertanggal']); ?></td>
		</tr>
		<?php endforeach?>		
	</tbody>
</table>
