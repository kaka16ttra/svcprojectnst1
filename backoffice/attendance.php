<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("Location: login.php");
    exit();
}

include("tem/header.php");

// เชื่อมต่อฐานข้อมูล
$condb = new mysqli("127.0.0.1", "root", "12345678", "project1");

// ตรวจสอบการเชื่อมต่อ
if ($condb->connect_error) {
    die("Connection failed: " . $condb->connect_error);
}

// ดึงข้อมูลสมาชิกที่มี member_status = 1
$sql = "SELECT id, member_name, member_number FROM members WHERE member_year = 2 order by member_number";
$result = $condb->query($sql);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Attendance</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    body {
        font-family: 'Sarabun', sans-serif;
        background-image: url('https://wallpapercave.com/wp/wp2987010.jpg');
    }
    .wrapper {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 60vh;
        margin: 0;
        width: 100%;
    }
    .attendance-container {
        max-width: 800px;
        width: 100%;
        padding: 3rem;
        background: white;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    .attendance-item {
        display: flex;
        align-items: center;
        margin-bottom: 1rem;
        padding: 0.5rem;
        border-bottom: 1px solid #ddd;
    }
    .attendance-item h5 {
        margin: 0;
        margin-right: 1rem;
        flex: 1;
        font-size: 1rem;
    }
    .attendance-item .form-check {
        margin-right: 1rem;
        display: flex;
        align-items: center;
    }
    .form-check-input {
        margin-right: 0.5rem;
    }
    .form-check-label {
        margin-right: 1rem;
    }
</style>

</head>
<body>
    <div class="wrapper">
        <div class="attendance-container">
            <h1 class="text-center">เช็คเวลาเข้าเรียน</h1>
            <form action="insert_attendance.php" method="POST">
                <div class="mb-3">
                    <label for="date" class="form-label">วันที่</label>
                    <input type="date" class="form-control" id="date" name="date" required>
                </div>
                <?php if ($result->num_rows > 0): ?>
                    <div class="mb-3">
                        <label class="form-label">เลือกสถานะการเข้าชั้นเรียน</label><br><br>
                        <?php while ($row = $result->fetch_assoc()): ?>
                            <div class="attendance-item">
                                <h5 for="present_<?php echo $row['id']; ?>">
                                <?php echo htmlspecialchars($row['member_number']); ?>
                                    <?php echo htmlspecialchars($row['member_name']); ?>
                        </h5>&nbsp;&nbsp;&nbsp;
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="attendance[<?php echo $row['id']; ?>]" id="present_<?php echo $row['id']; ?>" value="มาเรียน" required>
                                    <label class="form-check-label" for="present_<?php echo $row['id']; ?>">
                                        มาเรียน
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="attendance[<?php echo $row['id']; ?>]" id="absent_<?php echo $row['id']; ?>" value="ขาดเรียน">
                                    <label class="form-check-label" for="absent_<?php echo $row['id']; ?>">
                                        ขาดเรียน
                                    </label>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>
                <?php else: ?>
                    <p class="text-center">ไม่มีสมาชิกที่สามารถเช็คชื่อได้ในขณะนี้</p>
                <?php endif; ?>
                <button type="submit" class="btn btn-primary">บันทึกเวลาเข้าเรียน</button>
            </form>
           
        </div>
    </div>
</body>
</html>
<?php
// ปิดการเชื่อมต่อฐานข้อมูล
$condb->close();
?>
