<?php
include "mhsKoneksi.php";
include "mhsCreate.php";
include "mhsInsert.php";
include "mhsDelete.php";
include "mhsUpdate.php";

$sql = "SELECT * FROM identitas";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DAFTAR MAHASISWA</title>
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css"> 
     <script src="vendor/jquery/jquery.min.js"></script>
     <script src="vendor/bootstrap/js/bootstrap.min.js"></script>    
     <script src="vendor/bootstrap/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
     <link href="vendor/bootstrap/css/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css"/>
</head>
<body>
    <h2>Biodata Mahasiswa</h2>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
    <div class="container">
      <a class="navbar-brand" href="#">DATA MAHASISWA</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
  </nav>
<div class="container"> 
  <div class="card mt-5">
   <div class="card-header bg-dark text-white"><h6>DAFTAR MAHASISWA</h6></div>
     <div class="card-body ml-3">   
    <tbody>       
    <table class="mt-3 table table-bordered">
		<thead class="thead-dark">
			<tr>
				<th>No</th>
				<th>NPM</th>
				<th>NAMA</th>
                <th>ALAMAT</th>
                <th>JK</th>
                <th>TGL LAHIR</th>
                <th>EMAIL</th>
                <th>AKSI</th>
			</tr>
		</thead>
		<tbody>
         <?php 
          if ($result->num_rows > 0) {
             // output data of each row
             $no=0;
             while($row = $result->fetch_assoc()) {
             	$no++;
                 $tgl = date('d-m-Y',strtotime($row['tgl_lhr']));
                 ?>
                     <tr>
                        
         				<td><?php echo $no;?></td>
         				<td><?php echo $row["npm"];?></td>
         				<td><?php echo $row["nama"];?></td>
                        <td><?php echo $row["alamat"];?></td>
                        <td><?php echo $row["jk"];?></td> 
                        <td><?php echo $tgl;?></td> 
                        <td><?php echo $row["email"];?></td> 
                        <td><button class="btn-xs btn-success" onClick="document.location.href='<?php echo "edit.php?id=".$row["npm"];?>'">Edit</button>
                             <button class="btn-xs btn-danger" onClick="document.location.href='<?php echo "hapus.php?id=".$row["npm"];?>'">Hapus</button>
                         </td>
         			</tr>
             <?php        
             }
         } else {
             echo "0 results";
         }
         
         $conn->close();
         ?>
             </tbody>
             </table>
              <form action="input_data.php" method="post">
              <input type="submit" class="btn btn-primary" value="Input Data" name="logout">
             </form> 
             </div>      
  
      </div>
    </div>    
</body>
</html>