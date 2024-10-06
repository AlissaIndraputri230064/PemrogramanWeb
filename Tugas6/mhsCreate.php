<?php
include "mhsKoneksi.php";

if (isset($_POST['submit'])) {
    $table_name = $_POST['table_name'];
    $column_1 = $_POST['column_1'];
    $column_2 = $_POST['column_2'];
    $column_3 = !empty($_POST['column_3']) ? $_POST['column_3'] : null;
    $column_4 = !empty($_POST['column_4']) ? $_POST['column_4'] : null;
    $column_5 = !empty($_POST['column_5']) ? $_POST['column_5'] : null;

    // Construct the SQL query to create the table
    $sql = "CREATE TABLE $table_name (
                $column_1,
                $column_2";
    
    if ($column_3) {
        $sql .= ", $column_3";
    }
    if ($column_4) {
        $sql .= ", $column_4";
    }
    if ($column_5) {
        $sql .= ", $column_5";
    }

    $sql .= ")";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        echo "Tabel $table_name berhasil dibuat.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat Tabel Mahasiswa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="container">
        <h2>Buat Tabel Mahasiswa</h2>
        <form action="mhsCreate.php" method="POST">
            <label for="table_name">Nama Tabel:</label>
            <input type="text" id="table_name" name="table_name" required>

            <label for="column_1">Kolom 1 (Nama Kolom, Tipe Data):</label>
            <input type="text" id="column_1" name="column_1" required placeholder="Contoh: npm VARCHAR(10) PRIMARY KEY">

            <label for="column_2">Kolom 2 (Nama Kolom, Tipe Data):</label>
            <input type="text" id="column_2" name="column_2" required placeholder="Contoh: nama VARCHAR(100)">

            <label for="column_3">Kolom 3 (Nama Kolom, Tipe Data):</label>
            <input type="text" id="column_3" name="column_3" placeholder="Contoh: alamat TEXT">

            <label for="column_4">Kolom 4 (Nama Kolom, Tipe Data):</label>
            <input type="text" id="column_4" name="column_4" placeholder="Contoh: tgl_lhr DATE">

            <label for="column_5">Kolom 5 (Nama Kolom, Tipe Data):</label>
            <input type="text" id="column_5" name="column_5" placeholder="Contoh: email VARCHAR(100)">

            <input type="submit" name="submit" value="Buat Tabel">
        </form>
    </div>

</body>
</html>
