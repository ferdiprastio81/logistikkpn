<?php
		require 'funtion1.php';
		$id2 = $_GET['id'];

		if(hapusSO($id2) > 0){
			echo "<script>
		    alert('data berhasil dihapus');
		    document.location.href = 'sales_order.php';
			</script>";
		}else{
			echo "<script>
		    alert('data gagal dihapus');
		    document.location.href = 'sales_order.php';
			</script>";
		}



?>