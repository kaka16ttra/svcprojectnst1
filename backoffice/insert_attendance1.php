<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("Location: login.php");
    exit();
}

// รับข้อมูลจากฟอร์ม
$attendance_data = $_POST["attendance"];
$date = $_POST["date"];
$username = $_SESSION["user"];

// เชื่อมต่อฐานข้อมูล
$condb = new mysqli("127.0.0.1", "root", "12345678", "project1");

// ตรวจสอบการเชื่อมต่อ
if ($condb->connect_error) {
    die("Connection failed: " . $condb->connect_error);
}

// ดึง ID ของสมาชิกที่เข้าสู่ระบบ
$sql_get_member_id = "SELECT id FROM members WHERE member_number = ?";
$stmt = $condb->prepare($sql_get_member_id);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();
$member = $result->fetch_assoc();
$member_id = $member["id"];

// เตรียมข้อมูลการเช็คชื่อ
$sql_insert_attendance = "INSERT INTO attendance1 (member_id, attendance_date, status_attendance) VALUES (?, ?, ?)";
$stmt = $condb->prepare($sql_insert_attendance);

// บันทึกข้อมูลการเช็คชื่อ
foreach ($attendance_data as $member_id => $status) {
    $stmt->bind_param("iss", $member_id, $date, $status);
    $stmt->execute();
}

// แจ้งเตือนสำเร็จ
echo "<script>
    alert('บันทึกเวลาเข้าเรียนสำเร็จ');
    window.location.href = 'attendance1.php';
</script>";

// ปิดการเชื่อมต่อฐานข้อมูล
$stmt->close();
$condb->close();
?>
