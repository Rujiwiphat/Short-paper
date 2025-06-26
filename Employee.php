<?php include('connect_server.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee detail</title>
    <style>
         .container {
            max-width: 700px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            /* box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);*/
        }
        h2 {
            text-align: Left;
            margin-bottom: 10px;
            font-family: Arial, sans-serif;
            font-size: 30px;    
        }
        table {
            max-width: 700px;
            margin: 15px auto;
            border-collapse: collapse;
            width: 100%;
            font-size: 25px; 
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<div class="container">
    <?php
    // สร้างคำสั่ง SQL เพื่อดึงข้อมูลจากตาราง stock
    $sql = "SELECT * FROM employee";

    // ดึงข้อมูล
    $result = $conn->query($sql);

    // ตรวจสอบว่ามีข้อมูลในตารางหรือไม่
    if ($result->num_rows > 0) {
        // แสดงข้อมูลทีละแถวในรูปแบบของตาราง HTML
        echo "<h2>Customer Details</h2>";
        echo "<table>";
        echo "<tr><th>employee_id</th><th>first_name</th><th>last_name</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["employee_id"] . "</td>";
            echo "<td>" . $row["first_name"] . "</td>";
            echo "<td>" . $row["last_name"] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "ไม่พบข้อมูลในตาราง stock";
    }

    // ปิดการเชื่อมต่อฐานข้อมูล
    $conn->close();
    ?> 
</div>

</body>
</html>