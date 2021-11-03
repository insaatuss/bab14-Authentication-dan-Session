<?php

require_once("session_check.php");

if ($sessionStatus == false) {
	header("Location: index.php");
}

require_once("connection.php");

$error = 0;
if (isset($_POST['kode_barang']) && isset($_POST['name']) && isset($_POST['harga'])) {
	$kode_barang = $_POST['kode_barang'];
	$name = $_POST['name'];
	$harga = $_POST['harga'];
}else{
	$error = 1;
}

if ($error == 1) {
	echo "Terjadi kesalahan dalam proses input data";
	exit();
}

$query = "INSERT INTO barang (id_barang, nama_barang, harga)
		VALUES('{$kode_barang}', '{$name}', '{$harga}')";
$insert = mysqli_query($mysqli, $query);

if ($insert == false) {
	echo "Error dalam menambahkan data. <a href='index.php'>Kembali</a>";
}else {
	header("Location: index.php");
}


?>