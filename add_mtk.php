<html>
<head>
 <title>Add Users</title>
</head>
<body>
 <a href="index.php">Go to Home</a>
 <br/><br/>
 <form action="add_mtk.php" method="post" name="form1">
 <table width="25%" border="0">
 <tr>
 <td>kode_mk</td>
 <td><input type="text" name="kode_mk"></td>
 </tr>
 <tr>
 <td>nama_mk</td>
 <td><input type="text" name="nama_mk"></td>
 </tr>
 <tr>
 <td>sks</td>
 <td><input type="text" name="sks"></td>
 </tr>
 <td></td>
 <td><input type="submit" name="Submit" value="Add"></td>
 </tr>
 </table>
 </form>

 <?php
 // Check If form submitted, insert form data into users table.
 if(isset($_POST['Submit'])) {
 $kode_mk = $_POST['kode_mk'];
 $nama_mk = $_POST['nama_mk'];
 $sks = $_POST['sks'];

 // include database connection file
 include_once("koneksi.php");

 // Insert user data into table
 $result = mysqli_query($conn, "INSERT INTO matakuliah(kode_mk,nama_mk,sks)
VALUES('$kode_mk','$nama_mk','$sks')");

 // Show message when user added
 echo "User added successfully. <a href='matakuliah.php'>back</a>";
 }
 ?>
</body>
</html>