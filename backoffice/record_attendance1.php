<?php include("tem/header.php"); ?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>View Attendance</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Sarabun', sans-serif;
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <h1 class="text-center">ดูข้อมูลการเช็คชื่อ</h1>
        <form method="POST" action="">
            <div class="mb-3">
                <label for="date" class="form-label">เลือกวันที่</label>
                <input type="date" class="form-control" id="date" name="date" value="<?php echo htmlspecialchars(isset($_POST['date']) ? $_POST['date'] : ''); ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">ค้นหา</button>
        </form>
        <table class="table table-bordered mt-4">
            <thead>
                <tr>
                    <th>วันที่</th>
                    <th>เลขประจำตัว</th>
                    <th>ชื่อสมาชิก</th>
                    <th>ชั้นปี</th>
                    <th>สถานะ</th>
                    <th>แก้ไข</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $conndb = new mysqli("127.0.0.1", "root", "12345678", "project1");

                // ตรวจสอบการเชื่อมต่อฐานข้อมูล
                if ($conndb->connect_error) {
                    die("Connection failed: " . $conndb->connect_error);
                }

                $selected_date = isset($_POST['date']) ? $_POST['date'] : '';

                // คำสั่ง SQL เพื่อดึงข้อมูลตามวันที่ที่เลือก
                $sql_select_attendance = "
                    SELECT m.id, m.member_name, m.member_number, m.member_year, a.attendance_date, a.status_attendance
                    FROM members m
                    JOIN attendance1 a ON m.id = a.member_id
                    WHERE a.attendance_date = ?
                    ORDER BY m.member_number
                ";

                $stmt = $conndb->prepare($sql_select_attendance);
                if ($stmt === false) {
                    die("Prepare failed: " . $conndb->error);
                }

                $stmt->bind_param('s', $selected_date);
                $stmt->execute();
                $rs_attendance = $stmt->get_result();

                if ($rs_attendance->num_rows == 0) {
                    echo '<tr><td colspan="6" class="text-center">ไม่มีข้อมูลการเช็คชื่อสำหรับวันที่นี้</td></tr>';
                } else {
                    while ($data_attendance = $rs_attendance->fetch_assoc()) {
                        $m_id = htmlspecialchars($data_attendance["id"]);
                        $member_name = htmlspecialchars($data_attendance["member_name"]);
                        $member_number = htmlspecialchars($data_attendance["member_number"]);
                        $member_year = htmlspecialchars($data_attendance["member_year"]);
                        $attendance_date = htmlspecialchars($data_attendance["attendance_date"]);
                        $status_attendance = htmlspecialchars($data_attendance["status_attendance"]);
                        ?>
                        <tr>
                            <td><?php echo $attendance_date; ?></td>
                            <td><?php echo $member_number; ?></td>
                            <td><?php echo $member_name; ?></td>
                            <td><?php echo $member_year; ?></td>
                            <td><?php echo $status_attendance; ?></td>
                            <td>
                                <a href="formedit_attendance1.php?id=<?php echo $m_id; ?>&date=<?php echo urlencode($attendance_date); ?>" class="btn btn-warning btn-sm">แก้ไข</a>
                                <a href="del_attendance1.php?id=<?php echo $m_id; ?>&date=<?php echo urlencode($attendance_date); ?>" onclick="return confirm('คุณต้องการลบใช่หรือไม่')" class="btn btn-outline-danger btn-sm">ลบ</a>
                            </td>
                        </tr>
                        <?php
                    }
                }

                // ปิดการเชื่อมต่อฐานข้อมูล
                $stmt->close();
                $conndb->close();
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
