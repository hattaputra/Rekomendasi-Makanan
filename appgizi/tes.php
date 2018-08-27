<?php 
include 'koneksi.php';

$sql = "select * from nutrisi";
$result = mysql_query($sql) or die();
$jml_row = mysql_num_rows($result);

$i = 0;
$k = 1;
$l = 1;
$c = "C2";
while ($i < $jml_row) {
	# code...
	$sql = "select Nama_makanan, Cluster from nutrisi where id_nutrisi = $k";
	$result = mysql_query($sql) or die();
	$rsl = mysql_fetch_row($result);

	if ($rsl[1] == $c) {
	// 	# code...
		echo "$l. ";
		print_r($rsl[0]);
		echo "<br>";
		$l++;
	}
	$k++;
	$i++;
}

?>