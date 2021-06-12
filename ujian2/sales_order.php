<?php 
	require 'funtion1.php';
	// ambil data dari tabel so
	$sales = query("SELECT * FROM tb_so ");


 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<meta http-equiv="X-UA-Compatible" content="IE=edge">
 	<title>Form Sales Order</title>
 	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
 </head>
 <body>
 	<center>
 	<h1>Data Sales Order</h1>
 	 <a href="tambah2.php" title="">
              <button type="button" class="btn btn-success">Tambah Sales Order</button>
               </a>
 	<br>
 	<br>
 	<table border="1" cellpadding="10" cellspacing="0">
 		<tr>
 			<th>No</th>
 			<th> No SO</th>
 			<th>Nama Barang</th>
 			<th>Uom</th>
 			<th>Order</th>
			<th>Status</th>

 			<!-- <th colspan="2">Opsi</th> -->
 		</tr>
 		<tr>
 			<!-- Menampilkan Nomor -->
 			<?php $i=1; ?>
 			<?php foreach ($sales as $row ) :?>

 			<td> <?= $i ?></td>
 			<td><?=$row["no_so"] ?></td>
 			<td><?=$row["nama_brg"] ?></td>
 			<td><?=$row["uom"] ?></td>
 			<td><?=$row["total_order"] ?></td>
 			<td><?=$row["status"] ?></td>
 			<!-- <td>
 			<a href="edit_sales.php?id=<?= $row["id"] ?> ">
 				<button type="button" class="btn btn-warning" >Edit</button>
 			</a>	
 			</td>

 			<td>
 			<a href="hapus2.php?id=<?= $row["id"] ?> ">
 				<button type="button" class="btn btn-danger" >Hapus</button>
 			</a>	
 			</td> -->
 		</tr>
 	<?php $i++ ?>
 	<?php endforeach ?>
 	</table>
 	<br>
 	<br>
 	 <a href="index.php" title="">
              <button type="button" class="btn btn-info">Home</button>
               </a>
 	<br>
 	</center>
 </body>
 </html>