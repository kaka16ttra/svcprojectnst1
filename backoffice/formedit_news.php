<?php include("tem/header.php");
      $news_id = $_GET["news_id"];
      $conndb=new mysqli("127.0.0.1","root","12345678","project1");
      $sql_select_news_for_edit ="SELECT * from news where news_id='$news_id'";
      $rs_select_news=$conndb->query($sql_select_news_for_edit);
      foreach($rs_select_news as $data_news){
        $news_id=$data_news["news_id"];
        $news_week=$data_news["news_week"];
        $news_detail=$data_news["news_detail"];
        $news_detailin=$data_news["news_detailin"];
        $news_pic=$data_news["news_pic"];
        $news_pic1=$data_news["news_pic1"];
        $news_pic2=$data_news["news_pic2"];
        $news_pic3=$data_news["news_pic3"];

      }
?>
<br>
<div class="container">
    <div class="row">
    </div>
    <div class="row">
    <div class="col-12">
        <form action="editupdate_news.php" method="post">
            <input type="hidden" name="news_id" value="<?php echo $news_id;?>">
            <input type="text" class="form-control" name="news_week" required placeholder="ระบุสัปดาห์ที่ *สัปดาห์ที่ ตามด้วยเลข*">
<hr>
<input type="text" class="form-control" name="news_detail" required placeholder="ระบุรายละเอียดของห้วงวัน">
<hr>
<input type="text" class="form-control" name="news_detailin" required placeholder="ระบุรายละเอียดภายในป็อปอัพ">
<hr>
<input type="text" class="form-control" name="news_pic" required placeholder="ระบุชื่อไฟล์รูปภาพ">
<hr>
<input type="text" class="form-control" name="news_pic1" required placeholder="ระบุชื่อไฟล์รูปภาพภายในป็อปอัพ1">
<hr>
<input type="text" class="form-control" name="news_pic2" required placeholder="ระบุชื่อไฟล์รูปภาพภายในป็อปอัพ2">
<hr>
<input type="text" class="form-control" name="news_pic3" required placeholder="ระบุชื่อไฟล์รูปภาพภายในป็อปอัพ3">
<br>
            <button type="submit" class="btn btn-outline-info">บันทึก</button>
            <a href="edit_news.php"class="btn btn-outline-danger">ยกเลิก</a>
        </form>
    </div>
    </div>
</div>