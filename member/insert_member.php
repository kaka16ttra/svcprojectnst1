<?php
// รับข้อมูลจากฟอร์ม
$fullname = $_POST["fullname"];
$username = $_POST["username"];
$password = $_POST["password"];
$confirmPassword = $_POST["confirmPassword"];
$year = $_POST["year"];

// ตรวจสอบว่ารหัสผ่านและรหัสผ่านยืนยันตรงกัน
if ($password !== $confirmPassword) {
    echo "<script>
        alert('รหัสผ่านและรหัสผ่านยืนยันไม่ตรงกัน');
        window.location.href='register.php';
    </script>";
    exit;
}

// เชื่อมต่อฐานข้อมูล
$condb = new mysqli("127.0.0.1", "root", "12345678", "project1");

// ตรวจสอบการเชื่อมต่อ
if ($condb->connect_error) {
    die("Connection failed: " . $condb->connect_error);
}

// ตรวจสอบการมีอยู่ของสมาชิก
$sql_chk_member = "SELECT * FROM members WHERE member_number = ?";
$stmt = $condb->prepare($sql_chk_member);
$stmt->bind_param("s", $username);
$stmt->execute();
$rs_chk_member = $stmt->get_result();

if ($rs_chk_member->num_rows > 0) {
    echo "<script>
        alert('Username นี้ใช้งานอยู่แล้ว กรุณาเข้าสู่ระบบ');
        window.location.href = 'login.php';
    </script>";
} else {
    // เพิ่มสมาชิกใหม่
    $sql_insert_member = "INSERT INTO members (member_name, member_number, member_password, member_year, member_status) VALUES (?, ?, ?, ?, ?)";
    $stmt = $condb->prepare($sql_insert_member);
    $status = 1; // สถานะสมาชิก
    $stmt->bind_param("ssssi", $fullname, $username, $password, $year, $status);

    if ($stmt->execute()) {
        echo "<script>
            alert('สมัครสมาชิกสำเร็จ');
            window.location.href = 'login.php';
        </script>";
    } else {
        echo "<script>
            alert('เกิดข้อผิดพลาด กรุณาลองใหม่อีกครั้ง');
            window.location.href = 'register.php';
        </script>";
    }
}

// ปิดการเชื่อมต่อฐานข้อมูล
$stmt->close();
$condb->close();
?>
