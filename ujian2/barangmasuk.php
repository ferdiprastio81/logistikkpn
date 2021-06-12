<?php 
require 'funtion1.php';

 // $optionBarang = query("SELECT tb_stock.nama_brg, tb_stock.uom FROM tb_stock ");
// var_dump($optionBarang);
// die;
if(isset($_POST["submit"] )){
  
	
	if(tambahBarangMasuk($_POST) >0){
		echo "<script>
        alert('Data Berhasil Ditambahkan')
        document.location.href='index.php';
		</script>";
	}else{
		echo "<script>
        alert('Data gagal Ditambahkan')
     	 document.location.href='barangmasuk.php';
		</script>";
	}

 }

 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Form Barang Masuk</title>
	    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body>
	
    <div class="container">
      <center>
        
    <h1>Form Tambah Stok Barang Masuk</h1>
      </center>
      <br>
      <form method="post" action="" style="width: 80%; margin: auto; margin-top: 5px;" enctype="multipart/form-data">
    
      	   <div class="form-group row">
    <label for="nama_brg" class="col-sm-2 col-form-label">Nama Barang</label>
    <div class="col-sm-10">

       <select name="nama_brg" id="nama_brg" class="form-control" onchange='changeValue(this.value)' required>
	  
	  <option value="">-Pilih-</option>

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
        <label for="stock" class="col-sm-2 col-form-label">Stock Saat ini:</label>
        <div class="col-sm-10">
           <input class="form-control"  name="stock" id="stock" readonly />    
        </div>
      </div>


      <div class="form-group row">
        <label for="uom" class="col-sm-2 col-form-label">Uom:</label>
        <div class="col-sm-10">
           <input class="form-control"  name="uom" id="uom" readonly />    
        </div>
      </div>


      <div class="form-group row">
    <label for="qty" class="col-sm-2 col-form-label">Tambah Stok:</label>
    <div class="col-sm-10">
       <input class="form-control"  name="qty" id="qty" required />    
    </div>
  </div>

     <div class="form-group row">
    <label for="penerima" class="col-sm-2 col-form-label">Penerima:</label>
    <div class="col-sm-10">
       <input class="form-control"  name="penerima" id="penerima" required />    
    </div>
  </div>   

  <div class="form-group row">
    <label for="tanggal_masuk" class="col-sm-2 col-form-label">Tanggal Masuk:</label>
    <div class="col-sm-10">
       <input class="form-control" type="date" name="tanggal_masuk" id="tanggal_masuk" required />    
    </div>
  </div>


   <div class="form-group row">
    <label for="keterangan" class="col-sm-2 col-form-label">keterangan:</label>
    <div class="col-sm-10">
       <input class="form-control"  name="keterangan" id="keterangan" required />    
    </div>
  </div>      


            <div class="form-group row">
              <label  class="col-sm-2 col-form-label"></label>
              <div class="col-sm-10">
              <button type="submit" name="submit" class="btn btn-primary">Submit</button>
              <button type="reset" class="btn btn-danger" name="reset" >Reset</button>
            
              <a href="index.php" title="">
              <button type="button" class="btn btn-warning">Kembali</button>
               </a>
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

