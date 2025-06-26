<?php
// เชื่อมต่อกับ MySQL Database
$servername = "localhost";
$username = "root";
$password = "gaba1344";
$dbname = "haydale1";

// สร้างการเชื่อมต่อ
$conn = new mysqli($servername, $username, $password, $dbname,);

// ตรวจสอบการเชื่อมต่อ
if ($conn->connect_error) {
    die("connect_error: " . $conn->connect_error);
}

else {
    echo "connect_suscess";
}
?>