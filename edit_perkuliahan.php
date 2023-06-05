<?php
// include database connection file
include_once("koneksi.php");
// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{
 $nim = $_POST['nim'];
 $kode_mk=$_POST['kode_mk'];
 $nip=$_POST['nip'];
 $nilai=$_POST['nilai'];

 // update user data
 $result = mysqli_query($conn, "UPDATE perkuliahan SET
kode_mk='$kode_mk',nilai='$nilai',nip='$nip' WHERE nim='$nim'");

 // Redirect to homepage to display updated user in list
 header("Location: perkuliahan.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$id = $_GET['nim'];
// Fetech user data based on id
$result = mysqli_query($conn, "SELECT * FROM perkuliahan WHERE nim=$id");
while($user_data = mysqli_fetch_array($result))
{
    $nim = $user_data['nim'];
    $kode_mk = $user_data['kode_mk'];
    $nip = $user_data['nip'];
    $nilai = $user_data['nilai'];
   }
   ?>
   <html>
   <head>
    <title>Edit User Data</title>
   </head>
   <body>
    <a href="index.php">Home</a>
    <br/><br/>
   
    <form name="update_perkuliahan" method="post" action="edit_perkuliahan.php">
    <table border="0">
    <tr>
    <td>Nim</td>
    <td>
    <select name="nim">
                        <?php
                            $q = "select * from mahasiswa";
                            $p = mysqli_query($conn, $q);
                            while($data = mysqli_fetch_array($p))
                            {
                    echo "<option value=".$data['nim'].">".$data['nim']." | ".$data['nama_mhs']."</option>";
                            }
                        ?>

                    </select>
    </td>
    </tr>
    <tr>
    <td>Kode matakuliah</td>
    <td>                    <select name="kode_mk">
                        <?php
                            $q = "select * from perkuliahan";
                            $p = mysqli_query($conn, $q);
                            while($data = mysqli_fetch_array($p))
                            {
                    echo "<option value=".$data['kode_mk'].">".$data['kode_mk']."</option>";
                            }
                        ?>

                    </select></td>
    </tr>
    <tr>
    <td>Nip</td>
    <td><select name="nip">
                        <?php
                            $q = "select * from perkuliahan";
                            $p = mysqli_query($conn, $q);
                            while($data = mysqli_fetch_array($p))
                            {
                    echo "<option value=".$data['nip'].">".$data['nip']."</option>";
                            }
                        ?>

                    </select></td>
    </tr>
    <tr>
    <td>Alamat</td>
    <td><input type="text" name="nilai"></td>
    </tr>
    <tr>
    <td></td>
    <td><input type="submit" name="update" value="Update"></td>
    </tr>
    </table>
    </form>
   </body>
   </html>