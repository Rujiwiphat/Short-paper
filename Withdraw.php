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
        <ul>
            <li><a href="Stock.php">Stock Details</a></li>
        </ul>
    </div>

    <div class="container">
        <h2>Request Withdraw</h2>
        <form action="summary_requested.php" method="post">
            <label for="Lot_No">Lot_No:</label> <br>
            <div class="custom-select">
                <select id="Lot_No" name="Lot_No" required>
                <option value="">- Select -</option>
                    <?php
                    // เชื่อมต่อฐานข้อมูล
                    $conn = new mysqli($servername, $username, $password, $dbname);
                    // ตรวจสอบการเชื่อมต่อ
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }
                    // สร้างคำสั่ง SQL เพื่อดึงข้อมูล Employee_id จากตาราง employee
                    $sql = "SELECT Lot_No FROM stock";
                    $result = $conn->query($sql);
                    // ตรวจสอบว่ามีข้อมูลในตารางหรือไม่
                    if ($result->num_rows > 0) {
                        // วนลูปเพื่อแสดงตัวเลือกใน dropdown
                        while($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row['Lot_No'] . "'>" . $row['Lot_No'] . "</option>";
                        }
                    }
                    ?>
                </select>
            </div> <br>

            <label for="sale_no">sale No:</label> <br>
            <div class="custom-select">
                <select id="sale_no" name="sale_no" required>
                <option value="">- Select -</option>
                    <?php
                    // เชื่อมต่อฐานข้อมูล
                    $conn = new mysqli($servername, $username, $password, $dbname);
                    // ตรวจสอบการเชื่อมต่อ
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }
                    // สร้างคำสั่ง SQL เพื่อดึงข้อมูล Employee_id จากตาราง employee
                    $sql = "SELECT sale_no FROM sale";
                    $result = $conn->query($sql);
                    // ตรวจสอบว่ามีข้อมูลในตารางหรือไม่
                    if ($result->num_rows > 0) {
                        // วนลูปเพื่อแสดงตัวเลือกใน dropdown
                        while($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row['sale_no'] . "'>" . $row['sale_no'] . "</option>";
                        }
                    }
                    ?>
                </select>
            </div> <br>

            <label for="quantity">Required quantity:</label> <br>
            <input type="number" step="any" id="quantity" name="quantity" required> <br>

            <label for="Employee_id">Employee_id:</label> <br>
            <div class="custom-select">
                <select id="Employee_id" name="Employee_id" required>
                <option value="">- Select -</option>
                    <?php
                    // เชื่อมต่อฐานข้อมูล
                    $conn = new mysqli($servername, $username, $password, $dbname);
                    // ตรวจสอบการเชื่อมต่อ
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }
                    // สร้างคำสั่ง SQL เพื่อดึงข้อมูล Employee_id จากตาราง employee
                    $sql = "SELECT Employee_id FROM Employee";
                    $result = $conn->query($sql);
                    // ตรวจสอบว่ามีข้อมูลในตารางหรือไม่
                    if ($result->num_rows > 0) {
                        // วนลูปเพื่อแสดงตัวเลือกใน dropdown
                        while($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row['Employee_id'] . "'>" . $row['Employee_id'] . "</option>";
                        }
                    }
                    ?>
                </select>
            </div> <br>

            <label for="Customer_no">Customer_no:</label> <br>
            <div class="custom-select">
                <select id="Customer_no" name="Customer_no" required>
                <option value="">- Select -</option>
                    <?php
                    // เชื่อมต่อฐานข้อมูล
                    $conn = new mysqli($servername, $username, $password, $dbname);
                    // ตรวจสอบการเชื่อมต่อ
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }
                    // สร้างคำสั่ง SQL เพื่อดึงข้อมูล Customer_no จากตาราง employee
                    $sql = "SELECT Customer_no FROM customer";
                    $result = $conn->query($sql);
                    // ตรวจสอบว่ามีข้อมูลในตารางหรือไม่
                    if ($result->num_rows > 0) {
                        // วนลูปเพื่อแสดงตัวเลือกใน dropdown
                        while($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row['Customer_no'] . "'>" . $row['Customer_no'] . "</option>";
                        }
                    }
                    ?>
                </select>
            </div> <br>
 
            <label  for="Transaction_Date">Transaction_Date:</label>
            <input  type="date" id="sale_date" name="Transaction_Date"
                    value="yyyy-mm-dd"
                    min="yyyy-mm-dd" max="yyyy-mm-dd">
 
            <input type="submit" value="Submit Request">
        </form>
    </div>
   
</body>
</html>