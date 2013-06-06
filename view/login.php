<h3>Введите свои данные:</h3>
    <form class="loginform" name = "login" action = "<?php echo core_route::$path; ?>/admin/index" method="post">
        <div class="loginLabelDiv">
            <label for="loginNickname">Ник:</label>
            <label for="loginPassword">Пароль:</label>
        </div>
        <div class="loginInputDiv">
            <input id="loginNickname" class="loginInput" type = "text" name="username" value=""/>
            <input id="loginPassword" class="loginInput" type = "password" name="password" value=""/>
        </div>
        <div class="clear">
        </div>
        <input class="submit" type = "submit" name="submit" value="Вход" class="submit"/>
    </form>
 
