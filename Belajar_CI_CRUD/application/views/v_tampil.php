<!DOCTYPE html>
<html>
<head>
	<title>Membuat CRUD dengan CodeIgniter | MalasNgoding.com</title>
</head>
<body>
	<center><h1>Membuat CRUD dengan CodeIgniter | MalasNgoding.com</h1></center>
	<center><?php echo anchor('crud/tambah','Tambah Data'); ?></center>
	<table style="margin:20px auto;" border="1">
		<tr>
			<th>No</th>
			<th>Nama</th>
			<th>Alamat</th>
			<th>Pekerjaan</th>
			<th>Action</th>
		</tr>
		<?php 
		$no = 1;
		foreach($user as $u){ //$use menjadi $ur diubah menjadi variabel perantara
		?>
		<tr>
			<td><?php echo $no++ ?></td>
			<td><?php echo $u->nama ?></td>
			<td><?php echo $u->alamat ?></td>
			<td><?php echo $u->pekerjaan ?></td>
			<td>
				<!-- anchor untuk membuat hyperlink -->
					<!-- paameter pertama menuju ke link tujuan yaitu crud dan parameter kedua text yang akan ditampilkan yaitu edit -->
			      <?php echo anchor('crud/edit/'.$u->id,'Edit'); ?> 
				  	<!-- paameter pertama menuju ke link tujuan yaitu crud dan parameter kedua text yang akan ditampilkan yaitu hapus -->
                  <?php echo anchor('crud/hapus/'.$u->id,'Hapus'); ?>
			</td>
		</tr>
		<?php } ?>
	</table>
</body>
</html>