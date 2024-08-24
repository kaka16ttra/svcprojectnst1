

<?php
    // รับค่าจาก POST
    $news_week = $_POST["news_week"];
    $news_detail = $_POST["news_detail"];
    $news_detailin = $_POST["news_detailin"];
    $news_pic = $_POST["news_pic"];
    $news_pic1 = $_POST["news_pic1"];
    $news_pic2 = $_POST["news_pic2"];
    $news_pic3 = $_POST["news_pic3"];

    // เชื่อมต่อฐานข้อมูล
    $conndb = new mysqli("127.0.0.1", "root", "12345678", "project1");

    // ตรวจสอบการเชื่อมต่อฐานข้อมูล
    if ($conndb->connect_error) {
        die("Connection failed: " . $conndb->connect_error);
    }

    // เตรียมคำสั่ง SQL ด้วยการป้องกัน SQL Injection
    $stmt = $conndb->prepare("INSERT INTO news (news_week, news_detail, news_detailin, news_pic, news_pic1, news_pic2, news_pic3) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $news_week, $news_detail, $news_detailin, $news_pic, $news_pic1, $news_pic2, $news_pic3);

    // ดำเนินการคำสั่ง SQL
    if($stmt->execute()){
?>
<script>
alert("เพิ่มข้อมูลสำเร็จ");
window.location.href="edit_news.php";
</script>
<?php
    }else{
?>
<script>
alert("ล้มเหลว: <?php echo $stmt->error; ?>");
window.location.href="news2.php";
</script>
<?php
    }

    // ปิดการเชื่อมต่อฐานข้อมูล
    $stmt->close();
    $conndb->close();
?>
