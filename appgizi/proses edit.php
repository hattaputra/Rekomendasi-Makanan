<?php 
	session_start();
	include ('koneksi.php');

	if (isset($_POST)) {
		# code...
		$usr = $_SESSION['usr'];
		$bb = $_POST['bb'];
		$tb = $_POST['tb'];

		$sql = "update user set Berat_Badan = $bb, Tinggi_Badan = $tb where username = '$usr'";
		$result = mysql_query($sql) or die(mysql_error());

		echo "<script>window.alert('Data Berhasil Disimpan !');
				window.location=('dashboard-user.php')</script>";

		// $us = "admin";
		// $pas = "1q2w3e4r";

		// if (mysql_num_rows($sql_login)) {
		// 	# code...
		// 	if ($username == $us) {
		// 		# code...
		// 		$_SESSION['usr'] = $username;
		// 		$_SESSION['id'] = $hasil->id_user;
		// 		header("Location: dashboard.php");
		// 	}else{
		// 		$_SESSION['usr'] = $username;
		// 		$_SESSION['id'] = $hasil->id_user;
		// 		header("Location: dashboard-user.php");
		// 	}
		// }else{
			// echo "<script>window.alert('Login Gagal !');
			// 		window.location=('index.php')</script>";
		// }
	}

	
 ?>