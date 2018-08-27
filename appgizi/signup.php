<!DOCTYPE html>
<?php
	include"koneksi.php";
?>
<html>
<head>
	<title>Gizi</title>

	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Aplikasi Gizi</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
	<!-- <link rel="stylesheet" type="text/css" href="css/style.css"> -->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
<div id="Navbar" class="navbar navbar-default navbar-fixed-top" role="navigation">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a href="index.php" class="navbar-brand">GIZI</a>
		</div>
	</div>
</div>


<div class="row">

                    <div class="col-md-6" style="left: 300px; top: 100px" >
                        <div class="card ">
                            <div class="header">
                                <h4 class="title" align="">Sign Up</h4>
                                <p class="category">Pastikan Data yang Terisi Benar</p>
                            </div>
                            <div class="content">
                                <div class="table-full-width">
                                    <table class="table">
                                    <form method="POST" action="proses signup.php">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <p>Username</p>
                                                    <input type="text" class="form-control" placeholder="Username" name="user" width="50px" required>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <p>Password</p>
                                                    <!-- <input type="text" name="pass" style="width: 400px" required> -->
                                                    <input type="password" class="form-control" placeholder="Password" name="pass" required>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <p>Berat Badan</p>
                                                    <input type="text" class="form-control" placeholder="Berat Badan" name="bb" width="50px" required>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <p>Tinggi Badan</p>
                                                    <input type="text" class="form-control" placeholder="Tinggi Badan" name="tb" width="50px" required>
                                                </td>
                                            </tr>
                                            <tr>
                                              <td>
                                                    <button type="submit" name="input" value="input" class="btn btn-default">Simpan</button>
                                              </td>  
                                            </tr>
                                        </tbody>
                                    </form>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</body>
</html>