<?php        
include "mhsKoneksi.php"; 

//input data
if(isset($_POST['submit']))
{   
 $npm=$_POST['npm'];
 $nama=$_POST['nama'];
 $alamat=$_POST['alamat'];
 if (isset($_POST['jk']))
 {
   $jk=$_POST['jk'];     
  } 
 
 $tgl = date('Y-m-d',strtotime($_POST['tgl_lhr']));    
 $email=$_POST['email'];
 
 if((!empty($npm)) && (!empty($nama)))  
  {     
   $sql = "INSERT INTO identitas (npm, nama, alamat,jk,tgl_lhr,email)
   VALUES ('$npm', '$nama', '$alamat','$jk','$tgl','$email') ";
   if ($conn->query($sql) === TRUE) {
       // redirect ke halaman tampil data
       header("Location: tampil_data.php");
   } else {
       echo "Error: " . $sql . "<br>" . $conn->error;
   }
  }
    else
    {
      echo "npm dan nama tidak boleh kosong";     
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Data Mahasiswa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="container">
        <h2>Form Input Data Mahasiswa</h2>
        <form action="" method="POST">
            <label for="npm">NPM:</label>
            <input type="text" id="npm" name="npm" required>

            <label for="nama">Nama:</label>
            <input type="text" id="nama" name="nama" required>

            <label for="alamat">Alamat:</label>
            <input type="text" id="alamat" name="alamat">

            <label for="jk">Jenis Kelamin:</label>
            <input type="radio" id="laki" name="jk" value="L" required>
            <label for="laki">Laki-Laki</label>
            <input type="radio" id="perempuan" name="jk" value="P" required>
            <label for="perempuan">Perempuan</label>

            <label for="tgl_lhr">Tanggal Lahir:</label>
            <input type="date" id="tgl_lhr" name="tgl_lhr" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email">

            <input type="submit" name="submit" value="Submit">
        </form>
    </div>

</body>
</html>
