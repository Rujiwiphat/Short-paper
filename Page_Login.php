<?php include('connect_server.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Haydale</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            width: 350px;
            margin: 0 auto;
            padding-top: 200px;
            font-size: 20px;
        }
        input[type="text"],
        input[type="password"],
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 20px;
            box-sizing: border-box;
            font-size: 20px;
        }
        input[type="submit"] {
            background-color: #4caf50;
            color: white;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>เข้าสู่ระบบ</h2>
        <form action="process_login.php" method="POST">
            <label for="username">Username:</label><br>
            <input type="text" id="username" name="username"><br>
            <label for="password">Password:</label><br>
            <input type="password" id="password" name="password"><br><br>
            <input type="submit" value="Login">
        </form>
    </div>
</body>
</html>
