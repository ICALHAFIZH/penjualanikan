<br /><br />

<table class="table" id="datatables">
	<thead class="thead-dark">
		<tr>
            <th>Kategori Barang ID</th>
			<th>Jumlah Barang per Kategori</th>
		</tr>
	</thead>
	<tbody>
		<!--looping data rekap_kategori_barang-->
		<?php foreach($data_rekap_kategori_barang as $rekap_kategori_barang):?>

		<!--cetak data per baris-->
		<tr>
            <td><?php echo $rekap_kategori_barang['kategori_barang_id'];?></td>
			<td><?php echo number_format($rekap_kategori_barang['jumlah_katbarang']); ?></td>
		</tr>
		<?php endforeach?>		
	</tbody>
</table>

<br /><br />