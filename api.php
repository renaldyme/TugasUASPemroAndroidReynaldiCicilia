<?php
include 'config.php';

$perintah=$_GET['perintah'];
$id=$_GET['id'];
$nama=$_GET['nama_lengkap'];
$nisn=$_GET['nisn'];
$tanggal_lahir=$_GET['tanggal_lahir'];
$jenis_kelamin=$_GET['jenis_kelamin'];
$alamat_siswa=$_GET['alamat_siswa'];
$provinsi=$_GET['provinsi'];
$kecamatan=$_GET['kecamatan'];
$kelurahan=$_GET['kelurahan'];
$asal_sekolah=$_GET['asal_sekolah'];
$tahun_lulus=$_GET['tahun_lulus'];
$agama=$_GET['agama'];
$auth=$_GET['auth'];

$sql = "SELECT id, nama_lengkap, nisn, tanggal_lahir, jenis_kelamin, alamat_siswa, provinsi, kecamatan, kelurahan, asal_sekolah, tahun_lulus, agama FROM tbcalonsiswa";
$result = $conn->query($sql);

if($auth == "888"){
if (!empty($_GET) && $perintah=="select") {
    if ($result->num_rows > 0) {
    // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<br>";
            echo "id: " . $row["id"]. " - nama: " . $row["nama_lengkap"]. " - nisn: " . $row["nisn"]. " - tanggal_lahir: " . $row["tanggal_lahir"]. " - jenis_kelamin: " . $row["jenis_kelamin"]. " - alamat_siswa: " . $row["alamat_siswa"]. " - provinsi: " . $row["provinsi"]. " - kecamatan: " . $row["kecamatan"]. " - kelurahan: " . $row["kelurahan"]. " - asal_sekolah: " . $row["asal_sekolah"]. " - tahun_lulus: " . $row["tahun_lulus"]. " " . $row["agama"]. "<br>";
        }
    } else {
            echo "0 results";
    }
$conn->close();
}

if (!empty($_GET) && $perintah=="insert") {

    $sql = "INSERT INTO tbcalonsiswa (id, nama_lengkap, nisn, tanggal_lahir, jenis_kelamin, alamat_siswa, provinsi, kecamatan, kelurahan, asal_sekolah, tahun_lulus, agama) VALUES ('', '".$nama."', '".$nisn."', '".$tanggal_lahir."', '".$jenis_kelamin."', '".$alamat_siswa."', '".$provinsi."', '".$kecamatan."', '".$kelurahan."', '".$asal_sekolah."', '".$tahun_lulus."', '".$agama."', )";

    if (mysqli_query($conn, $sql)) {
        echo "<br>";
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

if (!empty($_GET) && $perintah=="update") {

    $sql = 'UPDATE tbcalonsiswa SET nama_lengkap="'.$nama.'", nisn="'.$nisn.'", tanggal_lahir="'.$tanggal_lahir.'", jenis_kelamin="'.$jenis_kelamin.'", alamat_siswa="'.$alamat_siswa.'", provinsi="'.$provinsi.'", kecamatan="'.$kecamatan.'", kelurahan="'.$kelurahan.'", asal_sekolah="'.$asal_sekolah.'", tahun_lulus="'.$tahun_lulus.'", agama="'.$agama.'", where id="'.$id.'"';

    if (mysqli_query($conn, $sql)) {
        echo "<br>";
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

if (!empty($_GET) && $perintah=="delete") {

    $sql = "DELETE FROM tbcalonsiswa WHERE id='$id'";

    if (mysqli_query($conn, $sql)) {
        echo "<br>";
        echo "Record has been deleted";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
}
?>