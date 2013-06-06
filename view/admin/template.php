<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
        "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <meta http-equiv="content-type"
          content="text/html;charset=utf-8">
    <link rel="stylesheet" type="text/css" href="<?php echo core_route::$path; ?>/css/reset.css">
    <link rel="stylesheet" type="text/css" href="<?php echo core_route::$path; ?>/css/adminStyle.css">

    <link rel="stylesheet" href="http://code.jquery.com/ui/1.8.18/themes/base/jquery-ui.css" type="text/css"
          media="all"/>

    <script type="text/javascript" src="<?php echo core_route::$path; ?>/js/jquery-1.7.1.min.js"></script>
    <script src="http://code.jquery.com/ui/1.8.18/jquery-ui.min.js"></script>

    <script type="text/javascript" src="<?php echo core_route::$path; ?>/js/adminScript.js"></script>
    <title>Auto GPS</title>
    <script type="text/javascript">

    </script>
</head>
<body>
<div class="headerContainer">
    <div class="header">
        <h1 class="welcomeAdmin">Панель админа</h1>
         <div class="logout">
            <a href="<?php echo core_route::$path . "/admin/logout"?>">Выйти</a>
        </div>
        <div class="clear">
        </div>
        <div class="navigation">
            <a href="<?php echo core_route::$path . "/about/adminShow"?>">О нас</a>
            <a href="<?php echo core_route::$path . "/brands/adminList"?>">Бренды</a>
            <a href="<?php echo core_route::$path . "/admin/account"?>">Аккаунт</a>
            <div class="clear">
            </div>
        </div>
        <div class="clear">
        </div>
    </div>
</div>
<div class="content">
    <div class="systemMessageDiv">
        <p class="systemMessage">
            <?php
                                        if (isset($_SESSION['message'])) {
            echo $_SESSION['message']['type'] . ": " . $_SESSION['message']['text'];
            unset($_SESSION['message']);
        }
            ?>
        </p>
    </div>
    <?php include 'view/' . $content; ?>
</div>


</div>
</body>
</html>
