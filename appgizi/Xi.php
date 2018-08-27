<?php 
include 'koneksi.php';

define('EPLSION', 0.0000001);
define('MaxIter', 25000);
define('Cluster_Set', 3);
define('P0', 0);
define('Iteration', 1);

$sql = "select * from nutrisi";
$result = mysql_query($sql) or die();
$jml_row = mysql_num_rows($result);

$i = 0;
$k = 1;
$min = 99999999999999999;
$max = -999999999999999.9;
$n = array();
while ($i < $jml_row) {
	# code...
	$sql = "select Energi, Protein, Lemak, Serat from nutrisi where id_nutrisi = $k";
	$result = mysql_query($sql) or die();
	$rsl = mysql_fetch_row($result);

	// $z = 0;
	// while ($z < 4) {
	// 	# code...
	// 	if ($rsl[$z] > $max) {
	// 		# code...
	// 		$max = $rsl[$z];
	// 	}
	// 	if ($rsl[$z] < $min) {
	// 		# code...
	// 		$min = $rsl[$z];
	// 	}
	// 	$z++;
	// }
	$nutrisi[] = array(
			'Energi' => $rsl[0],
			'Protein' => $rsl[1],
			'Lemak' => $rsl[2],
			'Serat' => $rsl[3]
		);
	// print_r($n[$i]['Energi']);
	// echo "&nbsp &nbsp";
	// print_r($n[$i]['Protein']);
	// echo "&nbsp &nbsp";
	// print_r($n[$i]['Lemak']);
	// echo "&nbsp &nbsp";
	// print_r($n[$i]['Serat']);
	// echo "<br>";


	$k++;
	$i++;
}
// echo "Max = ";
// print_r($max);
// echo "<br>Min = ";
// print_r($min);
// echo "<br><br>";
// $i = 0;
// $nutrisi = array();
// while ($i < $jml_row) {
// 	# code...
// 	$nutrisi[] = array(
// 			'Energi' => ((($n[$i]['Energi']-$min)/($max-$n[$i]['Energi']))*(9-1))+1,
// 			'Protein'=> ((($n[$i]['Protein']-$min)/($max-$n[$i]['Protein']))*(9-1))+1,
// 			'Lemak' => ((($n[$i]['Lemak']-$min)/($max-$n[$i]['Lemak']))*(9-1))+1,
// 			'Serat' => ((($n[$i]['Serat']-$min)/($max-$n[$i]['Serat']))*(9-1))+1,
// 		);
// 	print_r($nutrisi[$i]['Energi']);
// 	echo "&nbsp &nbsp";
// 	print_r($nutrisi[$i]['Protein']);
// 	echo "&nbsp &nbsp";
// 	print_r($nutrisi[$i]['Lemak']);
// 	echo "&nbsp &nbsp";
// 	print_r($nutrisi[$i]['Serat']);
// 	echo "<br>";

// 	$i++;
// }

# <--------------------BILANGAN RANDOM------------------------------------>
$i = 0;
$k = 1;
echo "<br><br>Bilangan Random <br>";
$BilRand = array();
	
while ($i < $jml_row) {
	# code...
	$z = "select bil1, bil2, bil3, bil4 FROM bilrand where id_bil = $k";
	$rst = mysql_query($z) or die();
	$rs = mysql_fetch_row($rst);
	$z = 0;
	while ($z < 4) {
		# code...
		if ($rs[$z] > $max) {
			# code...
			$max = $rs[$z];
		}
		if ($rs[$z] < $min) {
			# code...
			$min = $rs[$z];
		}
		$z++;
	}
	$BilRand[] = array(
		// ((($uii[$i]['1']-$min)/($max-$uii[$i]['1']))*(0.99-0.01))+0.01
		'C1' => $rs[0],
		'C2' => $rs[1],
		'C3' => $rs[2]

		// 'C1' => ((($rs[0]-$min)/($max-$rs[0]))*(0.99-0.1)+0.01),
		// 'C2' => ((($rs[1]-$min)/($max-$rs[0]))*(0.99-0.1)+0.01),
		// 'C3' => ((($rs[2]-$min)/($max-$rs[0]))*(0.99-0.1)+0.01)
		);
	// print_r($k);
	// echo "&nbsp &nbsp";
	// print_r($BilRand[$i]['C1']);
	// echo "&nbsp &nbsp";
	// print_r($BilRand[$i]['C2']);
	// echo "&nbsp &nbsp";
	// print_r($BilRand[$i]['C3']);
	// echo "<br>";
	$k++;
	$i++; 

}
	echo "<br>max = ";
	print_r($max);
	echo "<br>min = ";
	print_r($min);
// echo "Max = ";
// print_r($max);
// echo "<br>Min = ";
// print_r($min);
// echo "<br><br>";
// $i= 0;
// $k = 1;
// $BilRand = array();
// while ($i < $jml_row) {
// 	# code...
// 	$BilRand[] = array(
// 		'C1' => ((($B[$i]['C1']-$min)/($max-$B[$i]['C1']))*(0.9-0.1))+1,
// 		'C2' => ((($B[$i]['C2']-$min)/($max-$B[$i]['C2']))*(0.9-0.1))+1,
// 		'C3' => ((($B[$i]['C3']-$min)/($max-$B[$i]['C3']))*(0.9-0.1))+1
// 		);
// 	print_r($k);
// 	echo "&nbsp &nbsp";
// 	print_r($B[$i]['C1']);
// 	echo "&nbsp &nbsp";
// 	print_r($B[$i]['C2']);
// 	echo "&nbsp &nbsp";
// 	print_r($B[$i]['C3']);
// 	echo "<br>";
// 	$k++;
// 	$i++;
// }
# <--------------------LANGKAH 3------------------------------------>
# <--------------------Ui2------------------------------------>
$i = 0;
$Ui2 = array();
echo "<br>UI2<Br>";
while ($i < $jml_row) {
	# code...
	$Ui2[] = array(
		'Ui12' => pow($BilRand[$i]['C1'], 2),
		'Ui22' => pow($BilRand[$i]['C2'], 2),
		'Ui32' => pow($BilRand[$i]['C3'], 2)
		);
	$i++;
}
$i = 0;
while ($i < $jml_row) {
	# code...
	// print_r($Ui2[$i]['Ui12']);
	// echo("&nbsp &nbsp &nbsp");
	// print_r($Ui2[$i]['Ui22']);
	// echo("&nbsp &nbsp &nbsp");
	// print_r($Ui2[$i]['Ui32']);
	// echo("<br>");
	$i++;
}
$i = 1;
$SumUi12 = $Ui2[0]['Ui12'];
$SumUi22 = $Ui2[0]['Ui22'];
$SumUi32 = $Ui2[0]['Ui32'];
while ($i < $jml_row) {
	# code...
	$SumUi12 =  $SumUi12 + $Ui2[$i]['Ui12'];
	$SumUi22 =  $SumUi22 + $Ui2[$i]['Ui22'];
	$SumUi32 =  $SumUi32 + $Ui2[$i]['Ui32'];
	$i++;
}
// print_r($SumUi12);
// echo("&nbsp &nbsp &nbsp");
// print_r($SumUi22);
// echo("&nbsp &nbsp &nbsp");
// print_r($SumUi32);
// echo "<br>";

