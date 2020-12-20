<?php
include 'config.php';

$perintah=$_GET['perintah'];
$nip=$_GET['nip'];
$nama_guru=$_GET['nama_guru'];
$kode_guru=$_GET['kode_guru'];
$auth=$_GET['auth'];

$sql = "SELECT nip, nama_guru, kode_guru FROM tbguru";
$result = $conn->query($sql);

if($auth == "888"){
if (!empty($_GET) && $perintah=="selectguru") {
    if ($result->num_rows > 0) {
    // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<br>";
            echo "nip: " . $row["nip"]. " - nama_guru: " . $row["nama_guru"]. " - kode_guru: " . $row["kode_guru"]. "<br>";
        }
    } else {
            echo "0 results";
    }
$conn->close();
}

if (!empty($_GET) && $perintah=="insertguru") {

    $sql = "INSERT INTO tbguru (nip, nama_guru, kode_guru) VALUES ('".$nip."', '".$nama_guru."', '".$kode_guru."')";

    if (mysqli_query($conn, $sql)) {
        echo "<br>";
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
}

if (!empty($_GET) && $perintah=="updateguru") {

    $sql = 'UPDATE tbguru SET nama_guru="'.$nama_guru.'", kode_guru="'.$kode_guru.'", where nip="'.$nip.'"';

    if (mysqli_query($conn, $sql)) {
        echo "<br>";
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
}

if (!empty($_GET) && $perintah=="deleteguru") {

    $sql = "DELETE FROM tbguru WHERE nip='$nip'";

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