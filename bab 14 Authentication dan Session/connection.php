<?php

$mysqli = new mysqli("localhost", "root", "", "toko");

// Check Connection
if ($mysqli->connect_errno) {
	echo "Gagal menyambungkan ke MYSQL" . $mysqli->connect_errno;
	exit();
}

?>