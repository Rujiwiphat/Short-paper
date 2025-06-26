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
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            /*box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);*/
        }
        h2 {
            text-align: center;
            margin-bottom: 30px;
            font-size: 40px;
        }
        p {
            text-align: center;
            margin-bottom: 20px;
            font-size: 20px;
        }
        form{
            text-align: center;
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            border-radius: 25px;
            background-color: #fff;
            border-radius: 8px;
            font-size: 30px;
            /*box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);*/
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
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $employee_id = $_POST['Employee_id'];
        $customer_no = $_POST['Customer_no'];
        $issue_date = $_POST['issue_date'];
        $due_date = $_POST['due_date'];
        $lot_no = $_POST['lot_no'];
        $quantity = $_POST['quantity'];

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "INSERT INTO sale (Customer_no, Employee_id, sale_date) 
                VALUES ('$customer_no', '$employee_id', '$issue_date')";

        if ($conn->query($sql) === TRUE) {
            echo "<div class='container'>
                    <h2>Sale Order Submission</h2>
                    <p>Your sale order has been submitted successfully.</p>
                    <ul><a href='sale_order.php'>Submit another order</a></ul>
                </div>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    ?>
        <form action="Withdraw.php" method="post">
        <input type="submit" value="Withdraw">
        </form>
</div>


<div class="container">
    <?php
    // สร้างคำสั่ง SQL เพื่อดึงข้อมูลจากตาราง sale
    $sql = "SELECT * FROM sale";

    // ดึงข้อมูล
    $result = $conn->query($sql);

    // ตรวจสอบว่ามีข้อมูลในตารางหรือไม่
    if ($result->num_rows > 0) {
        // แสดงข้อมูลทีละแถวในรูปแบบของตาราง HTML
        echo "<h2>Summary Sale Order</h2>";
        echo "<table>";
        echo "  <tr>
                    <th>Sale_No</th>
                    <th>Customer_No</th>
                    <th>Employee_ID</th>
                    <th>Sale_Date</th>
                </tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["sale_no"] . "</td>";
            echo "<td>" . $row["customer_No"] . "</td>";
            echo "<td>" . $row["employee_id"] . "</td>";
            echo "<td>" . $row["sale_date"] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "ไม่พบข้อมูลในตาราง sale";
    }

    ?> 
</div>



</body>
</html>