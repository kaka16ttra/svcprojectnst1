<?php include("tem/header.php"); ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>
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
        .register-container {
            width: 30%;
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
    <div class="register-container">
        <h1 class="text-center">สมัครสมาชิก</h1>
        <form action="insert_member.php" method="POST">
            <div class="mb-3">
                <label for="fullname" class="form-label">ชื่อ</label>
                <input type="text" class="form-control" id="fullname" name="fullname" placeholder="กรอกชื่อ-นามสกุล" required>
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">เลขบัตรประจำตัวประชาชน</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="กรอกเลขบัตรประจำตัวประชาชน 13 หลัก" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">รหัสผ่าน</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="กรอกรหัสผ่าน" required>
            </div>
            <div class="mb-3">
                <label for="confirmPassword" class="form-label">รหัสผ่านยืนยัน</label>
                <input type="password" class="form-control" name="confirmPassword" placeholder="กรอกรหัสผ่านยืนยัน" required>
            </div>
            <div class="mb-3">
                <label for="year" class="form-label">ชั้นปี</label>
                <input type="number" class="form-control" name="year" placeholder="กรอกชั้นปี" required>
            </div>
            <button type="submit" class="btn btn-primary">สมัครสมาชิก</button>
        </form>
        <p class="text-center mt-3">คุณมีบัญชีอยู่แล้ว? <a href="login.php">เข้าสู่ระบบ</a></p>
    </div>
    </div>
</body>
</html>
