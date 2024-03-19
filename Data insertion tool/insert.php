<?php
$link = $_POST['link'];
$visitcount = $_POST['visitcount'];
$waitingtime = $_POST['waitingtime'];
$ad = isset($_POST['ad']) ? 1 : 0;
$adimg = $_POST['adimg'];
$adlink = $_POST['adlink'];

$serveradd = "127.0.0.1";
$username = "dbusername";
$password = "dbpassword";
$dbname = "dbname";

$conn = new mysqli($serveradd, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO fwlinks (link, visitcount, waitingtime, ad, adimg, adlink) VALUES ('$link', $visitcount, $waitingtime, $ad, '$adimg', '$adlink')";
if ($conn->query($sql) === TRUE) {
    echo "Data insertion successful";
} else {
    echo "Data insertion failed: " . $conn->error;
}

$conn->close();
?>