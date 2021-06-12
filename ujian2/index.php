<?php 
	session_start();
	
// jika tidak ada session maka dipindahkan ke halaman login
if( !isset($_SESSION["login"])){
header("Location: login.php");
exit;
}
	
	require 'funtion1.php';

	// ambil data dari tabel stock
	$stok1 = query("SELECT * FROM tb_stock");
	// tombol cari ditekan
	if (isset($_POST ["cari"]) ) {
		$stok1 = cari($_POST["keyword"]);
	}
 ?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php echo $_SESSION['level']?>-Form Master Barang</title>
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@600&family=Rajdhani&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="style.css">
	<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->
<!-- 	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script> -->
	  <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> -->
	

</head>
<body>
	<nav>
		<div class="logo">
			<h4>Aplikasi Gudang</h4>
		</div>

		
		<ul >
			<li><a href="index.php" title="">Home</a></li>
		<?php 
			$level = $_SESSION['level'];
			if($level == 'user1') {
		 ?>
		 <li id="po"><a href="data_po.php" title="">Form Purchase Order</a></li>
		 <li><a href="logout.php" title="">Logout</a></li>

		 <?php }  elseif($level == 'manager') { ?>
		  <li name="so" > <a href="sales_order.php" >Form Sales Order</a></li> 
		  <li><a href="approval.php" title="">Form Pesetujuan</a></li>
		   <li><a href="logout.php" title="">Logout</a></li>

		  <?php }  else{ ?>
			 <li><a href="tambah_stok.php"  title="">Tambah Barang</a></li>
		  	  <li id="po"><a href="data_po.php" title="">Form Purchase Order</a></li>
		  	   <li name="so" > <a href="sales_order.php" >Form Sales Order</a></li>
		  	   <li><a href="approval.php" title="">Form Pesetujuan</a></li>
			 <li><a href="logout.php" title="">Logout</a></li>
		  <?php } ?>
		 
			<!-- <li><a href="" title="">Tambah Stok Barang Masuk</a></li> -->
		</ul>
		<div class="menu-toggle">
			<input type="checkbox" name="">
			   <span></span>
			         <span></span>
			<span></span>
		</div>
	</nav>
	<center>
	<br>
	<h1>Form Master Barang</h1>
	<h5>Halo, <?php echo $_SESSION['level']?></h5>
	<br>
	<br>
	
	
	<?php 
		$ambilDataStok = mysqli_query( $konek1, "SELECT * FROM tb_stock WHERE stock < 1");
		while ($fetch = mysqli_fetch_array ($ambilDataStok)) {
			$barang = $fetch['nama_brg'];
	 ?>

	  <div class="alert alert-danger alert-dismissible">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <center><strong>Perhatian!</strong> Stok <?= $barang; ?>Telah Habis.</center>
        </div>

	 <?php 
		}
	  ?>

		<form action="" method="post" >

			<input type="text" name="keyword" placeholder="cari barang" size="40" autocomplete="off" autofocus>
			<button type="submit" name="cari">cari !</button>
		</form>	  
				<br>

	<div style="overflow-x:auto;"> <!-- AWAL tampil tabel responsive geser -->
	<table border="1"  cellpadding="20" cellspacing="1" style="width: 50%; ">
	<tr style="height: 150%;">
		<th>No</th>
		<th>Kode Barang</th>
		<th>Nama Barang</th>
		<th> Stock </th>
		<th>Uom</th>
		<th colspan="2">Opsi</th>
	</tr>
	<tr style="height: 150%;">
		<!-- menampilkan nomor urut -->
		<?php $i=1; ?>
		<!-- looping menampilkan data ke tabel -->
		<?php foreach ($stok1 as $row ) :?>
		<td><?= $i ?></th>
		<td><?= $row["kd_brg"] ?></td>
		<td><?= $row["nama_brg"] ?></td>
		<td><?= $row["stock"] ?></td>
		<td><?= $row["uom"]?></td>
		<td>
			<a href="edit_stok.php?id=<?= $row["id"] ?>" >
				<button type="button" style="background-color: #ffc107; width: 100%;" >Edit</button>
			</a>
		</td>
		<td>
			<a href="hapus.php?id=<?= $row["id"] ?>" title="">
				<button type="button" style="background-color: #dc3545; color: white; width: 100%;" class="btn btn-danger" >Hapus</button>
			</a>
		</td>
	</tr>
		<?php $i++; ?>
		<?php endforeach?>
	</table>
	</div> <!-- AKHIR tampil tabel responsive geser -->
	</center>

<script src="script.js"></script>
	</body>
</html>