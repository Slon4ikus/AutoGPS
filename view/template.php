<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
        "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <meta http-equiv="content-type"
          content="text/html;charset=utf-8">
    <link href='http://fonts.googleapis.com/css?family=Roboto+Slab:400,700,300&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="<?php echo core_route::$path; ?>/css/reset.css">
    <link rel="stylesheet" type="text/css" href="<?php echo core_route::$path; ?>/css/style.css">
    <title>Auto GPS</title>
</head>
<body>
<div class="mainContainer">
    <div class="header">
        <div class="headerContent">
            <a class="logo" href="<?php echo core_route::$path . "/about"?>"></a>
        </div>
        <div class="headerPhone">
            <div class="phone">
                <span class="numberFirstPart">+371</span>
                <span class="numberSecondPart">26-510-409</span>
            </div>
        </div>
        <div class="clear">
        </div>
        <div class="navigation">
            <a href="<?php echo core_route::$path . "/about"?>">О нас</a>
            <a href="<?php echo core_route::$path . "/brands/GpsList"?>">Навигация</a>
            <a href="<?php echo core_route::$path . "/brands/russificationList"?>">Руссификация</a>
            <a href="<?php echo core_route::$path . "/brands/otherList"?>">Дополнительные возможности</a>
            <a href="<?php echo core_route::$path . "/contacts"?>">Контакты</a>
            <div class="clear">
            </div>
        </div>
    </div>

    <div class="content">
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

    <div class="footer">
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
