<?php 
session_start();
include ('koneksi.php');

$id = $_POST['id'];

$sql = "delete from nutrisi where id_nutrisi = '$id'";
$result = mysql_query($sql) or die();

echo "<script>window.alert('Data Berhasil dihapus !');
				window.location=('makanan.php')</script>";

 ?>