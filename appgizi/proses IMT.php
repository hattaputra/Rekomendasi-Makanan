<?php 
	include 'koneksi.php';
	$prmtr = $_SESSION['usr'];
    $sql = "select Berat_Badan, Tinggi_Badan from user where username = '$prmtr'";
    $result = mysql_query($sql) or die(mysql_error());
    $rsl = mysql_fetch_row($result);

    $BB = $rsl[0];
    $TBc = $rsl[1] / 100;
    $TB = pow($TBc, 2);
    $IMT = $BB/$TB;

    $_SESSION['bb'] = $BB;
    $_SESSION['tb'] = $TBc;

    if ($IMT < 18.5) {
         # code...
         // echo "Kurus";
         $_SESSION['imt'] = "Kurus";
    } else if ($IMT > 25.0) {
         # code...
          // echo "Normal";
        $_SESSION['imt'] = "Obes";
    } else {
        # code...
        // echo "Obes";
        $_SESSION['imt'] = "Normal";
    }

	

 ?>