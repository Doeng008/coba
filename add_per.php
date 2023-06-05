<?php
// include database connection file
    include_once("koneksi.php");
?>
<html>
<head>
    <title>Add Users</title>
</head>
 
<body>
    <a href="index.php">Go to Home</a>
    <br/><br/>
 
    <form action="add_per.php" method="post" name="form1">
        <table width="25%" border="0">
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
                <td>Kode MK</td>
                <td>                    
                    <select name="kode_mk">
                        <?php
                            $q = "select * from matakuliah";
                            $p = mysqli_query($conn, $q);
                            while($data = mysqli_fetch_array($p))
                            {
                    echo "<option value=".$data['kode_mk'].">".$data['kode_mk']." | ".$data['nama_mk']."</option>";
                            }
                        ?>

                    </select></td>
            </tr>
            <tr> 
                <td>NIP</td>
                <td>
                <select name="nip">
                        <?php
                            $q = "select * from dosen";
                            $p = mysqli_query($conn, $q);
                            while($data = mysqli_fetch_array($p))
                            {
                    echo "<option value=".$data['nip'].">".$data['nip']." | ".$data['nama_dosen']."</option>";
                            }
                        ?>

                    </select>
                </td>
            </tr>
            <tr> 
                <td>Nilai</td>
                <td><input type="text" name="nilai"></td>
            </tr>
            <tr> 
                <td></td>
                <td><input type="submit" name="Submit" value="Add"></td>
            </tr>
        </table>
    </form>
    
    <?php
 
    // Check If form submitted, insert form data into users table.
    if(isset($_POST['Submit'])) {
        $nim = $_POST['nim'];
        $kode_mk = $_POST['kode_mk'];
        $nip = $_POST['nip'];
        $nilai = $_POST['nilai'];
        
        
                
        // Insert user data into table
        $result = mysqli_query($conn, "INSERT INTO perkuliahan VALUES('$nim','$kode_mk','$nip', '$nilai')");
        

        // Show message when user added
        echo "User added successfully. <a href='perkuliahan.php'>View Mahasiswa</a>";
    }
    ?>
</body>
</html>