<h3>Введите свои данные:</h3>
<form class="logform" name="registration" action="<?php echo core_route::$path; ?>/account/registration" method="post">
    <div class="registrationLabelDiv">
        <label for="registrationNickname">Ник:</label>
        <label for="registrationPassword">Пароль:</label>
        <label for="registrationPassword2">Повторите пароль:</label>
        <label for="registrationEmail">Электронный адресс:</label>
    </div>
    <div class="registrationInputDiv">
        <input id="registrationNickname" class="registrationInput" type="text" name="registrationNickname"
                <?php if (isset($_POST['registrationNickname'])) echo " value='" . $_POST['registrationNickname'] . "'";?>/>
        <input id="registrationPassword" class="registrationInput" type="password" name="registrationPassword"
                <?php if (isset($_POST['registrationPassword'])) echo " value='" . $_POST['registrationPassword'] . "'";?>/>
        <input id="registrationPassword2" class="registrationInput" type="password" name="registrationPassword2"
                <?php if (isset($_POST['registrationPassword2'])) echo " value='" . $_POST['registrationPassword2'] . "'";?>/>
        <input id="registrationEmail" class="registrationInput" type="text" name="registrationEmail"
                <?php if (isset($_POST['registrationEmail'])) echo " value='" . $_POST['registrationEmail'] . "'";?>/>
    </div>
    <div class="clear">
    </div>
    <input class="submit" type="submit" name="submit" value="Вход"/>
</form>


 
