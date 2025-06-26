<?php include('connect_server.php'); ?>

<?php
// ค่าที่รับเข้ามาจากการส่งคำขอ GET
$employee_id = $_GET['employee_id'];

// เชื่อมต่อกับฐานข้อมูล
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// สร้างคำสั่ง SQL เพื่อค้นหา Employee_name จากตาราง employee
$sql = "SELECT Employee_name FROM employee WHERE Employee_id = '$employee_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // ถ้าพบข้อมูล Employee_name ให้ส่งค่ากลับในรูปแบบ JSON
    $row = $result->fetch_assoc();
    echo json_encode(array("employee_name" => $row["Employee_name"]));
} else {
    // ถ้าไม่พบข้อมูล Employee_name
    echo json_encode(array("employee_name" => "ไม่พบข้อมูล"));
}

// ปิดการเชื่อมต่อกับฐานข้อมูล
$conn->close();
?>
