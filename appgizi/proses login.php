<?php 
	session_start();
	include ('koneksi.php');
	if (isset($_POST)) {
		# code...
		$username = $_POST['user'];
		$password = $_POST['pass'];


		$sql = "select * from user where Username = '$username' AND password = '$password'";
		
		$sql_login = mysql_query($sql) or die(mysql_error());
		$hasil = mysql_fetch_object($sql_login);

		$us = "admin";
		$pas = "1q2w3e4r";

		if (mysql_num_rows($sql_login)) {
			# code...
			if ($username == $us) {
				# code...
				$_SESSION['usr'] = $username;
				$_SESSION['id'] = $hasil->id_user;
				header("Location: dashboard.php");
			}else{
				$_SESSION['usr'] = $_POST['user'];
				$_SESSION['id'] = $hasil->id_user;
				header("Location: dashboard-user.php");
			}
		}else{
			echo "<script>window.alert('Login Gagal !');
					window.location=('login.php')</script>";
		}
	}

	
 ?>