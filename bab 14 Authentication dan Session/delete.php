<?php

require_once("session_check.php");

if ($sessionStatus == false) {
	header("Location: index.php");
}

require_once("connection.php");

if (isset($_GET['id_barang'])) {
	$id_barang = $_GET['id_barang'];
}else{
	echo "ID Barang Tidak ditemukan! <a href='index.php'>Kembali</a>";
	exit();
}

$query = "DELETE FROM barang WHERE id_barang = '{$id_barang}'";
$result = mysqli_query($mysqli, $query);

if (!result) {
	exit("Gagal menghapus data!");
}
header("Location: index.php");

?>