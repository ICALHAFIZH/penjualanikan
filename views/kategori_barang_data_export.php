<?php
	header( "Content-Type: application/vnd.ms-excel" );
	header( "Content-disposition: attachment; filename=export_data_kategori_barang.xls" );
?>

<table border="1">
	<thead>
		<tr>
			<th>ID</th>
			<th>Nama</th>
		</tr>
	</thead>
	<tbody>
		<!--looping data kategori_barang-->
		<?php foreach($data_kategori_barang as $kategori_barang):?>

		<!--cetak data per baris-->
		<tr>
			<td><?php echo $kategori_barang['id'];?></td>
			<td><?php echo $kategori_barang['nama'];?></td>
		</tr>
		<?php endforeach?>		
	</tbody>
</table>