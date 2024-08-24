<?php
// Start the session if it's not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Assuming member_status is stored in the session
$member_status = $_SESSION['member_status'] ?? 0; // Default to 0 if not set
$logged_in = $_SESSION['logged_in'] ?? false;

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ระบบนักศึกษาวิชาทหารวิทยาลัยอาชีวศึกษาสุราษฎร์ธานี</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="icon" href="img/svc.png">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Sarabun:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800&display=swap');
        .navbar {
            background-color: #333; /* เปลี่ยนสีพื้นหลังที่นี่ */
        }
        .navbar-brand, .nav-link {
            color: #000000; /* เปลี่ยนสีของตัวอักษรใน navbar */
        }
        body{
          font-family: "Sarabun", sans-serif;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">ระบบนักศึกษาวิชาทหารวิทยาลัยอาชีวศึกษาสุราษฎร์ธานี</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">หน้าหลัก</a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" href="attendance.php">ติดต่อเรา</a>
                </li>
        
                <?php if ($member_status == 2): ?>
                    <li class="nav-item">
                    <a class="nav-link" href="attendance.php">เช็คชื่อนักศึกษาวิชาทหาร</a>
                </li>
                <?php endif; ?>
            </ul>
            <!-- Show logout button if logged in, otherwise show login button -->
            
                <a class="btn btn-outline-danger" type="submit" href="logout.php">&nbsp;<img src="img/logout.png" alt="">&nbsp;&nbsp;Logout&nbsp;&nbsp;</a>
           
               
                
        </div>
    </div>
</nav>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
</body>
</html>
