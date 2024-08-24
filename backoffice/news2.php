<?php include("tem/header.php"); ?>
<br>
<div class="container">
<div class="row">
<div class="col-12">
    
<form action="news3.php" method="post">
<input type="text" class="form-control" name="news_week" required placeholder="ระบุสัปดาห์ที่ *สัปดาห์ที่ ตามด้วยเลข*">
<hr>
<input type="text" class="form-control" name="news_detail" required placeholder="ระบุรายละเอียดของห้วงวัน">
<hr>
<input type="text" class="form-control" name="news_detailin" required placeholder="ระบุรายละเอียดภายในป็อปอัพ">
<hr>
<input type="file" class="form-control" name="news_pic" required accept="img/*" placeholder="เลือกไฟล์รูปภาพ">
  <hr>
  <input type="file" class="form-control" name="news_pic1" required accept="img/*" placeholder="เลือกไฟล์รูปภาพภายในป็อปอัพ1">
  <hr>
  <input type="file" class="form-control" name="news_pic2" required accept="img/*" placeholder="เลือกไฟล์รูปภาพภายในป็อปอัพ2">
  <hr>
  <input type="file" class="form-control" name="news_pic3" required accept="img/*" placeholder="เลือกไฟล์รูปภาพภายในป็อปอัพ3">
<br>

            <button type="submit" class="btn btn-outline-success">บันทึก</button> 
            <button type="reset" class="btn btn-outline-danger">ล้างข้อมูล</button>
            <a  class="btn btn-outline-primary" href="edit_news.php">กลับไปยังหน้าแก้ไข</a>
</form>
</div>
</div>
</div>