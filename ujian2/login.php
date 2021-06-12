<?php 

session_start();
require 'funtion1.php';

// cek cookie
if(isset($_COOKIE['id']) && isset($_COOKIE['key']) ){
	$id = $_COOKIE;
	$key = $_COOKIE;
	// ambil nama berdasarkan id
	$cekUser = mysqli_query($konek1, "SELECT * FROM tb_user WHERE id = '$id' ");
	$row = mysqli_fetch_assoc($cekUser);

	// cek cookie dan nama
	if($key === hash('sha256', $row['nama'])){
		$_SESSION['login'] = true;
	}
}

// jika masih ada session maka kembalikan ke menu index
if(isset($_SESSION["login"]) ){
	
	header("Location: index.php");
	exit;

}



	if(isset($_POST["login"]) ){
		$username = $_POST["username"];
		$password = $_POST["password"];

		$cekUser = mysqli_query($konek1, "SELECT * FROM tb_user WHERE username = '$username'");

		// cek username
		if(mysqli_num_rows($cekUser) === 1){
			// cek password
			$row = mysqli_fetch_assoc($cekUser);
			if ( password_verify($password, $row["password"]) ){
				
				// set session
				$_SESSION["login"] = true;
				// var_dump($_SESSION ["login"]);
				// die();
				$_SESSION['username']	= $row['username'];
				$_SESSION['level']  = $row['level'];

				if(isset($_POST["remember"]) ){
					// buat cookie
					setcookie('id', $row['id'], time()+30);
					setcookie('key', hash('sha256', $row['nama']), time()+30);
				}
				// header("Location: index.php");
								if($row['level'] == "admin")
		{	
			echo "<script>alert('Welcome To Administrator!');document.location.href='index.php'</script>/n";
		}
		else if($row['level'] =="user1")
		{
			echo "<script>alert('Welcome To User1 !');document.location.href='index.php'</script>/n";
		}else if($row['level'] =="manager")
		{
			echo "<script>alert('Welcome To manager !');document.location.href='index.php'</script>/n";
		}
		else
		{
			echo "<script>alert('Login Gagal !!!');document.location.href='login.php'</script>/n";
		}

				exit;
			}
		}

		$error = true;
	}
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<meta http-equiv="X-UA-Compatible" content="IE=edge">
 	<title>Halaman Login</title>
 	<link rel="stylesheet" href="">
 </head>
 <body>
 	
 			<h1>halaman Login</h1>
 			<?php if(isset($error)) : ?>
 				<p style="color: red; font-style: italic;"> Username / Password Salah</p>
 			<?php endif ?>
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
 				<input type="checkbox" name="remember" id="remember">
 				<label for="remember"> Remember Me</label>
 			</li>
 			<a href="registrasi.php" >
 			<p>Registrasi</p>
 			</a>
 			<li>
 				<button type="submit" name="login">Login</button>
 			</li>
	</ul>
 			</form>
 		
 </body>
 </html>