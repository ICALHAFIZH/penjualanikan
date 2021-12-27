<?php
	header( "Content-Type: application/vnd.ms-excel" );
	header( "Content-disposition: attachment; filename=export_data_jual.xls" );
?>

<table border="1">
	<thead>
        <tr>
            <th>ID</th>
			<th>Pelanggan ID</th>
			<th>Barang ID</th>
			<th>Tanggal</th>
			<th>Harga</th>
            <th>Jumlah</th>
            <th>Total</th>			
		</tr>
	</thead>
	<tbody>
		<!--looping data barang-->
		<?php foreach($data_jual as $jual):?>

		<!--cetak data per baris-->
		<tr>
            <td><?php echo $jual['id'];?></td>
			<td><?php echo $jual['pelanggan_id'];?></td>
			<td><?php echo $jual['barang_id'];?></td>
			<td><?php echo $jual['tanggal'];?></td>
            <td><?php echo $jual['harga'];?></td>
            <td><?php echo $jual['jumlah'];?></td>
            <td><?php echo $jual['total'];?></td>
		</tr>
		<?php endforeach?>		
	</tbody>
</table>