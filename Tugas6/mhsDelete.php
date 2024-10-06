<?php
include "mhsKoneksi.php";

$sql = "SELECT npm FROM identitas";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hapus Data Mahasiswa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
        <h2>Hapus Data Mahasiswa</h2>
        <form action="mhsDelete.php" method="POST">
            <label for="npm">Pilih NPM Mahasiswa yang Akan Dihapus:</label>
            <select id="npm" name="npm" required>
                <option value="" disabled selected>Pilih NPM</option>
                <?php
                if ($result->num_rows > 0) {
                    // Output data dari setiap baris
                    while($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row['npm'] . "'>" . $row['npm'] . "</option>";
                    }
                } else {
                    echo "<option value=''>Tidak ada mahasiswa</option>";
                }
                ?>
            </select>
            <input type="submit" value="Hapus Data">
        </form>
    </div>

</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $del = $_POST['npm']; // Mengambil NPM yang dipilih
    
    // Proses delete berdasarkan NPM
    if (!empty($del)) {
        $sql = "DELETE FROM identitas WHERE npm='$del'";
        if ($conn->query($sql) === TRUE) {
            echo "Data berhasil dihapus.";
            // Redirect ke halaman tampil_data.php setelah delete
            header("Location: tampil_data.php");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Pilih NPM terlebih dahulu.";
    }
}

$conn->close();
?>
