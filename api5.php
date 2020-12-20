<?php
include 'config.php';

$perintah=$_GET['perintah'];
$kode_pel=$_GET['kode_pel'];
$nama_pel=$_GET['nama_pel'];
$ketuntasan=$_GET['ketuntasan'];
$auth=$_GET['auth'];

$sql = "SELECT kode_pel, nama_pel, ketuntasan FROM tbpelajaran";
$result = $conn->query($sql);

if($auth == "888"){
if (!empty($_GET) && $perintah=="selectpelajaran") {
    if ($result->num_rows > 0) {
    // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<br>";
            echo "kode_pel: " . $row["kode_pel"]. " - nama_pel: " . $row["nama_pel"]. " - ketuntasan: " . $row["ketuntasan"]. "<br>";
        }
    } else {
            echo "0 results";
    }
$conn->close();
}

if (!empty($_GET) && $perintah=="insertpelajaran") {

    $sql = "INSERT INTO tbpelajaran (kode_pel, nama_pel, ketuntasan) VALUES ('".$kode_pel."', '".$nama_pel."', '".$ketuntasan."')";

    if (mysqli_query($conn, $sql)) {
        echo "<br>";
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
}

if (!empty($_GET) && $perintah=="updatepelajaran") {

    $sql = 'UPDATE tbpelajaran SET nama_pel="'.$nama_pel.'", ketuntasan="'.$ketuntasan.'", where kode_pel="'.$kode_pel.'"';

    if (mysqli_query($conn, $sql)) {
        echo "<br>";
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
}

if (!empty($_GET) && $perintah=="deletepelajaran") {

    $sql = "DELETE FROM tbpelajaran WHERE kode_pel='$kode_pel'";

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