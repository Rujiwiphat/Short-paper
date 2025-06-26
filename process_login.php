<?php
// เชื่อมต่อกับ MySQL Database
$servername = "localhost";
$username = "root";
$password = "gaba1344";
$dbname = "haydale1";

// สร้างการเชื่อมต่อ
$conn = new mysqli($servername, $username, $password, $dbname);

?>
    
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .error-message {
            max-width: 80%; /* กำหนดความกว้างสูงสุดของกล่อง */
            background-color: #ffcccc;
            color: red;
            padding: 50px;
            border: 4px solid red;
            border-radius: 20px;
            text-align: center;
            font-size: 40px;
        }
    </style>
</head>
<body>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // รับค่า username และ password จากฟอร์ม
                $username = $_POST["username"];
                $password = $_POST["password"];
                
                // เตรียมคำสั่ง SQL เพื่อตรวจสอบข้อมูลผู้ใช้
                $sql = "SELECT e.first_name, e.last_name FROM 
                        login l INNER JOIN employee e ON l.employee_id = e.employee_id 
                        WHERE l.username='$username' AND l.password='$password'";
                $result = $conn->query($sql);
                
                // ตรวจสอบว่ามีผลลัพธ์จากการค้นหาหรือไม่
                if ($result->num_rows == 1) {
                    // ถ้าพบข้อมูลผู้ใช้ในฐานข้อมูล
                    $row = $result->fetch_assoc();
                    $first_name = $row["first_name"];
                    $last_name = $row["last_name"];
                    session_start();
                    $_SESSION['password'] = true;
                    $_SESSION['username'] = $username;
                    $_SESSION['first_name'] = $first_name;
                    $_SESSION['last_name'] = $last_name;
                    // หากมีชื่อผู้ใช้ในฐานข้อมูล ให้เปลี่ยนเส้นทางไปยังหน้าที่ต้องการ
                    header("Location: Page_Menu.php");
                    exit;
                } else {
                    // หากไม่พบชื่อผู้ใช้ในฐานข้อมูล ให้กลับไปยังหน้าเดิม
                    echo "<div class='error-message'>Please check Username or Password</div>";
                    header("refresh:0.9;url=Page_Login.php"); // ทำการรีเฟรชหน้าใหม่หลังจาก 0.9 วินาที
                    exit;
                }
            }

            // ปิดการเชื่อมต่อฐานข้อมูล
            mysqli_close($conn);
        ?>
</body>
</html>

