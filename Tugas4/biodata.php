<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $npm = $_GET['npm'];
    $nama = $_GET['nama'];
    $alamat = $_GET['alamat'];
    $tmpt_lahir = $_GET['tmpt-lahir'];
    $tgl_lahir = $_GET['tgl-lahir'];
    $jk = isset($_GET['jk']) ? implode(", ", $_GET['jk']) : "Tidak ada jenis kelamin yang dipilih";
    $hobi = $_GET['hobi'];
}
?>

<html>
    <head>
        <title>Biodata</title>
    </head>
    <style>
        p.uppercase {
            text-transform: uppercase;
        }
    </style>
    <body>
        <h1>Biodata Mahasiswa</h1>
        <p class="uppercase"><?php echo "$npm<br>"; ?></p>
        <p class="uppercase"><?php echo "$nama<br>"; ?></p>
        <p><?php echo "$alamat<br>"; ?></p>
        <p><?php echo "$tmpt_lahir<br>"; ?></p>
        <p><?php echo "$tgl_lahir<br>"; ?></p>
        <p><?php echo "$jk<br>"; ?></p>
        <p><?php echo "$hobi<br>"; ?></p>
    </body>
</html>