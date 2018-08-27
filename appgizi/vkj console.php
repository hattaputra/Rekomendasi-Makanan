<?php
include 'koneksi.php';

$sql1 = "select kalori, protein, lemak, serat from vkj where id_vkj = 1";
$sql2 = "select kalori, protein, lemak, serat from vkj where id_vkj = 2";
$sql3 = "select kalori, protein, lemak, serat from vkj where id_vkj = 3";
$result1 = mysql_query($sql1) or die();
$result2 = mysql_query($sql2) or die();
$result3 = mysql_query($sql3) or die();
$rsl1 = mysql_fetch_row($result1);
$rsl2 = mysql_fetch_row($result2);
$rsl3 = mysql_fetch_row($result3);

$Vkj1 = array($rsl1[0], $rsl1[1], $rsl1[2], $rsl1[3]);
$Vkj2 = array($rsl2[0], $rsl2[1], $rsl2[2], $rsl2[3]);
$Vkj3 = array($rsl3[0], $rsl3[1], $rsl3[2], $rsl3[3]);

// print_r($Vkj1);
// echo "<br>";
// print_r($Vkj2);
// echo "<br>";
// print_r($Vkj3);
// echo "<br>";

	$Energi = 435;
	$Protein = 7.1;
	$Lemak = 19.8;
	$Serat = 0.6;


			# code...

			$dE1 = sqrt(pow(($Energi - $Vkj1[0]), 2) + pow(($Protein - $Vkj1[1]), 2) + pow(($Lemak - $Vkj1[2]), 2) + pow(($Serat - $Vkj1[3]), 2));
			$dE2 = sqrt(pow(($Energi - $Vkj2[0]), 2) + pow(($Protein - $Vkj2[1]), 2) + pow(($Lemak - $Vkj2[2]), 2) + pow(($Serat - $Vkj2[3]), 2));
			$dE3 = sqrt(pow(($Energi - $Vkj3[0]), 2) + pow(($Protein - $Vkj3[1]), 2) + pow(($Lemak - $Vkj3[2]), 2) + pow(($Serat - $Vkj3[3]), 2));

			print_r($dE1);
			echo "<br>";
			print_r($dE2);
			echo "<br>";
			print_r($dE3);
			echo "<br>";
			$a = $dE1;
			$c = "C1";
			if ($a > $dE2) {
				# code...
				$a = $dE2;
				$c = "C2";
			}
			if ($a > $dE3) {
				# code...
				$a = $dE3;
				$c = "C3";
			}
			print_r($c);
			$_POST['c'] = $c;
			// print_r($Energi);
			// print_r($Protein);
			// print_r($Lemak);
			// print_r($Serat);
			// print_r($c);
			
 ?>