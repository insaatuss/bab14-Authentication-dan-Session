<?php

require_once("connection.php");

$error = 0;

//memvalidasi inputan
if (isset($_POST['email']) && isset($_POST['password'])) {
	$email = $_POST['email'];
	$password = $_POST['password'];
}else{
	$error = 1;
}
if ($error == 1) {
	echo "Terjadi kesalahan dalam proses input data";
	exit();
}

$password = hash("sha256", $password);

$query = "SELECT * FROM petugas WHERE email = '{$email}'";

//mengeskusi MySQL Query
$result = mysqli_query($mysqli, $query);

$data = mysqli_fetch_assoc($result);

if ( is_null($data)) {
	echo "Email tidak terdaftar. <a href='login.php'>Kembali</a>";
	exit();
}elseif ($data[password] != $password) {
	echo "Password Salah! <a href='login.php'>Kembali</a>";
	exit();
} else {

	session_start();

	$_SESSION['status'] = true;
	$_SESSION['name'] = $data["nama"];
	$_SESSION['email'] = $data["email"];

	header("Location: index.php");
}

?>