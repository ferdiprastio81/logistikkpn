<?php 
	$url="localhost";
	$username="root";
	$password="";
	$database="db_toko";
	// konek database
	$konek1 = mysqli_connect($url, $username, $password, $database);

	function query($query){
		global $konek1;
		$result = mysqli_query($konek1, $query);
		$rows =	[];
		while ($row = mysqli_fetch_assoc($result)) {
			$rows[] = $row;
		}
		return $rows;
	}




function tambahstok($data1){
	global $konek1;
	$kd_brg		= $data1['kd_brg'];
	$nama_brg	= $data1['nama_brg'];
	// $stock 		= $data1['stock'];
	$uom		= $data1['uom'];

	$queryTambahStok = "INSERT INTO tb_stock VALUES('', '$kd_brg', '$nama_brg', 0, '$uom')";

	mysqli_query($konek1, $queryTambahStok);
	return mysqli_affected_rows($konek1);
}

function tambahSales($data2){
	global $konek1;

	$no_so			= $data2['no_so'];
	$nama_brg		= $data2['nama_brg'];
	$uom			= $data2['uom'];
	$total_order	= $data2['total_order'];
	
	$cekStokSekarang = mysqli_query($konek1,"SELECT * FROM tb_stock WHERE nama_brg = '$nama_brg'");
	$ambilDatanya = mysqli_fetch_array($cekStokSekarang);
	
	$stokSekarang 	= $ambilDatanya['stock'];
	// kalo variabel yang sekarang cukup
	if($stokSekarang >= $total_order){
		// kalo barangnya cukup
		$totalStok  	= $stokSekarang - $total_order;


		$queryTambahSales = " INSERT INTO tb_so VALUES('','$no_so', '$nama_brg', '$uom',  $total_order, 'In Progress')";
		
		$updateStokKeluar =  mysqli_query($konek1,"UPDATE tb_stock SET stock = $totalStok WHERE nama_brg = '$nama_brg'");

		mysqli_query($konek1, $queryTambahSales);
		return mysqli_affected_rows($konek1);
  } else{
  	// kalo barangnya gak cukup
  	echo "<script>
     alert(' Stok Saat ini Tidak Mencukupi ');
     document.location.href = 'tambah2.php';
  	</script>";
  }
}

	function tambahPO($data4){
	global $konek1;
	$no_po				= $data4['no_po'];
	$nama_brg			= $data4['nama_brg'];
	$uom 				= $data4['uom'];
	$total_order 		= $data4['total_order'];

	// $cekStokSekarang = mysqli_query($konek1, "SELECT * FROM tb_stock WHERE nama_brg = '$nama_brg'");
	// $ambilDatanya	= mysqli_fetch_array($cekStokSekarang);

	// $stokSekarang = $ambilDatanya['stock'];


		$queryTambahPO 	 = "INSERT INTO tb_po VALUES('', '$no_po', '$nama_brg', '$uom', '$total_order', 'In Progress')";
		
		// $totalStok 		 = $stokSekarang + $total_order;
		

		// $updateStokKeluar = mysqli_query($konek1,"UPDATE tb_stock SET stock = $totalStok WHERE nama_brg = '$nama_brg'");
		mysqli_query($konek1, $queryTambahPO);
		return mysqli_affected_rows($konek1);

	}


	function tambahBarangMasuk($data3){
		global $konek1;

		
		$nama_brg		= $data3['nama_brg'];
		$penerima		= $data3['penerima'];
		$keterangan		= $data3['keterangan'];
		$qty			= $data3['qty'];
		$tanggal_masuk	= $data3['tanggal_masuk'];

		$cekStokSekarang = mysqli_query($konek1,"SELECT * FROM tb_stock WHERE nama_brg = '$nama_brg'");
		$ambilDatanya = mysqli_fetch_array($cekStokSekarang);

		$stokSekarang 	= $ambilDatanya['stock'];
		$totalStok  	= $stokSekarang + $qty;

		$queryTambahBarangMasuk = " INSERT INTO brg_masuk VALUES('', '$nama_brg', '$penerima','$keterangan','$qty',  '$tanggal_masuk')";
		
		$updateStokMasuk =  mysqli_query($konek1,"UPDATE tb_stock SET stock = $totalStok WHERE nama_brg = '$nama_brg'");
		mysqli_query($konek1, $queryTambahBarangMasuk);
		return mysqli_affected_rows($konek1);
	  
	}



	function hapus1($id1){
		global $konek1;
		mysqli_query($konek1, "DELETE FROM tb_stock WHERE id = $id1");
		return mysqli_affected_rows($konek1);

	}
	function hapus3($id3){
		global $konek1;
		mysqli_query($konek1, "DELETE FROM tb_po WHERE id = $id3");
		return mysqli_affected_rows($konek1);

	}

	function hapusSO($id2){
		global $konek1;
		$nama_brg		= $id2['nama_brg'];
		$cekStokYangDiOrder = mysqli_query($konek1, "SELECT tb_so.nama_brg FROM tb_so WHERE nama_brg = '$nama_brg' ");
		$ambilDataYangDiorder = mysqli_query($cekStokYangDiOrder);
		var_dump($cekStokYangDiOrder);
		die;
		$stokYangDiorder = $ambilDataYangDiorder['total_order'];

		$cekStokSekarang = mysqli_query($konek1, "SELECT * FROM tb_stock WHERE nama_brg = '$nama_brg' ");
		$ambilDatanya = mysqli_fetch_array($cekStokSekarang);
		$stokSekarang = $ambilDatanya['stock'];

		$totalStok = $stokSekarang + $stokYangDiorder;

		$updateStokMasuk = mysqli_query($konek1, " UPDATE tb_stock SET stock = $totalStok WHERE nama_brg ='$nama_brg'");

		$queryHapus2 = "DELETE FROM tb_so WHERE id = $id2";
		mysqli_query($konek1, $queryHapus2);
		return mysqli_affected_rows($konek1);

	}

	function editStok($data1){
		global $konek1;
		$id1 = $data1['id'];
		$kd_brg		= $data1['kd_brg'];
		$nama_brg	= $data1['nama_brg'];
		$stock 		= $data1['stock'];
		$uom		= $data1['uom'];

		$queryEditStok = "UPDATE tb_stock SET 
						kd_brg = '$kd_brg',
						nama_brg = '$nama_brg',
						stock 	=  '$stock',
						uom		= '$uom'
						WHERE id = $id1";
		mysqli_query($konek1, $queryEditStok);
		return mysqli_affected_rows($konek1);
	}

		function editSales($data2){
			global $konek1;
			$id2 		 = $data2['id'];
			$no_so		 = $data2['no_so'];
			$nama_brg	 = $data2['nama_brg'];
			$uom		 = $data2['uom'];
			$total_order = $data2['total_order'];

		$cekStokSekarang = mysqli_query($konek1, "SELECT * FROM tb_stock WHERE nama_brg = '$nama_brg'");

			$ambilDatanya = mysqli_fetch_array($cekStokSekarang);
			$stokSekarang = $ambilDatanya['stock'];


			$totalStok	  = $stokSekarang - $total_order;

			$queryEditSales = "UPDATE tb_so SET
						       no_so  		= '$no_so',
						       nama_brg 	= '$nama_brg',
						       uom			= '$uom',
						       total_order	= '$total_order'
						       WHERE id = $id2";

			$updateStokKeluar = mysqli_query($konek1, " UPDATE tb_stock SET stock = $totalStok WHERE nama_brg ='$nama_brg'");

			mysqli_query($konek1, $queryEditSales);
			return mysqli_affected_rows($konek1);
	}


		function editPO($data4){
			global $konek1;
			$id 		 = $data4['id'];
			$no_po		 = $data4['no_po'];
			$nama_brg	 = $data4['nama_brg'];
			$uom		 = $data4['uom'];
			$total_order = $data4['total_order'];

		$cekStokSekarang = mysqli_query($konek1, "SELECT * FROM tb_stock WHERE nama_brg = '$nama_brg'");

			$ambilDatanya = mysqli_fetch_array($cekStokSekarang);
			$stokSekarang = $ambilDatanya['stock'];


			$totalStok	  = $stokSekarang - $total_order;

			$queryEditPO = "UPDATE tb_po SET
						       no_po  		= '$no_po',
						       nama_brg 	= '$nama_brg',
						       uom			= '$uom',
						       total_order	= '$total_order'
						       WHERE id = $id3";

			$updateStokKeluar = mysqli_query($konek1, " UPDATE tb_stock SET stock = $totalStok WHERE nama_brg ='$nama_brg'");

			mysqli_query($konek1, $queryEditPO);
			return mysqli_affected_rows($konek1);
	}

		function cari($keyword){
			$pencarian = "SELECT * FROM tb_stock
							WHERE
							nama_brg LIKE '%$keyword%' OR 
							uom LIKE '%$keyword%'
							";

			return query($pencarian);
		 
		}			

