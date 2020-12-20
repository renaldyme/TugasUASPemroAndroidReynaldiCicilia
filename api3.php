<?php
include 'config.php';

$perintah=$_GET['perintah'];
$kode_kelas=$_GET['kode_kelas'];
$nama_kelas=$_GET['nama_kelas'];
$kode_guru=$_GET['kode_guru'];
$auth=$_GET['auth'];

$sql = "SELECT kode_kelas, nama_kelas, kode_guru FROM tbkelas";
$result = $conn->query($sql);

if($auth == "888"){
if (!empty($_GET) && $perintah=="selectkelas") {
    if ($result->num_rows > 0) {
    // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<br>";
            echo "kode_kelas: " . $row["kode_kelas"]. " - nama_kelas: " . $row["nama_kelas"]. " - kode_guru: " . $row["kode_guru"]. "<br>";
        }
    } else {
            echo "0 results";
    }
$conn->close();
}

if (!empty($_GET) && $perintah=="insertkelas") {

    $sql = "INSERT INTO tbkelas (kode_kelas, nama_kelas, kode_guru) VALUES ('".$kode_kelas."', '".$nama_kelas."', '".$kode_guru."')";

    if (mysqli_query($conn, $sql)) {
        echo "<br>";
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
}

if (!empty($_GET) && $perintah=="updatekelas") {

    $sql = 'UPDATE tbkelas SET nama_kelas="'.$nama_kelas.'", kode_guru="'.$kode_guru.'", where kode_kelas="'.$kode_kelas.'"';

    if (mysqli_query($conn, $sql)) {
        echo "<br>";
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
}

if (!empty($_GET) && $perintah=="deletenilai") {

    $sql = "DELETE FROM tbkelas WHERE kode_kelas='$kode_kelas'";

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