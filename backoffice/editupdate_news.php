<?php
     session_start();
     if(!isset($_SESSION['user'])){
?>  
   <script>
        alert("กรุณาเข้าสู่ระบบ");
        window.location.href="../login.php";
   </script>
<?php  
    }else{
      $conndb=new mysqli("127.0.0.1","root","12345678","project1");
    $news_week = $_POST["news_week"];
    $news_detail = $_POST["news_detail"];
    $news_detailin = $_POST["news_detailin"];
    $news_pic1 = $_POST["news_pic1"];
    $news_pic2 = $_POST["news_pic2"];
    $news_pic3 = $_POST["news_pic3"];

      $sql_update = "
      update news set news_week = '$news_week',news_detail = '$news_detail',news_detail = '$news_detail',news_detailin = '$news_detailin',news_pic = '$news_pic',news_pic1 = '$news_pic1',news_pic2 = '$news_pic2',news_pic3 = '$news_pic3' where news_id ='$news_id'";

       if($conndb->query($sql_update)==true){
         ?>  
    <script>
       alert("แก้ไขข้อมูลสำเร็จ");
       window.location.href="edit_news.php";
    </script>
<?php  
       }else{
?>  
    <script>
       alert("ล้มเหลว");
       window.location.href="edit_news.php";
    </script>
<?php  
    }
}
?>