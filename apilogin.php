<?php
include 'config.php';
$Username =$_GET['username'];
$Password =$_GET['password'];
$auth=$_GET['auth'];
$perintah=$_GET['perintah'];

$sql = "SELECT id, nama, username, email, password FROM tbadmin";
$result = $conn->query($sql);

if($auth == "888"){
if (!empty($_GET) && $perintah=="ceklogin") {
	$return_arr=array();
    $sql ="SELECT id, nama, username, email, password FROM tbadmin";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
    	while($row = $result->fetch_assoc()) {
    		$row_array['id'] = $row['id'];
    		$row_array['username'] = $row['username'];
    		$row_array['password'] = $row['password'];

    		array_push($return_arr,$row_array);
    	}
    	echo json_encode($return_arr);
    } else {
    	echo "0 results";
    }
    $conn->close();
}
if (!empty($_GET) && $perintah=="ceklogin") {
	$return_arr=array();
    $sql ="SELECT * FROM tbadmin WHERE username='$Username' AND password='$Password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
    	while($row = $result->fetch_assoc()) {
    		$row_array['id'] = $row['id'];
    		$row_array['username'] = $row['username'];
    		$row_array['password'] = $row['password'];

    		array_push($return_arr,$row_array);
    	}
    	echo json_encode($return_arr);
    } else {
    	echo "0 results";
    }
    $conn->close();
}

}

?>