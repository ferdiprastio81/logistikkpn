<?php 
	require 'funtion1.php';
	$id3 = $_GET['id'];

	if(hapus3($id3) > 0){
		echo "<script>
		    alert('data berhasil dihapus');
		    document.location.href='data_po.php';
			</script>";
		}else{
			echo "<script>
		    alert('data gagal dihapus');
		    document.location.href='data_po.php';
			</script>";
		}

 ?>