function register($data5){
		global $konek1;

		$username = strtolower(stripslashes($data5 ['username']));
		$password = mysqli_real_escape_string($konek1, $data5['password']);
		$password2 = mysqli_real_escape_string($konek1, $data5['password2']);
		$level     =$data5['level'];
		// cek di database username tsb sudah ada atau belum
		$cekUser = mysqli_query($konek1, "SELECT username FROM tb_user WHERE username = '$username'");
		// var_dump($cekUser);
		// die;
		if(mysqli_fetch_assoc($cekUser)){
			echo "<script>
			alert('user sudah ada');
			</script>";
		return false;
		}

		// cek konfirm password
		if($password !== $password2){
			echo "<script>
			alert('konfirm password tidak sesuai');
			</script>";
		return false;
		}


		// encript password
		$password = password_hash($password, PASSWORD_DEFAULT);

		// tambahkan user baru ke database
		mysqli_query($konek1, "INSERT INTO tb_user VALUES ('','$username', '$password','$level') ");
		return mysqli_affected_rows($konek1); 	




	}

	function approval($data6){
	global $konek1;

	
	$no_po 		 = $data6['no_po'];
	$status 	 = $data6['status'];
	$total_order = $data6['total_order'];
	$nama_brg	 = $data6['nama_brg'];

	$cekStokSekarang = mysqli_query($konek1, "SELECT * FROM tb_stock WHERE nama_brg = '$nama_brg'");
	$ambilDatanya	= mysqli_fetch_array($cekStokSekarang);

	$stokSekarang = $ambilDatanya['stock'];

	$totalStok 		 = $stokSekarang + $total_order;
		
	$updateStokKeluar = mysqli_query($konek1,"UPDATE tb_stock SET stock = $totalStok WHERE nama_brg = '$nama_brg'");

	$updateApprove =  mysqli_query($konek1,"UPDATE tb_po SET status = 'Approve' WHERE no_po = '$no_po'");
	
	mysqli_query($konek1, $updateApprove);
	return mysqli_affected_rows($konek1);
  
}
	
function reject($data7){
	global $konek1;

	
	$no_po = $data7['no_po'];
	$status = $data7['status'];
	
		$updateReject =  mysqli_query($konek1,"UPDATE tb_po SET status = 'Reject' WHERE no_po = '$no_po'");

		mysqli_query($konek1, $updateReject);
		return mysqli_affected_rows($konek1);
  
}




?>		
