<?php
include "mhsKoneksi.php";

if(isset($_POST['update']))
{
 $npm=$_POST['npm'];   
 $nama=$_POST['nama'];
 $alamat=$_POST['alamat'];
 $jk=$_POST['jk'];    
 $tgl = date('Y-m-d',strtotime($_POST['tgl_lhr']));    
 $email=$_POST['email'];    
   $sql = "UPDATE identitas set nama='$nama', alamat='$alamat', jk='$jk', tgl_lhr='$tgl', email='$email' where npm='$npm' ";  
   if ($conn->query($sql) === TRUE) {
       // redirect ke halaman tampil data
       header("Location: tampil_data.php");
   } else {
       echo "Error: " . $sql . "<br>" . $conn->error;
   }
 }
 $conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Data Mahasiswa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="container">
        <h2>Update Data Mahasiswa</h2>
        <form action="mhsUpdate.php" method="POST">
            <label for="npm">Masukkan NPM Mahasiswa:</label>
            <input type="text" id="npm" name="npm" required placeholder="Masukkan NPM">

            <label for="nama">Nama:</label>
            <input type="text" id="nama" name="nama" required placeholder="Masukkan Nama Baru">

            <label for="alamat">Alamat:</label>
            <input type="text" id="alamat" name="alamat" placeholder="Masukkan Alamat Baru">

            <label for="jk">Jenis Kelamin:</label>
            <input type="radio" id="laki" name="jk" value="L" required>
            <label for="laki">Laki-Laki</label>
            <input type="radio" id="perempuan" name="jk" value="P" required>
            <label for="perempuan">Perempuan</label>

            <label for="tgl_lhr">Tanggal Lahir:</label>
            <input type="date" id="tgl_lhr" name="tgl_lhr" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="Masukkan Email Baru">

            <input type="submit" name="update" value="Update Data">
        </form>
    </div>

</body>
</html>