# <--------------------U12X1------------------------------------>
$i = 0;
$U12X1 = array();
echo "<br>Ui2X1<br>";
while ($i < $jml_row) {
	# code...
	$U12X1[] = array(
		'1' => $Ui2[$i]['Ui12']*$nutrisi[$i]['Energi'],
		'2' => $Ui2[$i]['Ui12']*$nutrisi[$i]['Protein'],
		'3' => $Ui2[$i]['Ui12']*$nutrisi[$i]['Lemak'],
		'4' => $Ui2[$i]['Ui12']*$nutrisi[$i]['Serat']
		);
	$i++;
}
$i = 0;
while ($i < $jml_row) {
	# code...
	// print_r($U12X1[$i]['1']);
	// echo("&nbsp &nbsp &nbsp &nbsp &nbsp");
	// print_r($U12X1[$i]['2']);
	// echo("&nbsp &nbsp &nbsp &nbsp &nbsp");
	// print_r($U12X1[$i]['3']);
	// echo("&nbsp &nbsp &nbsp &nbsp &nbsp");
	// print_r($U12X1[$i]['4']);
	// echo("<br>");
	$i++;
}
$i = 1;
$SumU12X1 = $U12X1[0]['1'];
$SumU12X2 = $U12X1[0]['2'];
$SumU12X3 = $U12X1[0]['3'];
$SumU12X4 = $U12X1[0]['4'];
while ($i < $jml_row) {
	# code...
	$SumU12X1 =  $SumU12X1 + $U12X1[$i]['1'];
	$SumU12X2 =  $SumU12X2 + $U12X1[$i]['2'];
	$SumU12X3 =  $SumU12X3 + $U12X1[$i]['3'];
	$SumU12X4 =  $SumU12X4 + $U12X1[$i]['4'];

	$i++;
}
// print_r($SumU12X1);
// echo("&nbsp &nbsp &nbsp");
// print_r($SumU12X2);
// echo("&nbsp &nbsp &nbsp");
// print_r($SumU12X3);
// echo("&nbsp &nbsp &nbsp");
// print_r($SumU12X4);
// echo "<br>";

# <--------------------U12X2------------------------------------>
$i = 0;
$U12X2 = array();
echo "<br>Ui2X2<br>";
while ($i < $jml_row) {
	# code...
	$U12X2[] = array(
		'1' => $Ui2[$i]['Ui22']*$nutrisi[$i]['Energi'],
		'2' => $Ui2[$i]['Ui22']*$nutrisi[$i]['Protein'],
		'3' => $Ui2[$i]['Ui22']*$nutrisi[$i]['Lemak'],
		'4' => $Ui2[$i]['Ui22']*$nutrisi[$i]['Serat']
		);
	$i++;
}
$i = 0;
while ($i < $jml_row) {
	# code...
	// print_r($U12X2[$i]['1']);
	// echo("&nbsp &nbsp &nbsp &nbsp &nbsp");
	// print_r($U12X2[$i]['2']);
	// echo("&nbsp &nbsp &nbsp &nbsp &nbsp");
	// print_r($U12X2[$i]['3']);
	// echo("&nbsp &nbsp &nbsp &nbsp &nbsp");
	// print_r($U12X2[$i]['4']);
	// echo("<br>");
	$i++;
}
$i = 1;
$SumU22X1 = $U12X2[0]['1'];
$SumU22X2 = $U12X2[0]['2'];
$SumU22X3 = $U12X2[0]['3'];
$SumU22X4 = $U12X2[0]['4'];
while ($i < $jml_row) {
	# code...
	$SumU22X1 =  $SumU22X1 + $U12X2[$i]['1'];
	$SumU22X2 =  $SumU22X2 + $U12X2[$i]['2'];
	$SumU22X3 =  $SumU22X3 + $U12X2[$i]['3'];
	$SumU22X4 =  $SumU22X4 + $U12X2[$i]['4'];

	$i++;
}
// print_r($SumU22X1);
// echo("&nbsp &nbsp &nbsp");
// print_r($SumU22X2);
// echo("&nbsp &nbsp &nbsp");
// print_r($SumU22X3);
// echo("&nbsp &nbsp &nbsp");
// print_r($SumU22X4);
// echo "<br>";

