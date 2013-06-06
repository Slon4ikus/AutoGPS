<button id="addNewAboutInfoButton" onclick="resetAndShowDialog('aboutInfoForm','aboutInfoDialog');
                                            makeDialogTitle('aboutInfoDialog', 'Добавить информацию')">
    Добавить инфо &ldquo;О нас&rdquo;
</button>
<div class="clear">
</div>
<div id="aboutInfoDialog">
    <p class="errorMessage"></p>

    <form id="aboutInfoForm" class="editAboutInfoForm" name="aboutInfoForm"
          action="<?php echo core_route::$path;?>/about/adminAddItem"
          onsubmit="return checkAboutInfoForm()" method="post">
        <input id="newAboutInfoId" name="newAboutInfoId" type="hidden">

        <div class="editAboutInfoContentDiv editAboutInfoDiv">
            <label for="newAboutInfoContent">Содержание:</label>
            <textarea id="newAboutInfoContent" class="editAboutInfoTextArea" name="newAboutInfoContent"></textarea>

            <div class="clear">
            </div>
        </div>
        <div class="editAboutInfoTypeDiv editAboutInfoDiv">
            <label for="newAboutInfoType">Тип:</label>
            <select id="newAboutInfoType" class="editAboutInfoSelect" name="newAboutInfoType" size='1'>
                <?php
                    foreach ($data['infoTypes'] as $infoType) {
                echo "<option value=" . $infoType['name'] . ">" . $infoType['name'] . "</option>";
            }
                ?>
            </select>

            <div class="clear">
            </div>
        </div>
        <div class="editAboutInfoDiv">
            <label for="newAboutInfoOrder">Порядок:</label>
            <input id="newAboutInfoOrder" class="editAboutInfoInput" name="newAboutInfoOrder" value="1">
        </div>
        <div class="editAboutInfoDiv">
            <label for="newAboutInfoEnabled">Показывать:</label>
            <select id="newAboutInfoEnabled" class="editAboutInfoSelect" name="newAboutInfoEnabled" size='1'>
                <option value='1'>Да</option>
                <option value='0'>Нет</option>
            </select>
        </div>
        <div class="editAboutInfoDiv">
            <label for="newAboutInfoClass">Класс:</label>
            <input id="newAboutInfoClass" class="editAboutInfoInput" name="newAboutInfoClass" value="someInfo">
        </div>
        <input class="saveButton" type="submit" name="saveButton" value="Save"/>
        <button type='button' class="cancelCloseDialog" onclick="closeDialog('aboutInfoDialog')">Cancel</button>
        <div class="clear">
        </div>
    </form>
</div>
<script>
    addDialog('aboutInfoDialog');
</script>


<h2 class="infoStatus">Enabled:</h2>
<table class="aboutTable">
    <thead>
    <tr>
        <td>info type</td>
        <td></td>
        <td>id</td>
        <td>content</td>
        <td>order</td>
        <td>class</td>
    </tr>
    </thead>
    <tbody>
                <?php
                       foreach ($data['infoTypes'] as $infoType) {
                    echo "<tr><td class='infoType'>" . $infoType['name'] . "</td></tr>";
                    if (empty($data['enabled'][$infoType['name']])) {
                        echo "<tr><td></td><td class='noInfo'>None</td></tr>";
                    }
                    else {
                        foreach ($data['enabled'][$infoType['name']] as $info) {

                            echo "<tr class='rowInfo'>
                              <td></td><td></td>
                              <td>" . $info['id'] . "</td>
                              <td>" . $info['content'] . "</td>
                              <td>" . $info['order'] . "</td>
                              <td>" . $info['class'] . "</td>
                              <td>
                                <button class='changeInfoButton' onclick=\"
                                makeDialogTitle('aboutInfoDialog', 'Изменить информацию');
                                resetAndShowDialog('aboutInfoForm','aboutInfoDialog');
                                makeAboutInfoValues(
                                    '" . $info['id'] . "',
                                    '" . $info['content'] . "',
                                    '" . $info['type'] . "',
                                    '" . $info['order'] . "',
                                    '" . $info['enabled'] . "',
                                    '" . $info['class'] . "'
                                );
                                changeFormAction('aboutInfoForm','adminChangeItem')
                                \">Change</button>
                              </td>
                              <td>
                                <a class='deleteInfoButton' href='" . core_route::$path . "/about/adminDeleteItem/id/" . $info['id']
                                 . "' onclick=\"return confirm('Are you sure you want to delete: "
                                 . $info['id'] . " info?')\">Delete</a>
                              </td>
                              <td></td></tr>";
                        }
                    }
                }
                ?>
    </tbody>
</table>
<div class="divForBorder">
</div>
<h2 class="infoStatus">Disabled:</h2>
<table class="aboutTable">
    <thead>
    <tr>
        <td>info type</td>
        <td></td>
        <td>id</td>
        <td>content</td>
        <td>order</td>
        <td>class</td>
    </tr>
    </thead>
    <tbody>
                <?php
                       foreach ($data['infoTypes'] as $infoType) {
                    echo "<tr><td class='infoType'>" . $infoType['name'] . "</td></tr>";
                    if (empty($data['disabled'][$infoType['name']])) {
                        echo "<tr><td></td><td class='noInfo'>None</td></tr>";
                    }
                    else {
                        foreach ($data['disabled'][$infoType['name']] as $info) {

                            echo "<tr class='rowInfo'>
                              <td></td><td></td>
                              <td>" . $info['id'] . "</td>
                              <td>" . $info['content'] . "</td>
                              <td>" . $info['order'] . "</td>
                              <td>" . $info['class'] . "</td>
                              <td>
                                <button class='changeInfoButton' onclick=\"
                                resetAndShowDialog('aboutInfoForm','aboutInfoDialog');
                                makeAboutInfoValues(
                                    '" . $info['id'] . "',
                                    '" . $info['content'] . "',
                                    '" . $info['type'] . "',
                                    '" . $info['order'] . "',
                                    '" . $info['enabled'] . "',
                                    '" . $info['class'] . "'
                                );
                                changeFormAction('aboutInfoForm','adminChangeItem')
                                \">Change</button>
                              </td>
                              <td>
                                <a class='deleteInfoButton' href='" . core_route::$path . "/about/adminDeleteItem/id/" . $info['id']
                                 . "' onclick=\"return confirm('Are you sure you want to delete: "
                                 . $info['id'] . " info?')\">Delete</a>
                              </td>
                              </tr>";
                        }
                    }
                }
                ?>
    </tbody>
</table>


