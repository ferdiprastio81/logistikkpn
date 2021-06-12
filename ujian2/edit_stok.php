<?php 
require 'funtion1.php';

// ambil data id yang di url
$id=$_GET['id'];

$stokEdit =query("SELECT * FROM tb_stock WHERE id = $id")[0];

if(isset($_POST["submit"])){
	if(editStok($_POST)>0){
		echo "<script>
       alert('data berhasil di edit');
      	document.location.href= 'index.php';
		</script>";
	}else{
		echo "<script>
       alert('data gagal di edit');
  		document.location.href= 'index.php';
		</script>";
	}
}

?>

<!DOCTYPE html>
<html>
     <!-- document.location.href= 'index.php'; -->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body>
	
    <div class="container">
      <center>
        
    <h1>Form Edit Stok Toko</h1>
      </center>
      <form method="post" action="" style="width: 80%; margin: auto; margin-top: 5px;" enctype="multipart/form-data">
  	<input type="hidden" class="form-control" id="id" name="id" value="<?=$stokEdit['id'] ?>">
    <div class="form-group row">
    <label for="kd_brg" class="col-sm-2 col-form-label">kode Barang :</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="kd_brg" name="kd_brg" value="<?=$stokEdit['kd_brg'] ?>">
    </div>
  </div>

  <div class="form-group row">
    <label for="nama_brg" class="col-sm-2 col-form-label">Nama Barang :</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="nama_brg" name="nama_brg" value="<?=$stokEdit['nama_brg'] ?>">
    </div>
  </div>

   <div class="form-group row">
    <label for="stock" class="col-sm-2 col-form-label">Stock :</label>
    <div class="col-sm-10">
      <input type="number" class="form-control" id="stock" name="stock" value="<?=$stokEdit['stock'] ?>">
    </div>
  </div>



             <div class="form-group row">
              <label for="uom" class="col-sm-2 col-form-label">Uom :</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="uom" id="uom" value="<?=$stokEdit['uom'] ?>">
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