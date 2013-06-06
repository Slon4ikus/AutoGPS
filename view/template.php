<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
        "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <meta http-equiv="content-type"
          content="text/html;charset=utf-8">
    <link href='http://fonts.googleapis.com/css?family=Roboto+Slab:400,700,300&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="<?php echo core_route::$path; ?>/css/reset.css">
    <link rel="stylesheet" type="text/css" href="<?php echo core_route::$path; ?>/css/style.css">
     <script type="text/javascript" src="<?php echo core_route::$path; ?>/js/jquery-1.7.1.min.js"></script>
    <script type="text/javascript" src="<?php echo core_route::$path; ?>/js/script.js"></script>
    <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyBBbeB0LQ6G6vHd6KKiQKHEs85gisJUMHc&sensor=false"></script>
    <title>Auto GPS</title>
</head>
<body>
    <div class="headerContainer">
    <div class="headerContainer2">
        <div class="headerContent">
            <div class="headerHat">
                <a class="logo" href="<?php echo core_route::$path . "/about"?>"></a>
            </div>
            <div class="headerPhone">
                    <span class="numberFirstPart">+371</span>
                    <span class="numberSecondPart">26-510-409</span>
            </div>
            <div id="headerSlider">
                <a class="hidden sliderImage" href="<?php echo core_route::$path;?>/brands/gpsList">
                    <img  src="<?php echo core_route::$path;?>/images/banner/gps.png" title="gps">
                </a>
                <a class="hidden sliderImage" href="<?php echo core_route::$path;?>//brands/russificationList">
                    <img src="<?php echo core_route::$path;?>/images/banner/russification.png" title="руссификация">
                </a>
                <a class="hidden sliderImage" href="<?php echo core_route::$path;?>//brands/otherList" title="возможности">
                    <img src="<?php echo core_route::$path;?>/images/banner/other.png">
                </a>
            </div>
            <h2 class="slogan">Навигационные карты, руссификация <br>
                                   и другие опции для вашего автомобиля!
            </h2>
            <div class="clear">
            </div>
            <div class="navigation">
                <a href="<?php echo core_route::$path . "/about"?>">О нас</a>
                <a href="<?php echo core_route::$path . "/brands/gpsList"?>">Навигация</a>
                <a href="<?php echo core_route::$path . "/brands/russificationList"?>">Руссификация</a>
                <a href="<?php echo core_route::$path . "/brands/otherList"?>">Дополнительные возможности</a>
                <a href="<?php echo core_route::$path . "/contacts/showContacts"?>">Контакты</a>
                <div class="clear">
                </div>
            </div>
        </div>
    </div>
    </div>

    <div class="mainContent">
        <div class="systemMessageDiv">
            <p class="systemMessage">
                <?php
                    if(isset($_SESSION['message']) ) {
                        echo $_SESSION['message']['type'] . ": ".$_SESSION['message']['text'];
                        unset($_SESSION['message']);
                    }
                ?>
            </p>
        </div>
        <?php include 'view/'.$content; ?>
    </div>

    <div class="footerContainer">
        <div class="footerContent">
            <div class="footerColumn">
                <ul>
                    <li>lorem ipsum</li>
                    <li>lorem ipsum</li>
                    <li>lorem ipsum</li>
                </ul>
            </div>
            <div class="footerColumn">
                <ul>
                    <li>lorem ipsum</li>
                    <li>lorem ipsum</li>
                    <li>lorem ipsum</li>
                </ul>
            </div>
            <div class="footerColumn">
                <ul>
                    <li>lorem ipsum</li>
                    <li>lorem ipsum</li>
                    <li>lorem ipsum</li>
                </ul>
            </div>
            <div class="clear">
            </div>
        </div>
    </div>


</body>
</html>
