<?php
$serveradd = "127.0.0.1";
$username = "dbusername";
$password = "dbpassword";
$dbname = "dbname";

$conn = new mysqli($serveradd, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (!isset($_GET['linkid'])) {
    die("Link ID not set.");
}

$stmt = $conn->prepare("SELECT * FROM fwlinks WHERE linkid = ?");
$stmt->bind_param("i", $_GET['linkid']);
$stmt->execute();

$result = $stmt->get_result();
$row = $result->fetch_assoc();

if($row) {
    if($row['ad']) {
        echo "<a href='". $row['adlink'] ."' target='_blank'><img src='". $row['adimg'] ."' height='200' width='200'></a>";
    }
    echo "<script>
    var sec = ". $row['waitingtime'] .";
    var timer = setInterval(function(){
        document.getElementById('time').innerHTML = 'Countdown '+sec+' s...';
        sec--;
        if (sec < 0) {
            window.location.href = '".$row['link']."';
            clearInterval(timer);
        }
    }, 1000);
    </script>";
    echo "<div id='time'></div>";
    $visitcount = $row['visitcount'] + 1;
    $stmt = $conn->prepare("UPDATE fwlinks SET visitcount=? WHERE linkid=?");
    $stmt->bind_param("ii", $visitcount, $_GET['linkid']);
    $stmt->execute();
} else {
    echo "Link does not exist";
}
$conn->close();
?>