# <--------------------U12X3------------------------------------>
$i = 0;
$U12X3 = array();
echo "<br>Ui2X3<br>";
while ($i < $jml_row) {
	# code...
	$U12X3[] = array(
		'1' => $Ui2[$i]['Ui32']*$nutrisi[$i]['Energi'],
		'2' => $Ui2[$i]['Ui32']*$nutrisi[$i]['Protein'],
		'3' => $Ui2[$i]['Ui32']*$nutrisi[$i]['Lemak'],
		'4' => $Ui2[$i]['Ui32']*$nutrisi[$i]['Serat']
		);
	$i++;
}
$i = 0;
while ($i < $jml_row) {
	# code...
	// print_r($U12X3[$i]['1']);
	// echo("&nbsp &nbsp &nbsp &nbsp &nbsp");
	// print_r($U12X3[$i]['2']);
	// echo("&nbsp &nbsp &nbsp &nbsp &nbsp");
	// print_r($U12X3[$i]['3']);
	// echo("&nbsp &nbsp &nbsp &nbsp &nbsp");
	// print_r($U12X3[$i]['4']);
	// echo("<br>");
	$i++;
}
$i = 1;
$SumU32X1 = $U12X3[0]['1'];
$SumU32X2 = $U12X3[0]['2'];
$SumU32X3 = $U12X3[0]['3'];
$SumU32X4 = $U12X3[0]['4'];
while ($i < $jml_row) {
	# code...
	$SumU32X1 =  $SumU32X1 + $U12X3[$i]['1'];
	$SumU32X2 =  $SumU32X2 + $U12X3[$i]['2'];
	$SumU32X3 =  $SumU32X3 + $U12X3[$i]['3'];
	$SumU32X4 =  $SumU32X4 + $U12X3[$i]['4'];

	$i++;
}
// print_r($SumU32X1);
// echo("&nbsp &nbsp &nbsp");
// print_r($SumU32X2);
// echo("&nbsp &nbsp &nbsp");
// print_r($SumU32X3);
// echo("&nbsp &nbsp &nbsp");
// print_r($SumU32X4);
// echo "<br>";

# <--------------------Vkj------------------------------------>
echo "<br>Vkj<br>";
$Vkj1 = array($SumU12X1/$SumUi12, $SumU12X2/$SumUi12, $SumU12X3/$SumUi12, $SumU12X4/$SumUi12, 4);
$Vkj2 = array($SumU22X1/$SumUi22, $SumU22X2/$SumUi22, $SumU22X3/$SumUi22, $SumU22X4/$SumUi22, 4);
$Vkj3 = array($SumU32X1/$SumUi32, $SumU32X2/$SumUi32, $SumU32X3/$SumUi32, $SumU32X4/$SumUi32, 4);
$i = 0;
while ($i < 4) {
	# code...
	print_r($Vkj1[$i]);
	echo("&nbsp &nbsp &nbsp");
	$i++;
}
echo "<br>";
$i = 0;
while ($i < 4) {
	# code...
	print_r($Vkj2[$i]);
	echo("&nbsp &nbsp &nbsp");
	$i++;
}
echo "<br>";
$i = 0;
while ($i < 4) {
	# code...
	print_r($Vkj3[$i]);
	echo("&nbsp &nbsp &nbsp");
	$i++;
}

# <--------------------LANGKAH 3------------------------------------>

# <--------------------LANGKAH 4------------------------------------>
# <--------------------Cluster------------------------------------>
echo "<br><br>Cluster<br>";
$i = 0;
$cluster = array();
while ($i < $jml_row) {
	# code...
	$cluster[] = array(
		'C1' => (pow(($nutrisi[$i]['Energi']-$Vkj1[0]), 2) + pow(($nutrisi[$i]['Protein']-$Vkj1[1]), 2) + pow(($nutrisi[$i]['Lemak']-$Vkj1[2]), 2) + pow(($nutrisi[$i]['Serat']-$Vkj1[3]), 2))*$Ui2[$i]['Ui12'],
		'C2' => (pow(($nutrisi[$i]['Energi']-$Vkj2[0]), 2) + pow(($nutrisi[$i]['Protein']-$Vkj2[1]), 2) + pow(($nutrisi[$i]['Lemak']-$Vkj2[2]), 2) + pow(($nutrisi[$i]['Serat']-$Vkj2[3]), 2))*$Ui2[$i]['Ui22'],
		'C3' => (pow(($nutrisi[$i]['Energi']-$Vkj3[0]), 2) + pow(($nutrisi[$i]['Protein']-$Vkj3[1]), 2) + pow(($nutrisi[$i]['Lemak']-$Vkj3[2]), 2) + pow(($nutrisi[$i]['Serat']-$Vkj3[3]), 2))*$Ui2[$i]['Ui32']
		);
	$i++;
}
$i = 0;
// while ($i < $jml_row) {
// 			# code...
// 	print_r($cluster[$i]['C1']);
// 	echo("&nbsp &nbsp &nbsp");
// 	print_r($cluster[$i]['C2']);
// 	echo("&nbsp &nbsp &nbsp");
// 	print_r($cluster[$i]['C3']);
// 	echo("<br>");
// 	$i++;
// 		}

# <--------------------Fungsi Objectif------------------------------------>
$i = 0;
$cs = array();
while ( $i < $jml_row) {
	# code...
	$cs[] = array(
		'1' => $cluster[$i]['C1'] + $cluster[$i]['C2'] + $cluster[$i]['C3']
		);
	$i++;
}
$i=0;
// echo "<br>SUM Cluster";
// echo("<br>");
while ($i < $jml_row) {
			# code...
	// print_r($cs[$i]['1']);
	// echo("<br>");
	$i++;
}
echo "<br><br>Fungsi Objectif<br>";
$FungsiObj = $cs[0]['1'];
$i = 1;
while ($i < $jml_row) {
			# code...

	$FungsiObj = $FungsiObj + $cs[$i]['1'];
	$i++;
		}
print_r($FungsiObj);

