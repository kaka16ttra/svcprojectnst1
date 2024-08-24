<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


$member_status = $_SESSION['member_status'] ?? 0; 
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
        .dropdown-menu {
            transition: opacity 0.3s ease, visibility 0.3s ease;
            opacity: 0;
            visibility: hidden;
        }
        .dropdown-menu.show {
            opacity: 1;
            visibility: visible;
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
                    <a class="nav-link" href="contact.php">ติดต่อเรา</a>
                </li>
        
                <?php if ($member_status == 2): ?>
                    <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdownMenuButton" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                เช็คชื่อนักศึกษาวิชาทหาร
            </a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="attendance1.php">เช็คชื่อนักศึกษาวิชาทหารชั้นปีที่1</a>
                <a class="dropdown-item" href="attendance.php">เช็คชื่อนักศึกษาวิชาทหารชั้นปีที่2</a>
                <a class="dropdown-item" href="attendance3.php">เช็คชื่อนักศึกษาวิชาทหารชั้นปีที่3</a>
            </div>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdownMenuButton" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                ดูข้อมูลการเช็คชื่อ
            </a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="record_attendance1.php">ดูข้อมูลการเช็คชื่อชั้นปีที่1</a>
                <a class="dropdown-item" href="record_attendance.php">ดูข้อมูลการเช็คชื่อชั้นปีที่2</a>
                <a class="dropdown-item" href="record_attendance3.php">ดูข้อมูลการเช็คชื่อชั้นปีที่3</a>
            </div>
        </li>
                <li class="nav-item">
                    <a class="nav-link" href="edit_news.php">แก้ไขหน้าหลัก</a>
                    
                </li>
                <?php endif; ?>
            </ul>
            
                <a class="btn btn-outline-danger" type="submit" href="logout.php">&nbsp;<img src="img/logout.png" alt="">&nbsp;&nbsp;Logout&nbsp;&nbsp;</a>
           
                
               
                
        </div>
    </div>
</nav>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
