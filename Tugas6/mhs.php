<?php
include "mhsKoneksi.php";
include "mhsCreate.php";
include "mhsInsert.php";
include "mhsDelete.php";
include "mhsUpdate.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Mahasiswa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="container">
        <h2>CRUD Mahasiswa</h2>
        <div class="menu">
            <ul>
                <li><a href="mhsCreate.php">Buat Tabel</a></li>
                <li><a href="mhsInsert.php">Tambah Data Mahasiswa</a></li>
                <!--<li><a href="tampil_data.php">Lihat Data Mahasiswa</a></li>-->
                <li><a href="mhsUpdate.php">Update Data Mahasiswa</a></li>
                <li><a href="mhsDelete.php">Hapus Data Mahasiswa</a></li>
            </ul>
        </div>
    </div>

</body>
</html>