# <--------------------LANGKAH 5------------------------------------>
// # <--------------------LVK1------------------------------------>
// echo "<br><br>L1-L2-L3-L4<br>";
// $i = 0;
// $LVk11 = array();
// while ($i < $jml_row) {
// 	# code...
// 	$LVk11[] = array(
// 		'L1' => round(pow(($nutrisi[$i]['Energi']-$Vkj1[0]), 2), 4),
// 		'L2' => round(pow(($nutrisi[$i]['Protein']-$Vkj1[1]), 2), 4),
// 		'L3' => round(pow(($nutrisi[$i]['Lemak']-$Vkj1[2]), 2), 4),
// 		'L4' => round(pow(($nutrisi[$i]['Serat']-$Vkj1[3]), 2), 4)
// 		);
// 	$i++;
// }
// $i = 0;
// while ($i < $jml_row) {
// 			# code...
// 	// print_r($LVk11[$i]['L1']);
// 	// echo("&nbsp &nbsp &nbsp");
// 	// print_r($LVk11[$i]['L2']);
// 	// echo("&nbsp &nbsp &nbsp");
// 	// print_r($LVk11[$i]['L3']);
// 	// echo("&nbsp &nbsp &nbsp");
// 	// print_r($LVk11[$i]['L4']);
// 	// echo("<br>");
// 	$i++;
// 		}

// # <--------------------LVK2------------------------------------>
// echo "<br><br>L5-L6-L7-L8<br>";
// $i = 0;
// $LVk21 = array();
// while ($i < $jml_row) {
// 	# code...
// 	$LVk21[] = array(
// 		'L5' => round(pow(($nutrisi[$i]['Energi']-$Vkj2[0]), 2), 4),
// 		'L6' => round(pow(($nutrisi[$i]['Protein']-$Vkj2[1]), 2), 4),
// 		'L7' => round(pow(($nutrisi[$i]['Lemak']-$Vkj2[2]), 2), 4),
// 		'L8' => round(pow(($nutrisi[$i]['Serat']-$Vkj2[3]), 2), 4)
// 		);
// 	$i++;
// }
// $i = 0;
// while ($i < $jml_row) {
// 			# code...
// 	// print_r($LVk21[$i]['L5']);
// 	// echo("&nbsp &nbsp &nbsp");
// 	// print_r($LVk21[$i]['L6']);
// 	// echo("&nbsp &nbsp &nbsp");
// 	// print_r($LVk21[$i]['L7']);
// 	// echo("&nbsp &nbsp &nbsp");
// 	// print_r($LVk21[$i]['L8']);
// 	// echo("<br>");
// 	$i++;
// 		}

// # <--------------------LVK3------------------------------------>
// echo "<br><br>L9-L10-L11-L12<br>";
// $i = 0;
// $LVk31 = array();
// while ($i < $jml_row) {
// 	# code...
// 	$LVk31[] = array(
// 		'L9' => round(pow(($nutrisi[$i]['Energi']-$Vkj3[0]), 2), 4),
// 		'L10' => round(pow(($nutrisi[$i]['Protein']-$Vkj3[1]), 2), 4),
// 		'L11' => round(pow(($nutrisi[$i]['Lemak']-$Vkj3[2]), 2), 4),
// 		'L12' => round(pow(($nutrisi[$i]['Serat']-$Vkj3[3]), 2), 4)
// 		);
// 	$i++;
// }
// $i = 0;
// while ($i < $jml_row) {
// 			# code...
// 	// print_r($LVk31[$i]['L9']);
// 	// echo("&nbsp &nbsp &nbsp");
// 	// print_r($LVk31[$i]['L10']);
// 	// echo("&nbsp &nbsp &nbsp");
// 	// print_r($LVk31[$i]['L11']);
// 	// echo("&nbsp &nbsp &nbsp");
// 	// print_r($LVk31[$i]['L12']);
// 	// echo("<br>");
// 	$i++;
// 		}
# <--------------------LT------------------------------------>
echo "<br><br>X_V<br>";
$i= 0;
$X_V = array();
while ($i < $jml_row) {
	# code...
	$X_V[] = array(
		'C1' => pow(($nutrisi[$i]['Energi']-$Vkj1[0]), 2) + pow(($nutrisi[$i]['Protein']-$Vkj1[1]), 2) + pow(($nutrisi[$i]['Lemak']-$Vkj1[2]), 2) + pow(($nutrisi[$i]['Serat']-$Vkj1[3]), 2),
		'C2' => (pow(($nutrisi[$i]['Energi']-$Vkj2[0]), 2) + pow(($nutrisi[$i]['Protein']-$Vkj2[1]), 2) + pow(($nutrisi[$i]['Lemak']-$Vkj2[2]), 2) + pow(($nutrisi[$i]['Serat']-$Vkj2[3]), 2)),
		'C3' => (pow(($nutrisi[$i]['Energi']-$Vkj3[0]), 2) + pow(($nutrisi[$i]['Protein']-$Vkj3[1]), 2) + pow(($nutrisi[$i]['Lemak']-$Vkj3[2]), 2) + pow(($nutrisi[$i]['Serat']-$Vkj3[3]), 2))
			);
		$i++;
	}
