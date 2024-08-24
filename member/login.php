<?php include("tem/header.php"); ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Sarabun', sans-serif;
            
        }
        .wrapper{
            background-color: #f4f4f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 94vh;
            margin: 0;

        }
        .login-container {
            width: 25%;
            padding: 2rem;
            background: white;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding-top: 100px;
        }
    </style>
</head>
<body>
    <div class="wrapper">
    <div class="login-container">
        <h1 class="text-center">เข้าสู่ระบบ</h1>
        <form action="check_login.php" method="POST">
            <div class="mb-3">
                <label for="username" class="form-label">เลขบัตรประจำตัวประชาชน</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="กรอกเลขบัตรประจำตัวประชาชน" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">รหัสผ่าน</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="กรอกรหัสผ่าน" required>
            </div>
            <button type="submit" class="btn btn-primary">เข้าสู่ระบบ</button>
        </form>
        <p class="text-center mt-3">ยังไม่มีบัญชี? <a href="register.php">สมัครสมาชิก</a></p>
    </div>
    </div>
</body>
</html>
