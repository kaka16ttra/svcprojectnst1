<?php
include("tem/header.php");

$id = isset($_GET["id"]) ? intval($_GET["id"]) : 0;

if ($id <= 0) {
    die("Invalid ID");
}

$conndb = new mysqli("127.0.0.1", "root", "12345678", "project1");

// ตรวจสอบการเชื่อมต่อฐานข้อมูล
if ($conndb->connect_error) {
    die("Connection failed: " . $conndb->connect_error);
}

// ดึงข้อมูลการเช็คชื่อที่ต้องการแก้ไข
$sql_select_member_for_edit = "SELECT * FROM attendance1 WHERE member_id = ? AND attendance_date = ?";
$stmt = $conndb->prepare($sql_select_member_for_edit);
if ($stmt === false) {
    die("Prepare failed: " . $conndb->error);
}

$attendance_date = isset($_GET["date"]) ? $_GET["date"] : '';

$stmt->bind_param('is', $id, $attendance_date);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    die("Record not found");
}

$data_member = $result->fetch_assoc();
$id = htmlspecialchars($data_member["member_id"]);
$status_attendance = htmlspecialchars($data_member["status_attendance"]);
$attendance_date = htmlspecialchars($data_member["attendance_date"]);

$stmt->close();
$conndb->close();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Attendance</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Sarabun', sans-serif;
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <h1 class="text-center">แก้ไขข้อมูลการเช็คชื่อ</h1>
        <form method="POST" action="editupdate_attendance1.php">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">
            <input type="hidden" name="attendance_date" value="<?php echo htmlspecialchars($attendance_date); ?>">
            <div class="mb-3">
                <label class="form-label">สถานะ</label><br>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="status_attendance" id="present" value="มาเรียน" <?php if ($status_attendance === 'มาเรียน') echo 'checked'; ?> required>
                    <label class="form-check-label" for="present">มาเรียน</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="status_attendance" id="absent" value="ขาดเรียน" <?php if ($status_attendance === 'ขาดเรียน') echo 'checked'; ?>>
                    <label class="form-check-label" for="absent">ขาดเรียน</label>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">บันทึก</button>
            <a href="record_attendance1.php" class="btn btn-secondary">ยกเลิก</a>
        </form>
    </div>
</body>
</html>
