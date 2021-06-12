  <?php 
  require 'funtion1.php';

 // $optionBarang = query("SELECT tb_stock.nama_brg, tb_stock.uom FROM tb_stock ");
// var_dump($optionBarang);
// die;
  if(isset($_POST["approve"] )){
  	
  	 if(approval($_POST) >0){

  	}else{
	echo "<script>
	          alert('Data Telah Disetujui');
	          document.location.href='data_po.php';
	  		</script>";
}

   }else if(isset($_POST["reject"])){
	  if(reject($_POST) >0){
	  		
   }else{
	echo "<script>
	          alert('Data Berhasil Di Reject');
	          document.location.href='data_po.php';
	  		</script>";
}
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Form Approval</title>
	    <!-- Bootstrap CSS -->
  
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
	
    <div class="container">
      <center>
        <br>
    <h1>Form Approval</h1>
      </center>
      <br>
      <br>
      <form method="post" action="" style="width: 80%; margin: auto; margin-top: 5px;" enctype="multipart/form-data">
   <!--  <div class="form-group row">
    <label for="no_so" class="col-sm-2 col-form-label">no SO :</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="no_so" name="no_so" >
    </div>
  </div> -->
      	   <div class="form-group row">
    <label for="no_po" class="col-sm-2 col-form-label">No PO</label>
    <div class="col-sm-10">

       <select name="no_po" id="no_po" class="form-control" onchange='changeValue(this.value)' required>
	  
	  <option value="">-Pilih-</option>

     <?php 
     
    	 $optionBarang = mysqli_query($konek1, "SELECT tb_po.no_po, tb_po.nama_brg, tb_po.total_order, tb_po.status FROM tb_po WHERE status='In Progress'");  
    	 $jsArray = "var prdName = new Array();\n";

    	 while ($row1 = mysqli_fetch_array($optionBarang)) {  

    	 echo '<option name="no_po"  value="' . $row1['no_po'] . '">' . $row1['no_po'] . '</option>';  
    	 $jsArray .= "prdName['" . $row1['no_po'] . "'] = {nama_brg:'" . addslashes($row1['nama_brg']) . "', total_order: '".addslashes($row1['total_order'])."', status: '".addslashes($row1['status'])."'};\n";
    	  
    	  }
    	  ?>
    	</select>
    		
        </div>
      </div>

        	<script type="text/javascript"> 
        	<?php echo $jsArray; ?>
        	function changeValue(id){
        	    document.getElementById('nama_brg').value = prdName[id].nama_brg;
        	   	document.getElementById('total_order').value = prdName[id].total_order;
        	   	document.getElementById('status').value = prdName[id].status;
        	};
        	</script>
  



 


         <div class="form-group row">
          <label for="nama_brg" class="col-sm-2 col-form-label">Nama Barang :</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="nama_brg" name="nama_brg" readonly>
          </div>
        </div>

       
        <div class="form-group row">
            <label for="total_order" class="col-sm-2 col-form-label">Total Order:</label>
            <div class="col-sm-10">
               <input type="number" class="form-control"  name="total_order" id="total_order" readonly />    
            </div>
          </div>

         <div class="form-group row">
            <label for="status" class="col-sm-2 col-form-label">Status :</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="status" name="status" readonly>
            </div>
          </div>
             


            <div class="form-group row">
              <label  class="col-sm-2 col-form-label"></label>
              <div class="col-sm-10">
              <button type="submit" name="approve" class="btn btn-success">Approve</button>

              <button type="submit" class="btn btn-danger" name="reject" >Reject</button>
            
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

