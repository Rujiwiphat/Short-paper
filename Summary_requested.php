<?php include('connect_server.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Record sale order</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 500px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            /*box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);*/
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 30px;
        }
        label {
            font-weight: bold;
            font-size: 20px;
            
        }
        input[type="text"],
        input[type="number"],
        input[type="date"] {
            width: 100%;
            padding: 8px;
            margin: 15px auto;
            border: 1px solid #ccc;
            border-radius: 100px;
            box-sizing: border-box;
            font-size: 20px;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            margin: 15px auto;
            padding: 10px 20px;
            border: none;
            border-radius: 100px;
            cursor: pointer;
            font-size: 20px;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        table {
            max-width: 600px;
            margin: 20px auto;
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }
        .container ul {
            margin: 5 auto;
            width: 350px;
            list-style-type: none;
            padding: 0;
        }
        .container ul li {
            margin-bottom: 10px;
        }
        .container ul li a {
            display: block;
            padding: 10px;
            text-decoration: none;
            background-color: #4caf50;
            color: white;
            border-radius: 25px;
            text-align: center;
            font-size: 22px; /* เปลี่ยนขนาดตัวอักษรในลิงค์เป็น 20px */
            font-weight: bold;
        }
        .container ul li a:hover {
            background-color: #45a049;
        }
        .custom-select {
            position: relative;
            display: inline-block;
            width: 100%;
            margin: 10 auto;
            
        }

        .custom-select select {
            display: inline-block;
            width: 100%;
            padding: 11px;
            border: 1px solid #ccc;
            border-radius: 25px;
            box-sizing: border-box;
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            background-color: #fff;
            cursor: pointer;
            font-size: 18px;
        }

        .custom-select select::-ms-expand {
            display: none;
        }

        /*.custom-select::after {
            content: '\25BC';
            position: absolute;
            top: 0;
            right: 0;
            padding: 15px;
            background-color: #ccc;
            border-radius: 25px;
        }*/

        .custom-select select:hover {
            background-color: #f4f4f4;
        }
    </style>
</head>
<body>

<div class="container">
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") 
        $Lot_No = $_POST['Lot_No:'];
        $sale_no = $_POST['sale_no:'];
        $quantity = $_POST['quantity'];
        $Employee_id = $_POST['Employee_id'];
        $Customer_no = $_POST['Customer_no'];
        $Transaction_Date = $_POST['Transaction_Date'];

    ?>

<?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            echo "<h2>Request</h2>";
            echo "<table border='1'>";
            if ($resultLot->num_rows > 0) {
                echo "<tr><td>Lot_No :</td><td>$Lot_No</td></tr>";
            } else {
                echo "<tr><td>Lot_No</td><td>ไม่มีข้อมูลในฐานข้อมูล</td></tr>";
            }
        
            if ($resultEmployee->num_rows > 0) {
                echo "<tr><td>Employee_id :</td><td>$Employee_id</td></tr>";
            } else {
                echo "<tr><td>Employee_id</td><td>ไม่มีข้อมูลในฐานข้อมูล</td></tr>";
            }
        
            echo "<tr><td>Quantity :</td><td>$quantity</td></tr>";
            echo "<tr><td>Customer_No :</td><td>$Customer_no</td></tr>";
        
            echo "</table>";
        }
        ?>

 <?php
        // ตรวจสอบค่า Employee_id และทำการ query ข้อมูลพนักงาน
        if (isset($Employee_id)) {
            $sql = "SELECT * FROM employee WHERE Employee_id = '$Employee_id'";
            $result = $conn->query($sql);

            if ($result && $result->num_rows > 0) {
                echo "<h2>Employee Request</h2>";
                echo "<table border='1' style='border-collapse: collapse;'>";
                echo "<tr><th>Employee ID</th><th>First Name</th><th>Last Name</th><th>Position</th></tr>";
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["employee_id"] . "</td>";
                    echo "<td>" . $row["first_name"] . "</td>";
                    echo "<td>" . $row["last_name"] . "</td>";
                    echo "<td>" . $row["position"] . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo "ไม่พบข้อมูลสำหรับ Employee ID: $Employee_id";
            }
        }
        ?>

</body>
</html>