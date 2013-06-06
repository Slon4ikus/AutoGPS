<p class='errorMessage'></p>
<h3>Введите свои данные:</h3>
    <form class="accountForm" name = "accountForm" action = "<?php echo core_route::$path; ?>/admin/changeAccount" method="post">
        <div class="accountFormDiv">
            <label for="oldNick">Старый ник:</label>
            <input id="oldNick" class="accountInput" type = "text" name="oldNick" value=""/>
        </div>
        <div class="accountFormDiv">
            <label for="oldPassword">Старый пароль:</label>
            <input id="oldPassword" class="accountInput" type = "password" name="oldPassword" value=""/>
        </div>
        <div class="accountFormDiv">
            <label for="newNick">Новый ник:</label>
            <input id="newNick" class="accountInput" type = "text" name="newNick" value=""/>
        </div>
        <div class="accountFormDiv">
            <label for="newPassword">Новый пароль:</label>
            <input id="newPassword" class="accountInput" type = "password" name="newPassword" value=""/>
        </div>
        <div class="accountFormDiv">
            <label for="newPassword2">Повторите пароль:</label>
            <input id="newPassword2" class="accountInput" type = "password" name="newPassword2" value=""/>
        </div>
        <input class="submit" type = "submit" name="submit" value="Сохранить" onclick="return checkAccountForm(
        '<?php echo core_route::$path;?>')"/>
    </form>


 
