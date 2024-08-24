<?php
session_start();
if (!isset($_SESSION['user'])) {
    echo "<script>
        alert('กรุณาเข้าสู่ระบบ');
        window.location.href='../login.php';
    </script>";
    exit();
}

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$attendance_date = isset($_GET['date']) ? $_GET['date'] : '';

if ($id <= 0 || empty($attendance_date)) {
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

// คำสั่ง SQL สำหรับการลบข้อมูล
$sql_delete_attendance = "
    DELETE FROM attendance3
    WHERE member_id = ? AND attendance_date = ?
";

$stmt = $conndb->prepare($sql_delete_attendance);
if ($stmt === false) {
    die("Prepare failed: " . $conndb->error);
}

$stmt->bind_param('is', $id, $attendance_date);

if ($stmt->execute()) {
    echo "<script>
        alert('ลบข้อมูลสำเร็จ');
        window.location.href='record_attendance3.php';
    </script>";
} else {
    echo "<script>
        alert('ล้มเหลวในการลบข้อมูล');
        window.location.href='record_attendance3.php';
    </script>";
}

$stmt->close();
$conndb->close();
?>