// $i = 0;
// while ($i < $jml_row) {
// 	# code...
// 	print_r($X_V[$i]['C1']);
// 	echo("&nbsp &nbsp &nbsp");
// 	print_r($X_V[$i]['C2']);
// 	echo("&nbsp &nbsp &nbsp");
// 	print_r($X_V[$i]['C3']);
// 	echo("<br>");
// 	$i++;
// }
// echo "<br><br>LT<br>";
$i = 0;
$LT = array();
while ($i < $jml_row) {
	# code...
	$LT[] = array(
		'1' => pow($X_V[$i]['C1'], -1),
		'2' => pow($X_V[$i]['C2'], -1),
		'3' => pow($X_V[$i]['C3'], -1)
		// '1' => $X_V[$i]['C1'],
		// '2' => $X_V[$i]['C2'],
		// '3' => $X_V[$i]['C3']
		);
		// print_r($LT[$i]['1']);
		// echo("&nbsp &nbsp &nbsp");
		// print_r($LT[$i]['2']);
		// echo("&nbsp &nbsp &nbsp");
		// print_r($LT[$i]['3']);
		// echo("<br>");
		$i++;
}
$i = 1;
$i = 0;
$Tot = array();
// echo "<br> Ltot = ";
while ($i < $jml_row) {
	# code...
	$Tot[] = array(
		'1' => $LT[$i]['1'] + $LT[$i]['2'] + $LT[$i]['3']
	);
	// print_r($Tot[$i]['1']);
	// echo("<br>");
	$i++;
}
// # <--------------------Perulangan Iterasi------------------------------------>
// $it = 2;
// $p12 = $FungsiObj - P0;
// $p1 = $p12;
// while ($p1 > EPLSION) {
// 	# code...
// 	if ($it > MaxIter-1) {
// 		# code...
// 		echo "$it";
// 		$p1 = 0.00000001;
// 	}else{
// 	echo "<br>Iterasi ke-$it<br>";
		# <--------------------Ui------------------------------------>
		echo "<br><br>UI<br>";
		$i= 0;
		$min = 99999999999999999;
		$max = -999999999999999.9;
		$uii = array();
		while ($i < $jml_row) {
			# code...
			$uii[] = array(
				'1' => $LT[$i]['1'] / $Tot[$i]['1'],
				'2' => $LT[$i]['2'] / $Tot[$i]['1'],
				'3' => $LT[$i]['3'] / $Tot[$i]['1']
				);
				if ($uii[$i]['1'] > $max) {
					# code...
					$max = $uii[$i]['1'];
				}
				if ($uii[$i]['2'] > $max) {
					# code...
					$max = $uii[$i]['2'];
				}
				if ($uii[$i]['3'] > $max) {
					# code...
					$max = $uii[$i]['3'];
				}
				if ($uii[$i]['1'] < $min) {
					# code...
					$min = $uii[$i]['1'];
				}
				if ($uii[$i]['2'] < $min) {
					# code...
					$min = $uii[$i]['2'];
				}
				if ($uii[$i]['3'] < $min) {
					# code...
					$min = $uii[$i]['3'];
				}
			$i++;
		}
// 		// echo "<br>Nilai max = ";
// 		// print_r($max);
// 		// echo "<br>NIlai min = ";
// 		// print_r($min);
// 		// echo "<br>";
		// $i = 0;
		// $ui = array();
		// while ($i < $jml_row) {
		// 	# code...
		// 	$ui[] = array(
		// 		'1' => $uii[$i]['1'],
		// 		'2' => $uii[$i]['2'],
		// 		'3' => $uii[$i]['3']
		// 		);
		// 	$i++;

		// }
// 		while ($i < $jml_row) {
// 			# code...
// 			$ui[] = array(
// 				'1' => ((($uii[$i]['1']-$min)/($max-$uii[$i]['1']))*(0.99-0.01))+0.01,
// 				'2' => ((($uii[$i]['2']-$min)/($max-$uii[$i]['2']))*(0.99-0.01))+0.01,
// 				'3' => ((($uii[$i]['3']-$min)/($max-$uii[$i]['3']))*(0.99-0.01))+0.01
// 				);
// 			$i++;

// 		}
		$i = 0;
		while ($i < $jml_row) {
					# code...
			print_r($uii[$i]['1']);
			echo("&nbsp &nbsp &nbsp");
			print_r($uii[$i]['2']);
			echo("&nbsp &nbsp &nbsp");
			print_r($uii[$i]['3']);
			echo("<br>");
			$i++;
				}

// 			# <--------------------Ui2------------------------------------>
// 		$i = 0;

// 		$Ui2 = array();
// 		echo "<br>UI2<Br>";
// 		while ($i < $jml_row) {
// 			# code...
// 			$Ui2[] = array(
// 				'Ui12' => pow($ui[$i]['1'], 2),
// 				'Ui22' => pow($ui[$i]['2'], 2),
// 				'Ui32' => pow($ui[$i]['3'], 2)
// 				);
// 			$i++;
// 		}

// 		# <--------------------Update Ui2------------------------------------>
// 		$sql = "update ui SET ui1 = ".$Ui2[0]['Ui12'].", ui2 = ".$Ui2[0]['Ui22'].", ui3 = ".$Ui2[0]['Ui32']." WHERE id_ui = 1 ";
// 		$result = mysql_query($sql) or die();

// 		$i = 0;
// 		while ($i < $jml_row) {
// 			# code...
// 			// print_r($Ui2[$i]['Ui12']);
// 			// echo("&nbsp &nbsp &nbsp");
// 			// print_r($Ui2[$i]['Ui22']);
// 			// echo("&nbsp &nbsp &nbsp");
// 			// print_r($Ui2[$i]['Ui32']);
// 			// echo("<br>");
// 			$i++;
// 		}

// 		$i = 1;
// 		$SumUi12 = $Ui2[0]['Ui12'];
// 		$SumUi22 = $Ui2[0]['Ui22'];
// 		$SumUi32 = $Ui2[0]['Ui32'];
// 		while ($i < $jml_row) {
// 			# code...
// 			$SumUi12 =  $SumUi12 + $Ui2[$i]['Ui12'];
// 			$SumUi22 =  $SumUi22 + $Ui2[$i]['Ui22'];
// 			$SumUi32 =  $SumUi32 + $Ui2[$i]['Ui32'];
// 			$i++;
// 		}

