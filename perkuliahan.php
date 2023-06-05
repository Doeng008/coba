<?php
// Create database connection using config file
include_once("koneksi.php");
include_once("index.php");
// Fetch all users data from database
$result = mysqli_query($conn, "SELECT * FROM perkuliahan");
?>
<html>
<head>
 <title>perkuliahan</title>
 <style>
 body{font-family: 'roboto';
 color: #000;
 }
 a{
 padding: 5px;
 text-decoration: none;
 }
 table{
 border-collapse: collapse;
 width: 900;
 }

 th, td{
 padding: 10px 20px ;
 border: 1px solid #ccc;
 }
 </style>
</head>
<body>
<a href="add_per.php">Add New User</a><br/><br/>
 <table>
 <tr>
 <th>nim</th> <th>kode_mk</th> <th>nip</th><th>nilai</th>
<th>Aksi</th>
 </tr>
 <?php
 while($user_data = mysqli_fetch_array($result)) {
 echo "<tr>";
 echo "<td>".$user_data['nim']."</td>";
 echo "<td>".$user_data['kode_mk']."</td>";
 echo "<td>".$user_data['nip']."</td>";
 echo "<td>".$user_data['nilai']."</td>";
 echo "<td><a href='edit_perkuliahan.php?nim=".$user_data['nim']."'>Edit</a> | <a
href='delete.php?id=".$user_data['nim']."'>Delete</a></td></tr>";
 }
 ?>
 </table>
</body>
</html>