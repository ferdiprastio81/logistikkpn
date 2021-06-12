<?php 
require "funtion1.php";

if ( isset($_POST ["registrasi"]) ){
	if( register($_POST) >0 ){
		echo "<script>
			alert('user baru berhasil ditambahkan');
			 document.location.href='login.php';
		</script>";
	} else{
		echo mysqli_error($konek1);
	}
}
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<meta http-equiv="X-UA-Compatible" content="IE=edge">
 	<title>registrasi</title>
 	<link rel="stylesheet" href="">
 </head>
 <body>
 	<h1> Form Registrasi</h1>
 	<form action="" method="post" accept-charset="utf-8">
 		
 		<ul>
 			<li>
 				<label for="username"> Username</label>
 				<input type="text" name="username" id="username" autocomplete="off">
 			</li>

 			 			<li>
 				<label for="password"> password</label>
 				<input type="password" name="password" id="password">
 			</li>


 			 <li>
 				<label for="password"> Confirm password</label>
 				<input type="password" name="password2" id="password2">
 			</li>
 			<li>
 				<label for="level">Akses Level</label>
			<select name="level" id="level">
				<option>Pilih Akses Level</option>
				<option value=admin>Admin</option>
				<option value=manager>Manager</option>
				<option value=user1>User1</option>
				<option value=user2>User2</option>
			</select>
 			</li>
 			<li>
 				
 				<button type="submit" name="registrasi"> Registrasi</button>
 			</li>
 		</ul>
 	</form>
 </body>
 </html>