// 		# <--------------------U12X1------------------------------------>
// 		$i = 0;
// 		$U12X1 = array();
// 		echo "<br>Ui2X1<br>";
// 		while ($i < $jml_row) {
// 			# code...
// 			$U12X1[] = array(
// 				'1' => $Ui2[$i]['Ui12']*$nutrisi[$i]['Energi'],
// 				'2' => $Ui2[$i]['Ui12']*$nutrisi[$i]['Protein'],
// 				'3' => $Ui2[$i]['Ui12']*$nutrisi[$i]['Lemak'],
// 				'4' => $Ui2[$i]['Ui12']*$nutrisi[$i]['Serat']
// 				);
// 			$i++;
// 		}
// 		$i = 0;
// 		while ($i < $jml_row) {
// 			# code...
// 			// print_r($U12X1[$i]['1']);
// 			// echo("&nbsp &nbsp &nbsp");
// 			// print_r($U12X1[$i]['2']);
// 			// echo("&nbsp &nbsp &nbsp");
// 			// print_r($U12X1[$i]['3']);
// 			// echo("&nbsp &nbsp &nbsp");
// 			// print_r($U12X1[$i]['4']);
// 			// echo("<br>");
// 			$i++;
// 		}
// 		$i = 1;
// 		$SumU12X1 = $U12X1[0]['1'];
// 		$SumU12X2 = $U12X1[0]['2'];
// 		$SumU12X3 = $U12X1[0]['3'];
// 		$SumU12X4 = $U12X1[0]['4'];
// 		while ($i < $jml_row) {
// 			# code...
// 			$SumU12X1 =  $SumU12X1 + $U12X1[$i]['1'];
// 			$SumU12X2 =  $SumU12X2 + $U12X1[$i]['2'];
// 			$SumU12X3 =  $SumU12X3 + $U12X1[$i]['3'];
// 			$SumU12X4 =  $SumU12X4 + $U12X1[$i]['4'];

// 			$i++;
// 		}
// 		// print_r($SumU12X1);
// 		// echo("&nbsp &nbsp &nbsp");
// 		// print_r($SumU12X2);
// 		// echo("&nbsp &nbsp &nbsp");
// 		// print_r($SumU12X3);
// 		// echo("&nbsp &nbsp &nbsp");
// 		// print_r($SumU12X4);
// 		echo "<br>";

// 		# <--------------------U12X2------------------------------------>
// 		$i = 0;
// 		$U12X2 = array();
// 		echo "<br>Ui2X2<br>";
// 		while ($i < $jml_row) {
// 			# code...
// 			$U12X2[] = array(
// 				'1' => $Ui2[$i]['Ui22']*$nutrisi[$i]['Energi'],
// 				'2' => $Ui2[$i]['Ui22']*$nutrisi[$i]['Protein'],
// 				'3' => $Ui2[$i]['Ui22']*$nutrisi[$i]['Lemak'],
// 				'4' => $Ui2[$i]['Ui22']*$nutrisi[$i]['Serat']
// 				);
// 			$i++;
// 		}
// 		$i = 0;
// 		while ($i < $jml_row) {
// 			# code...
// 			// print_r($U12X2[$i]['1']);
// 			// echo("&nbsp &nbsp &nbsp");
// 			// print_r($U12X2[$i]['2']);
// 			// echo("&nbsp &nbsp &nbsp");
// 			// print_r($U12X2[$i]['3']);
// 			// echo("&nbsp &nbsp &nbsp");
// 			// print_r($U12X2[$i]['4']);
// 			// echo("<br>");
// 			$i++;
// 		}
// 		$i = 1;
// 		$SumU22X1 = $U12X2[0]['1'];
// 		$SumU22X2 = $U12X2[0]['2'];
// 		$SumU22X3 = $U12X2[0]['3'];
// 		$SumU22X4 = $U12X2[0]['4'];
// 		while ($i < $jml_row) {
// 			# code...
// 			$SumU22X1 =  $SumU22X1 + $U12X2[$i]['1'];
// 			$SumU22X2 =  $SumU22X2 + $U12X2[$i]['2'];
// 			$SumU22X3 =  $SumU22X3 + $U12X2[$i]['3'];
// 			$SumU22X4 =  $SumU22X4 + $U12X2[$i]['4'];

// 			$i++;
// 		}

// 		# <--------------------U12X3------------------------------------>
// 		$i = 0;
// 		$U12X3 = array();
// 		echo "<br>Ui2X3<br>";
// 		while ($i < $jml_row) {
// 			# code...
// 			$U12X3[] = array(
// 				'1' => $Ui2[$i]['Ui32']*$nutrisi[$i]['Energi'],
// 				'2' => $Ui2[$i]['Ui32']*$nutrisi[$i]['Protein'],
// 				'3' => $Ui2[$i]['Ui32']*$nutrisi[$i]['Lemak'],
// 				'4' => $Ui2[$i]['Ui32']*$nutrisi[$i]['Serat']
// 				);
// 			$i++;
// 		}
// 		$i = 0;
// 		while ($i < $jml_row) {
// 			# code...
// 			// print_r($U12X3[$i]['1']);
// 			// echo("&nbsp &nbsp &nbsp");
// 			// print_r($U12X3[$i]['2']);
// 			// echo("&nbsp &nbsp &nbsp");
// 			// print_r($U12X3[$i]['3']);
// 			// echo("&nbsp &nbsp &nbsp");
// 			// print_r($U12X3[$i]['4']);
// 			// echo("<br>");
// 			$i++;
// 		}
// 		$i = 1;
// 		$SumU32X1 = $U12X3[0]['1'];
// 		$SumU32X2 = $U12X3[0]['2'];
// 		$SumU32X3 = $U12X3[0]['3'];
// 		$SumU32X4 = $U12X3[0]['4'];
// 		while ($i < $jml_row) {
// 			# code...
// 			$SumU32X1 =  $SumU32X1 + $U12X3[$i]['1'];
// 			$SumU32X2 =  $SumU32X2 + $U12X3[$i]['2'];
// 			$SumU32X3 =  $SumU32X3 + $U12X3[$i]['3'];
// 			$SumU32X4 =  $SumU32X4 + $U12X3[$i]['4'];

// 			$i++;
// 		}

// 		# <--------------------Vkj------------------------------------>
// 		echo "<br>Vkj<br>";
// 		$Vkj1 = array($SumU12X1/$SumUi12, $SumU12X2/$SumUi12, $SumU12X3/$SumUi12, $SumU12X4/$SumUi12, 4);
// 		$Vkj2 = array($SumU22X1/$SumUi22, $SumU22X2/$SumUi22, $SumU22X3/$SumUi22, $SumU22X4/$SumUi22, 4);
// 		$Vkj3 = array($SumU32X1/$SumUi32, $SumU32X2/$SumUi32, $SumU32X3/$SumUi32, $SumU32X4/$SumUi32, 4);
		
