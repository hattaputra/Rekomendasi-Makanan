<?php 
include 'koneksi.php';
$i = 0;
$k = 66;
while ($i < 34) {
	# code...
	$sql = "update nutrisi SET Jenis = 'Lauk Nabati' WHERE id_nutrisi = $k ";
	$result = mysql_query($sql) or die();
	$k++;
	$i++;
}
 ?>