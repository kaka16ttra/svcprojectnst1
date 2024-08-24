<?php include("tem/header.php");?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ข่าวสารล่าสุด</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Sarabun:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800&display=swap');
        body {
            background-color: #f4f4f9;
            color: #333;
            font-family: "Sarabun", sans-serif;
        }
        .card {
            margin-top: 10px;
            border: none;
            border-radius: 0.5rem;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease; /* Added transition for smooth effect */
        }
        .card:hover {
            transform: translateY(-10px); /* Moves the card up slightly */
            box-shadow: 0 4px 20px rgba(0,0,0,0.2); /* Enhanced shadow effect */
        }
        .card-img-top {

            border-top-left-radius: 1rem;
            border-top-right-radius: 1rem;
        }
        .footer {
            background-color: #007bff;
            color: #fff;
            padding: 1rem 0;
        }
        .footer a {
            color: #fff;
            text-decoration: none;
        }
        .carousel-item img {
            width: 100%;
            height: auto;
            padding: 5%;
        }
        .mt-3{
            text-align: center;
        }
        .mt-4{
            margin-left: 20px;
        }
        .container:hover{
            color: green;
            transition: 0.5s;
        }
        .modal-footer{
            align: center;
        }
        header{

        }
    </style>
</head>
<body>
<header class="py-5 text-center bg-light">
    <div class="container">
        <h3 class="display-5">ข่าวสารนักศึกษาวิชาทหาร</h3>
        <p class="lead">วิทยาลัยอาชีวศึกษาสุราษฎร์ธานี</p>
    </div>
</header>

<?php
    $conndb = new mysqli("127.0.0.1","root","12345678","project1");
    $rs_news = $conndb->query("SELECT * FROM news");
?>

<main>
    <div class="container my-5">
        <div class="row">
            <?php foreach($rs_news as $datanews): ?>
                <?php
                    $news_id = $datanews["news_id"];
                    $news_week = $datanews["news_week"];
                    $news_detail = $datanews["news_detail"];
                    $news_detailin = $datanews["news_detailin"];
                    $news_pic = $datanews["news_pic"];
                    $news_pic1 = $datanews["news_pic1"];
                    $news_pic2 = $datanews["news_pic2"];
                    $news_pic3 = $datanews["news_pic3"];
                ?>
                <div class="col-md-3 mb-3">
                    <div class="card">
                        <img src="img/<?php echo $news_pic;?>" class="card-img-top" alt="News Image">
                        <div class="card-body">
                            <h6 class="card-title"><?php echo $news_week;?></h6>
                            <p class="card-text"><?php echo $news_detail;?></p>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal<?php echo $news_id;?>">อ่านเพิ่มเติม</button>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</main>

<?php foreach($rs_news as $datanews): ?>
    <?php
        $news_id = $datanews["news_id"];
        $news_week = $datanews["news_week"];
        $news_detailin = $datanews["news_detailin"];
        $news_pic1 = $datanews["news_pic1"];
        $news_pic2 = $datanews["news_pic2"];
        $news_pic3 = $datanews["news_pic3"];
    ?>
    <!-- Modal for each news item -->
    <div class="modal fade" id="modal<?php echo $news_id;?>" tabindex="-1" aria-labelledby="modal<?php echo $news_id;?>Label" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal<?php echo $news_id;?>Label"align="center"><?php echo $news_week;?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Carousel -->
                    <div id="carouselModal<?php echo $news_id;?>" class="carousel slide">
                        <div class="carousel-inner">
                            <?php if ($news_pic1): ?>
                                <div class="carousel-item active">
                                    <img src="img/<?php echo $news_pic1;?>" class="d-block w-100" alt="ภาพที่ 1">
                                </div>
                            <?php endif; ?>
                            <?php if ($news_pic2): ?>
                                <div class="carousel-item">
                                    <img src="img/<?php echo $news_pic2;?>" class="d-block w-100" alt="ภาพที่ 2">
                                </div>
                            <?php endif; ?>
                            <?php if ($news_pic3): ?>
                                <div class="carousel-item">
                                    <img src="img/<?php echo $news_pic3;?>" class="d-block w-100" alt="ภาพที่ 3">
                                </div>
                            <?php endif; ?>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselModal<?php echo $news_id;?>" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselModal<?php echo $news_id;?>" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                    <p class="mt-3"><?php echo $news_week;?></p>
                    <p class="mt-4"><?php echo $news_detailin;?></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">ปิด</button>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<br><br><br><br><br><br>
<footer class="footer text-center">
    <div class="container">
        <p class="mb-0">&copy; 2024 ข่าวสารล่าสุด. All Rights Reserved. <a href="#">Privacy Policy</a> | <a href="#">Terms of Service</a></p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
