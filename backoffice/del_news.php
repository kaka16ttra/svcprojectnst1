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
      $news_id = $_GET["news_id"];

      $conndb=new mysqli("127.0.0.1","root","12345678","project1");

      $sql_delete = "DELETE FROM news where news_id='$news_id'";

       if($conndb->query($sql_delete)==true){
         ?>  
    <script>
       alert("ลบข้อมูลสำเร็จ");
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