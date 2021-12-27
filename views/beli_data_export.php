<?php
	header( "Content-Type: application/vnd.ms-excel" );
	header( "Content-disposition: attachment; filename=export_data_beli.xls" );
?>

<table border="1">
	<thead>
        <tr>
            <th>ID</th>
			<th>Suplier ID</th>
			<th>Barang ID</th>
			<th>Tanggal</th>
			<th>Harga</th>
            <th>Jumlah</th>
            <th>Total</th>			
		</tr>
	</thead>
	<tbody>
		<!--looping data barang-->
		<?php foreach($data_beli as $beli):?>

		<!--cetak data per baris-->
		<tr>
            <td><?php echo $beli['id'];?></td>
			<td><?php echo $beli['suplier_id'];?></td>
			<td><?php echo $beli['barang_id'];?></td>
			<td><?php echo $beli['tanggal'];?></td>
            <td><?php echo $beli['harga'];?></td>
            <td><?php echo $beli['jumlah'];?></td>
            <td><?php echo $beli['total'];?></td>
		</tr>
		<?php endforeach?>		
	</tbody>
</table>