// 		$i = 0;
// 		while ($i < 4) {
// 			# code...
// 			print_r($Vkj1[$i]);
// 			echo("&nbsp &nbsp &nbsp");
// 			$i++;
// 		}
// 		echo "<br>";
// 		$i = 0;
// 		while ($i < 4) {
// 			# code...
// 			print_r($Vkj2[$i]);
// 			echo("&nbsp &nbsp &nbsp");
// 			$i++;
// 		}
// 		echo "<br>";
// 		$i = 0;
// 		while ($i < 4) {
// 			# code...
// 			print_r($Vkj3[$i]);
// 			echo("&nbsp &nbsp &nbsp");
// 			$i++;
// 		}

// 		# <--------------------LANGKAH 3------------------------------------>

// 		# <--------------------LANGKAH 4------------------------------------>
// 		# <--------------------Cluster------------------------------------>
// 		echo "<br><br>Cluster<br>";
// 		$i = 0;
// 		$cluster = array();
// 		while ($i < $jml_row) {
// 			# code...
// 			$cluster[] = array(
// 				'C1' => (pow(($nutrisi[$i]['Energi']-$Vkj1[0]), 2) + pow(($nutrisi[$i]['Protein']-$Vkj1[1]), 2) + pow(($nutrisi[$i]['Lemak']-$Vkj1[2]), 2) + pow(($nutrisi[$i]['Serat']-$Vkj1[3]), 2))*$Ui2[$i]['Ui12'],
// 				'C2' => (pow(($nutrisi[$i]['Energi']-$Vkj2[0]), 2) + pow(($nutrisi[$i]['Protein']-$Vkj2[1]), 2) + pow(($nutrisi[$i]['Lemak']-$Vkj2[2]), 2) + pow(($nutrisi[$i]['Serat']-$Vkj2[3]), 2))*$Ui2[$i]['Ui22'],
// 				'C3' => (pow(($nutrisi[$i]['Energi']-$Vkj3[0]), 2) + pow(($nutrisi[$i]['Protein']-$Vkj3[1]), 2) + pow(($nutrisi[$i]['Lemak']-$Vkj3[2]), 2) + pow(($nutrisi[$i]['Serat']-$Vkj3[3]), 2))*$Ui2[$i]['Ui32']
// 				);
// 			$i++;
// 		}
// 		$i = 0;
// 		while ($i < $jml_row) {
// 					# code...
// 			// print_r($cluster[$i]['C1']);
// 			// echo("&nbsp &nbsp &nbsp");
// 			// print_r($cluster[$i]['C2']);
// 			// echo("&nbsp &nbsp &nbsp");
// 			// print_r($cluster[$i]['C3']);
// 			// echo("<br>");
// 			$i++;
// 				}

// 		# <--------------------Fungsi Objectif------------------------------------>
// 		echo "<br><br>Fungsi Objectif<br>";
// 		$i = 0;
// 		$cs = array();
// 		while ( $i < $jml_row) {
// 			# code...
// 			$cs[] = array(
// 				'1' => $cluster[$i]['C1'] + $cluster[$i]['C2'] + $cluster[$i]['C3']
// 				);
// 			$i++;
// 		}
// 		$FungsiObj = $cs[0]['1'];
// 		$i = 1;
// 		while ($i < $jml_row) {
// 					# code...
// 			$FungsiObj = $FungsiObj + $cs[$i]['1'];
// 			$i++;
// 				}
// 		print_r($FungsiObj);

// 		# <--------------------LANGKAH 5------------------------------------>
// 		// # <--------------------LVK1------------------------------------>
// 		// echo "<br><br>L1-L2-L3-L4<br>";
// 		// $i = 0;
// 		// $LVk11 = array();
// 		// while ($i < $jml_row) {
// 		// 	# code...
// 		// 	$LVk11[] = array(
// 		// 		'L1' => round(pow(($nutrisi[$i]['Energi']-$Vkj1[0]), 2), 3),
// 		// 		'L2' => round(pow(($nutrisi[$i]['Protein']-$Vkj1[1]), 2), 3),
// 		// 		'L3' => round(pow(($nutrisi[$i]['Lemak']-$Vkj1[2]), 2), 3),
// 		// 		'L4' => round(pow(($nutrisi[$i]['Serat']-$Vkj1[3]), 2), 3)
// 		// 		);
// 		// 	$i++;
// 		// }

// 		// # <--------------------LVK2------------------------------------>
// 		// echo "<br><br>L5-L6-L7-L8<br>";
// 		// $i = 0;
// 		// $LVk21 = array();
// 		// while ($i < $jml_row) {
// 		// 	# code...
// 		// 	$LVk21[] = array(
// 		// 		'L5' => round(pow(($nutrisi[$i]['Energi']-$Vkj2[0]), 2), 3),
// 		// 		'L6' => round(pow(($nutrisi[$i]['Protein']-$Vkj2[1]), 2), 3),
// 		// 		'L7' => round(pow(($nutrisi[$i]['Lemak']-$Vkj2[2]), 2), 3),
// 		// 		'L8' => round(pow(($nutrisi[$i]['Serat']-$Vkj2[3]), 2), 3)
// 		// 		);
// 		// 	$i++;
// 		// }

// 		// # <--------------------LVK3------------------------------------>
// 		// echo "<br><br>L9-L10-L11-L12<br>";
// 		// $i = 0;
// 		// $LVk31 = array();
// 		// while ($i < $jml_row) {
// 		// 	# code...
// 		// 	$LVk31[] = array(
// 		// 		'L9' => round(pow(($nutrisi[$i]['Energi']-$Vkj3[0]), 2), 3),
// 		// 		'L10' => round(pow(($nutrisi[$i]['Protein']-$Vkj3[1]), 2), 3),
// 		// 		'L11' => round(pow(($nutrisi[$i]['Lemak']-$Vkj3[2]), 2), 3),
// 		// 		'L12' => round(pow(($nutrisi[$i]['Serat']-$Vkj3[3]), 2), 3)
// 		// 		);
// 		// 	$i++;
// 		// }

