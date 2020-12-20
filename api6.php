<?php
include 'config.php';

$perintah=$_GET['perintah'];
$kode_kelas=$_GET['kode_kelas'];
$kode_guru=$_GET['kode_guru'];
$thn_ajaran=$_GET['thn_ajaran'];
$kode_pel=$_GET['kode_pel'];
$auth=$_GET['auth'];

$sql = "SELECT kode_kelas, kode_guru, thn_ajaran, kode_pel FROM tbmengajar";
$result = $conn->query($sql);

if($auth == "888"){
if (!empty($_GET) && $perintah=="selectmengajar") {
    if ($result->num_rows > 0) {
    // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<br>";
            echo "kode_kelas: " . $row["kode_kelas"]. " - kode_guru: " . $row["kode_guru"]. " - thn_ajaran: " . $row["thn_ajaran"]. " - kode_pel: " . $row["kode_pel"]. "<br>";
        }
    } else {
            echo "0 results";
    }
$conn->close();
}

if (!empty($_GET) && $perintah=="insertmengajar") {

    $sql = "INSERT INTO tbmengajar (kode_kelas, kode_guru, thn_ajaran, kode_pel) VALUES ('".$kode_kelas."', '".$kode_guru."', '".$thn_ajaran."', '".$kode_pel."')";

    if (mysqli_query($conn, $sql)) {
        echo "<br>";
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
}

if (!empty($_GET) && $perintah=="updatemengajar") {

    $sql = 'UPDATE tbmengajar SET kode_guru="'.$kode_guru.'", thn_ajaran="'.$thn_ajaran.'", kode_pel="'.$kode_pel.'", where kode_kelas="'.$kode_kelas.'"';

    if (mysqli_query($conn, $sql)) {
        echo "<br>";
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
}

if (!empty($_GET) && $perintah=="deletemengajar") {

    $sql = "DELETE FROM tbmengajar WHERE kode_kelas='$kode_kelas'";

    if (mysqli_query($conn, $sql)) {
        echo "<br>";
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
}
}
?>