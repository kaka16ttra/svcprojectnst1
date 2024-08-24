<?php
session_start();


// รับข้อมูลจากฟอร์ม
$username = $_POST["username"];
$password = $_POST["password"];

// เชื่อมต่อฐานข้อมูล
$condb = new mysqli("127.0.0.1", "root", "12345678", "project1");

// ตรวจสอบการเชื่อมต่อ
if ($condb->connect_error) {
    die("Connection failed: " . $condb->connect_error);
}

// ตรวจสอบข้อมูลสมาชิก
$sql_chk_member = "SELECT * FROM members WHERE member_number = ? AND member_password = ?";
$stmt = $condb->prepare($sql_chk_member);
$stmt->bind_param("ss", $username, $password);
$stmt->execute();
$rs_chk_member = $stmt->get_result();

if ($rs_chk_member->num_rows === 1) {
    // ดึงข้อมูลสมาชิก
    $row = $rs_chk_member->fetch_assoc();
    
    // เก็บข้อมูลสมาชิกใน session
    $_SESSION["user"] = $username;
    $_SESSION["member_status"] = $row["member_status"];
    
    // ตรวจสอบ member_status
    if ($row["member_status"] == 2) {
        // ถ้า member_status เป็น 2 ให้เปลี่ยนเส้นทางไปยัง backoffice
        header("Location: backoffice/index.php");
    } else {
        
        header("Location: member/index.php");
    }
    exit();
} else {
    // ข้อมูลเข้าสู่ระบบไม่ถูกต้อง
    echo "<script>
        alert('ข้อมูลเข้าสู่ระบบไม่ถูกต้อง');
        window.location.href = 'login.php';
    </script>";
}

// ปิดการเชื่อมต่อฐานข้อมูล
$stmt->close();
$condb->close();
?>
