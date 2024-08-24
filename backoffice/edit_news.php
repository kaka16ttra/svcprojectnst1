<?php include("tem/header.php");?>
<br>
<div class="container">
    <div class="row">
    <a href="news2.php" type="button" class="btn btn-primary">เพิ่มข้อมูลหน้าหลัก</a>
    </div>
    <br>
    <div class="row">
        <table class="table-hover table-bordered" border="2">
        <thead align="center" bgcolor="#009900" >
            <td width="10">ลำดับที่</td>
            <td width="20">สัปดาห์</td>
            <td width="70">รายละเอียด</td>
            <td width="100">รายละเอียดภายในป็อปอัพ</td>
            <td width="100">รูป</td>
            <td width="100">รูปภายในป็อปอัพ1</td>
            <td width="100">รูปภายในป็อปอัพ2</td>
            <td width="100">รูปภายในป็อปอัพ3</td>
            <td width="70">เครื่องมือ</td>
        </thead>
        
<?php
    $conndb=new mysqli("127.0.0.1","root","12345678","project1");
    $sql_select_news="SELECT * FROM news";
    $rs_news=$conndb->query($sql_select_news);
    if($rs_news->num_rows==0){
?>
    <tr>
        <td colspan="9">
            <div class="alert alert-primary" role="alert" align="center">
            ไม่มีข้อมูลในฐานข้อมูล
            </div>
        </td>
    </tr>
<?php
    }else{
        foreach($rs_news as $data_news){
            $news_id=$data_news["news_id"];
            $news_week=$data_news["news_week"];
            $news_detail=$data_news["news_detail"];
            $news_detailin=$data_news["news_detailin"];
            $news_pic=$data_news["news_pic"];
            $news_pic1=$data_news["news_pic1"];
            $news_pic2=$data_news["news_pic2"];
            $news_pic3=$data_news["news_pic3"];
            $no++
?>
        <tr>
            <td align="center"><?php echo $no;?></td>
            <td align="center"><?php echo $news_week;?></td>
            <td align="center"><?php echo $news_detail;?></td>
            <td align="center"><?php echo $news_detailin;?></td>
            <td><img src="img/<?php echo $news_pic;?>"class="d-block w-100"></td>
            <td><img src="img/<?php echo $news_pic1;?>"class="d-block w-100"></td>
            <td><img src="img/<?php echo $news_pic2;?>"class="d-block w-100"></td>
            <td><img src="img/<?php echo $news_pic3;?>"class="d-block w-100"></td>
            <td align="center">
               <a href="del_news.php?news_id=<?php echo  $news_id;?>" onclick="return confirm('คุณต้องการลบใช่หรือไม่')" class="btn btn-outline-danger">ลบ</a>
               <a href="formedit_news.php?news_id=<?php echo  $news_id;?>" class="btn btn-outline-warning">แก้ไข</a>
            </td>
        </tr>
<?php
        }
    }
?>
        </table>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
