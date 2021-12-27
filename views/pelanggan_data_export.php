<?php
	header( "Content-Type: application/vnd.ms-excel" );
	header( "Content-disposition: attachment; filename=export_data_pelanggan.xls" );
?>

<table border="1">
	<thead>
		<tr>
			<th>ID</th>
			<th>Nama</th>
			<th>Gender</th>
			<th>No Telp</th>
			<th>Alamat</th>
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
		</tr>
		<?php endforeach?>		
	</tbody>
</table>