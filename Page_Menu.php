<?php include('connect_server.php') ?>;

<?php
session_start();
// ตรวจสอบว่ามีการเข้าสู่ระบบหรือไม่
if (!isset($_SESSION['username']) || $_SESSION['password'] !== true) {
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            justify-content: center;
            align-items: center;
            height: 100vh;
            
        }
        .container {
            width: 800px;
            margin: 150 auto;
            padding: 20px;
            /*border: 1px solid #ccc;*/
            border-radius: 5px;
            /*box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);*/
            text-align: center; /* เพิ่มคำสั่ง text-align: center; เพื่อจัดวางเนื้อหาตรงกลาง */
        }
        .container h2{
            /*text-transform: uppercase;  เพิ่มคำสั่ง text-transform: uppercase; เพื่อทำให้ตัวหนังสือเป็นตัวพิมพ์ใหญ่ทั้งหมด */
            font-size: 45px; /* เปลี่ยนขนาดตัวอักษรในลิงค์เป็น 20px */
        }
        .container h3 {
            text-transform: uppercase; /* เพิ่มคำสั่ง text-transform: uppercase; เพื่อทำให้ตัวหนังสือเป็นตัวพิมพ์ใหญ่ทั้งหมด */
            font-size: 30px; /* เปลี่ยนขนาดตัวอักษรในลิงค์เป็น 20px */
        }
        .container ul {
            margin: 10 auto;
            width: 400px;
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
            font-size: 25px; /* เปลี่ยนขนาดตัวอักษรในลิงค์เป็น 20px */
        }
        .container ul li a:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Welcome <?php echo $_SESSION['first_name'] ; ?> <?php echo $_SESSION['last_name'] ; ?></h2>
    <h3>Please select an action</h3>
    <ul>
        <li><a href="Sale_order.php">Sale Order</a></li>
        <li><a href="Customer.php">Customer Details</a></li>
        <li><a href="Employee.php">Employee Details</a></li>
        <li><a href="haydale1_Summary_stock.php">Summary</a></li>
    </ul>
</div>
</body>
</html>