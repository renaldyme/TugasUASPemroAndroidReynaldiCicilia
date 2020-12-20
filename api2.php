<?php
include 'config.php';

$perintah=$_GET['perintah'];
$nisn=$_GET['nisn'];
$kode_kelas=$_GET['kode_kelas'];
$kode_pel=$_GET['kode_pel'];
$tahun_ajaran=$_GET['tahun_ajaran'];
$semester=$_GET['semester'];
$auth=$_GET['auth'];

$sql = "SELECT nisn, kode_kelas, kode_pel, tahun_ajaran, semester FROM tbnilai";
$result = $conn->query($sql);

if($auth == "888"){
if (!empty($_GET) && $perintah=="selectnilai") {
    if ($result->num_rows > 0) {
    // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<br>";
            echo "nisn: " . $row["nisn"]. " - kode_kelas: " . $row["kode_kelas"]. " - kode_pel: " . $row["kode_pel"]. " - tahun_ajaran: " . $row["tahun_ajaran"]. " - semester: " . $row["semester"]. "<br>";
        }
    } else {
            echo "0 results";
    }
$conn->close();
}

if (!empty($_GET) && $perintah=="insertnilai") {

    $sql = "INSERT INTO tbnilai (nisn, kode_kelas, kode_pel, tahun_ajaran, semester) VALUES ('".$nisn."', '".$kode_kelas."', '".$kode_pel."', '".$tahun_ajaran."', '".$semester."')";

    if (mysqli_query($conn, $sql)) {
        echo "<br>";
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
}

if (!empty($_GET) && $perintah=="updatenilai") {

    $sql = 'UPDATE tbnilai SET kode_kelas="'.$kode_kelas.'", kode_pel="'.$kode_pel.'", tahun_ajaran="'.$tahun_ajaran.'", semester="'.$semester.'", where nisn="'.$nisn.'"';

    if (mysqli_query($conn, $sql)) {
        echo "<br>";
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
}

if (!empty($_GET) && $perintah=="deletenilai") {

    $sql = "DELETE FROM tbnilai WHERE nisn='$nisn'";

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