<?php 

	require 'funtion1.php';

	// ambil berdasarkan id
	$id2 = $_GET['id'];

	$salesEdit = query("SELECT * FROM tb_so WHERE id = $id2")[0];
// var_dump($salesEdit);
// die;
	if(isset($_POST["submit"])){
		if(editSales($_POST) > 0){
			echo"<script>
            alert('data berhasil di ubah');
            document.location.href='sales_order.php';
			</script>";
		}else{
			echo"<script>
            alert('data gagal diubah');
            document.location.href='sales_order.php';
			</script>";
		}
	}


 ?>
 <!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Form Edit Sales </title>
	    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body>
	
    <div class="container">
      <center>
        
    <h1>Form  Edit Sales </h1>
      </center>
      <form method="post" action="" style="width: 80%; margin: auto; margin-top: 5px;" enctype="multipart/form-data">

    <input type="hidden" class="form-control" id="id" name="id" value="<?= $salesEdit['id'] ?>">

    <div class="form-group row">
    <label for="no_so" class="col-sm-2 col-form-label">no SO :</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="no_so" name="no_so" value="<?= $salesEdit['no_so'] ?>" readonly>
    </div>
  </div>
      	   <div class="form-group row">
    <label for="nama_brg" class="col-sm-2 col-form-label">Nama Barang</label>
    <div class="col-sm-10">

       <select name="nama_brg" id="nama_brg" class="form-control" onchange='changeValue(this.value)' required>
	  
	  <option value="<?= $salesEdit['nama_brg'] ?>">Pilihan Saat ini <?= $salesEdit['nama_brg'] ?></option>

     <?php 
     
    	 $optionBarang = mysqli_query($konek1, "SELECT tb_stock.nama_brg, tb_stock.uom, tb_stock.stock FROM tb_stock");  
    	 $jsArray = "var prdName = new Array();\n";

    	 while ($row1 = mysqli_fetch_array($optionBarang)) {  

    	 echo '<option name="nama_brg"  value="' . $row1['nama_brg'] . '">' . $row1['nama_brg'] . '</option>';  
    	 $jsArray .= "prdName['" . $row1['nama_brg'] . "'] = {uom:'" . addslashes($row1['uom']) . "', stock: '".addslashes($row1['stock'])."'};\n";
    	  
    	  }
    	  ?>
    	</select>
    		
        </div>
      </div>

        	<script type="text/javascript"> 
        	<?php echo $jsArray; ?>
        	function changeValue(id){
        	    document.getElementById('uom').value = prdName[id].uom;
        	   	document.getElementById('stock').value = prdName[id].stock;
        	};
        	</script>
  



      



        

         <div class="form-group row">
            <label for="total_order" class="col-sm-2 col-form-label">Order :</label>
            <div class="col-sm-10">
              <input type="number" class="form-control" id="total_order" name="total_order" value="<?= $salesEdit['total_order'] ?>">
            </div>
          </div>
             
        <div class="form-group row">
            <label for="uom" class="col-sm-2 col-form-label">Uom:</label>
            <div class="col-sm-10">
               <input class="form-control"  name="uom" id="uom" value="<?= $salesEdit['uom'] ?>" readonly />    
            </div>
          </div>


            <div class="form-group row">
              <label  class="col-sm-2 col-form-label"></label>
              <div class="col-sm-10">
              <button type="submit" name="submit" class="btn btn-primary">Submit</button>
              </div>
            </div>

          </form>
    </div>
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>



