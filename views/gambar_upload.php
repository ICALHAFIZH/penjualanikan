
<!--form perlu di tambahkan enctype="multipart/form-data" agar bisa melakukan upload file-->
<form method="post" action="<?php echo site_url('barang/upload_submit/'. $data_barang_single['id']);?>" enctype="multipart/form-data">
	<table class="table">
		<tr>
			<td>Upload Gambar</td>
			<td>
				<!--input untuk memilih file yang akan diupload-->
				<input type="file" name="userfile" size="20" class="btn btn-light">
			</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td><input type="submit" name="submit" value="Upload" class="btn btn-primary"></td>
		</tr>
	</table>
</form>

<!--response setelah upload-->
<?php if(!empty($response)):?>
	<?php echo $response;?>
<?php endif;?>
