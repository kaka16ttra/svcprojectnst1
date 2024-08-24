<?php
session_start();
if (!isset($_SESSION['user'])) {
    echo "<script>
        alert('กรุณาเข้าสู่ระบบ');
        window.location.href='../login.php';
    </script>";
    exit();
}

$id = isset($_POST['id']) ? intval($_POST['id']) : 0;
$attendance_date = isset($_POST['attendance_date']) ? $_POST['attendance_date'] : '';
$status_attendance = isset($_POST['status_attendance']) ? $_POST['status_attendance'] : '';

if ($id <= 0 || empty($attendance_date) || empty($status_attendance)) {
    echo "<script>
        alert('ข้อมูลไม่ครบถ้วน');
        window.location.href='record_attendance3.php';
    </script>";
    exit();
}

$conndb = new mysqli("127.0.0.1", "root", "12345678", "project1");

// ตรวจสอบการเชื่อมต่อฐานข้อมูล
if ($conndb->connect_error) {
    die("Connection failed: " . $conndb->connect_error);
}

// คำสั่ง SQL สำหรับการอัปเดตข้อมูล
$sql_update_attendance = "
    UPDATE attendance3
    SET status_attendance = ?
    WHERE member_id = ? AND attendance_date = ?
";

$stmt = $conndb->prepare($sql_update_attendance);
if ($stmt === false) {
    die("Prepare failed: " . $conndb->error);
}

$stmt->bind_param('sis', $status_attendance, $id, $attendance_date);

if ($stmt->execute()) {
    echo "<script>
        alert('แก้ไขข้อมูลสำเร็จ');
        window.location.href='record_attendance3.php';
    </script>";
} else {
    echo "<script>
        alert('ล้มเหลวในการอัปเดตข้อมูล');
        window.location.href='record_attendance3.php';
    </script>";
}

$stmt->close();
$conndb->close();
?>
