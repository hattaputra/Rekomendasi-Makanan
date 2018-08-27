<?php 
include 'koneksi.php';
 ?>
<!doctype html>
<html lang="en">
<head>
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

</head>
<body>
    <div class="main-panel">
                <div class="row">

                    <div class="col-md-6">
                        <div class="card ">
                            <div class="header">
                                <h4 class="title">Masukan Data</h4>
                                <p class="category">Pastikan Data yang Terisi Benar</p>
                            </div>
                            <div class="content">
                                <div class="table-full-width">
                                    <table class="table">
                                    <form action="vkj.php" method="POST" name="Input">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <p>Nama Makanan</p>
                                                    <input type="text" name="nama" style="width: 400px" required>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <p>Energi</p>
                                                    <input type="text" name="Energi" style="width: 400px" required>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <p>Protein</p>
                                                    <input type="text" name="kalori" style="width: 400px" required>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <p>Lemak</p>
                                                    <input type="text" name="Lemak" style="width: 400px" required>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <p>Serat</p>
                                                    <input type="text" name="Serat" style="width: 400px" required>
                                                </td>
                                            </tr>
                                            <tr>
                                              <td>
                                                    <button type="submit" name="input" value="input" class="btn btn-default">Tambah</button>
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


        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    <ul>
                        <li>
                            <a href="#">
                                Home
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Company
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Portfolio
                            </a>
                        </li>
                        <li>
                            <a href="#">
                               Blog
                            </a>
                        </li>
                    </ul>
                </nav>
                <p class="copyright pull-right">
                    &copy; <script>document.write(new Date().getFullYear())</script> <a href="http://www.creative-tim.com">Creative Tim</a>, made with love for a better web
                </p>
            </div>
        </footer>

    </div>
</div>


</body>

    <!--   Core JS Files   -->
    <script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Checkbox, Radio & Switch Plugins -->
	<script src="assets/js/bootstrap-checkbox-radio-switch.js"></script>

	<!--  Charts Plugin -->
	<script src="assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="assets/js/light-bootstrap-dashboard.js"></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<script src="assets/js/demo.js"></script>

	<!-- <script type="text/javascript">
    	$(document).ready(function(){

        	demo.initChartist();

        	$.notify({
            	icon: 'pe-7s-gift',
            	// message: "Welcome to <b>Light Bootstrap Dashboard</b> - a beautiful freebie for every web developer."

            },{
                type: 'info',
                timer: 4000
            });

    	});
	</script> -->

</html>