// 		# <--------------------LT------------------------------------>
// 		echo "<br><br>X_V<br>";
// 		$i= 0;
// 		$X_V = array();
// 		while ($i < $jml_row) {
// 			# code...
// 			$X_V[] = array(
// 				'C1' => pow(($nutrisi[$i]['Energi']-$Vkj1[0]), 2) + pow(($nutrisi[$i]['Protein']-$Vkj1[1]), 2) + pow(($nutrisi[$i]['Lemak']-$Vkj1[2]), 2) + pow(($nutrisi[$i]['Serat']-$Vkj1[3]), 2),
// 				'C2' => pow(($nutrisi[$i]['Energi']-$Vkj2[0]), 2) + pow(($nutrisi[$i]['Protein']-$Vkj2[1]), 2) + pow(($nutrisi[$i]['Lemak']-$Vkj2[2]), 2) + pow(($nutrisi[$i]['Serat']-$Vkj2[3]), 2),
// 				'C3' => pow(($nutrisi[$i]['Energi']-$Vkj3[0]), 2) + pow(($nutrisi[$i]['Protein']-$Vkj3[1]), 2) + pow(($nutrisi[$i]['Lemak']-$Vkj3[2]), 2) + pow(($nutrisi[$i]['Serat']-$Vkj3[3]), 2)
// 					);
// 				// print_r($X_V[$i]['C1']);
// 				// echo("&nbsp &nbsp &nbsp");
// 				// print_r($X_V[$i]['C2']);
// 				// echo("&nbsp &nbsp &nbsp");
// 				// print_r($X_V[$i]['C3']);
// 				// echo("<br>");
// 				$i++;
// 			}
// 		echo "<br><br>LT<br>";
// 		$i = 0;
// 		$LT = array();
// 		while ($i < $jml_row) {
// 			# code...
// 			if ($X_V[$i]['C1'] == 0) {
// 				# code...
// 				$X_V[$i]['C1'] = 0.00000000000000000001;
// 			}
// 			if ($X_V[$i]['C2'] == 0) {
// 				# code...
// 				$X_V[$i]['C2'] = 0.00000000000000000001;
// 			}
// 			if ($X_V[$i]['C3'] == 0) {
// 				# code...
// 				$X_V[$i]['C3'] = 0.00000000000000000001;
// 			}
// 			$LT[] = array(
// 				'1' => pow($X_V[$i]['C1'], -1),
// 				'2' => pow($X_V[$i]['C2'], -1),
// 				'3' => pow($X_V[$i]['C3'], -1)
// 				);
// 				// print_r($LT[$i]['1']);
// 				// echo("&nbsp &nbsp &nbsp");
// 				// print_r($LT[$i]['2']);
// 				// echo("&nbsp &nbsp &nbsp");
// 				// print_r($LT[$i]['3']);
// 				// echo("<br>");
// 				$i++;
// 		}
// 		$i = 1;
// 		$i = 0;
// 		$Tot = array();
// 		echo "<br> Ltot = ";
// 		while ($i < $jml_row) {
// 			# code...
// 			$Tot[] = array(
// 				'1' => $LT[$i]['1'] + $LT[$i]['2'] + $LT[$i]['3']
// 			);
// 			// print_r($Tot[$i]['1']);
// 			// echo("<br>");
// 			$i++;
// 		}

// 		# <--------------------Perulangan Iterasi------------------------------------>
// 		// echo "<br>Fungsi Objectif<br>";
// 		// print_r($FungsiObj);
// 		echo "<br>";
// 		$p12 = $p1;
// 		$p1 = abs($FungsiObj - $p12);
// 		$it++;
// 	}

// }
// echo "<br><br>UI<br>";
// $i = 0;
// while ($i < $jml_row) {
// 			# code...
// 	// print_r($ui[$i]['1']);
// 	// echo("&nbsp &nbsp &nbsp");
// 	// print_r($ui[$i]['2']);
// 	// echo("&nbsp &nbsp &nbsp");
// 	// print_r($ui[$i]['3']);
// 	// echo("<br>");
// 	$i++;
// }

// # <--------------------Update Database------------------------------------>
// $i = 0;
// $k = 1;
// while ($i < $jml_row) {
// 			# code...
// 			$a = $ui[$i]['1'];
// 			$c = "C1";
// 			if ($a < $ui[$i]['2']) {
// 				# code...
// 				$a = $ui[$i]['2'];
// 				$c = "C2";
// 			}
// 			if ($a < $ui[$i]['3']) {
// 				# code...
// 				$a = $ui[$i]['3'];
// 				$c = "C3";
// 			}
// 			$sqlt = "update nutrisi SET Cluster ='$c'
// WHERE id_nutrisi='$k'";
// 			$rslt = mysql_query($sqlt) or die();
// 			echo "$k $c<br>";
// 			$k++;
// 			$i++;
// 		}
// # <--------------------Update vkj------------------------------------>
// 		$sql1 = "update vkj SET kalori = '$Vkj1[0]', protein = '$Vkj1[1]', lemak = '$Vkj1[2]', serat = '$Vkj1[3]' WHERE id_vkj = 1";
// 		$sql2 = "update vkj SET kalori = '$Vkj2[0]', protein = '$Vkj2[1]', lemak = '$Vkj2[2]', serat = '$Vkj2[3]' WHERE id_vkj = 2";
// 		$sql3 = "update vkj SET kalori = '$Vkj3[0]', protein = '$Vkj3[1]', lemak = '$Vkj3[2]', serat = '$Vkj3[3]' WHERE id_vkj = 3";
// 		$rslt1 = mysql_query($sql1) or die();
// 		$rslt2 = mysql_query($sql2) or die();
// 		$rslt3 = mysql_query($sql3) or die();		
?>