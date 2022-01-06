<?php
include 'koneksi.php';
?>
<table border="1" style="width: 100%">
		<tr>
			<th width="1%">No</th>
			<th>Nama Layanan</th>
			<th>Gambar</th>
			<th>Keterangan</th> 
		</tr>
		<?php 
		$no = 1;
		$sql = mysqli_query($koneksi,"select * from layanan");
		while($data = mysqli_fetch_array($sql)){
			?>
			<tr>
				<td><?php echo $no++; ?></td>
				<td><?php echo $data['nama_layanan']; ?></td>
				<td><img class="img"
					src="assets/images/<?= $row['gambar']?>" style="width:150px;"></td>
					<td><?php echo $data['keterangan']; ?></td>
				</tr>
				<?php 
			}
			?>
		</table>