<?php

require_once("session_check.php");

if ($sessionStatus == false) {
	header("Location: index.php");
}

require_once("session_check.php");

if ($sessionStatus == false) {
	header("Location: index.php");
}

require_once("connection.php");

if (isset($_POST['id_barang'])) {
	$id_barang = $_POST['id_barang'];
}else{
	echo "ID Barang Tidak ditemukan! <a href='index.php'>Kembali</a>";
	exit();
}

$query = "SELECT * FROM barang WHERE id_barang = '{$id_barang}'";
$result = mysqli_query($mysqli, $query);

if (isset($_POST['id_barang'])) $id_barang = $_POST['id_barang'];

if (isset($_POST['name'])) $name = $_POST['name'];

if (isset($_POST['harga'])) $harga = $_POST['harga'];

$query = "UPDATE barang SET 
		nama_barang = '{$name}',
		harga = '{$harga}'
	WHERE id_barang = '{$id_barang}' ";

$insert = mysqli_query($mysqli, $query);

if ($insert == false) {
	echo "Error dalam mengubah data. <a href='index.php'>Kembali</a>";
}else{
	header("Location: index.php");
}


?>