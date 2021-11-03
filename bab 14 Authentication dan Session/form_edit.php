<?php

require_once("session_check.php");

if ($sessionStatus == false) {
	header("Location: index.php");
}

require_once("connection.php");

$error = 0;

if (isset($_GET['id_barang'])) {
	$id_barang = $_GET['id_barang'];
}else{
	echo "Barang Tidak ditemukan! <a href='index.php'>Kembali</a>";
	exit();
}

$query = "SELECT * FROM barang WHERE id_barang = '{$id_barang}'";
$result = mysqli_query($mysqli, $query);

foreach ($result as $barang) {
	$id_barang = $barang["id_barang"];
	$name = $barang["nama_barang"];
	$harga = $barang["harga"];
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Edit barang</title>

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="container-fluid">
			<!-- Navbar-brand -->
			<a href="#" class="navbar-brand">
				<p>insaatuss.</p>
			</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<!-- Navbar Collapse -->
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav ms-auto mb-2 mb-lg-0">
					<li class="nav-item">
						<a href="index.php" class="nav-link" aria-current="page">Daftar barang</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<div id="form" class="pt-5">

		<div class="container">

			<div class="row d-flex justify-content-center">

				<div class="col col-8 p-4 bg-light">

					<form method="POST" action="action_edit.php">
						<div class="form-group mb-2">
							<label for="id_barang">ID Barang</label>
							<input type="text" id="id_barang" name="id_barang" value="<?=$id_barang?>" class="form-control" readonly>
						</div>

						<div class="form-group mb-2">
							<label for="name">Nama Barang</label>
							<input type="text" id="name" class="form-control" name="name" value="<?=$name?>" placeholder="Masukkan Nama Barang" required>
						</div>
						<div class="form-group mb-2">
							<label for="harga">Harga Barang</label>
							<input type="number" id="harga" name="harga" value="<?=$harga?>" class="form-control" placeholder="Harga Barang Sebelumya: <?=$harga?>" required>
						</div>
						<input type="submit" value="kirim" name="submit" class="btn btn-primary">

					</form>

				</div>

			</div>

		</div>

	</div>
</body>
</html>