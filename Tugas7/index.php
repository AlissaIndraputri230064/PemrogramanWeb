<?php
include "koneksi.php";

session_start();

// Cek apakah pengguna sudah login
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Query untuk mengambil data dari tabel city
$cityQuery = "SELECT ID, Name, Countrycode, District, Population FROM city";
$cityResult = $conn->query($cityQuery);

// Query untuk mengambil data dari tabel country
$countryQuery = "SELECT code, Name FROM country";
$countryResult = $conn->query($countryQuery);

// Query untuk mengambil data dari tabel countrylanguage
$languageQuery = "SELECT countrycode, language FROM countrylanguage";
$languageResult = $conn->query($languageQuery);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="world.css">
    <title>World</title>
</head>
<body>
<header>
        <h1>Selamat Datang di Website Dunia</h1>
    </header>

    <div class="container">
        <h2>Data Kota (City)</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Kode Negara</th>
                <th>Distrik</th>
                <th>Populasi</th>
            </tr>
            <?php
            if ($cityResult->num_rows > 0) {
                while($row = $cityResult->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['ID']}</td>
                            <td>{$row['Name']}</td>
                            <td>{$row['Countrycode']}</td>
                            <td>{$row['District']}</td>
                            <td>{$row['Population']}</td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='5'>Tidak ada data kota.</td></tr>";
            }
            ?>
        </table>

        <h2>Data Negara (Country)</h2>
        <table>
            <tr>
                <th>Kode Negara</th>
                <th>Nama Negara</th>
            </tr>
            <?php
            if ($countryResult->num_rows > 0) {
                while($row = $countryResult->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['code']}</td>
                            <td>{$row['Name']}</td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='2'>Tidak ada data negara.</td></tr>";
            }
            ?>
        </table>

        <h2>Data Bahasa Negara (CountryLanguage)</h2>
        <table>
            <tr>
                <th>Kode Negara</th>
                <th>Bahasa</th>
            </tr>
            <?php
            if ($languageResult->num_rows > 0) {
                while($row = $languageResult->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['countrycode']}</td>
                            <td>{$row['language']}</td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='2'>Tidak ada data bahasa negara.</td></tr>";
            }
            ?>
        </table>

        <button class="btn" onclick="window.location.href='logout.php'">Logout</button>
    </div>
</body>
</html>