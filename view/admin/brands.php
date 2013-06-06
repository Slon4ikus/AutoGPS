<select id="selectBrand" name="selectBrand" size='1'
        onchange="window.location = this.options[this.selectedIndex].value">
    <?php
            foreach ($data['brands'] as $brand)
    echo "<option value='" . core_route::$path . "/brands/adminList/brandName/" . $brand['name'] . "'>"
         . $brand['name'] . "</option>";
    ?>
</select>
<script type="text/javascript">
    makeSelectedElement('selectBrand', '<?php if (isset($data['brandInfo'][0]['name']))
        echo $data['brandInfo'][0]['name'] ?>');
</script>
<button id="addNewBrandInfoButton" onclick="changeFormAction('addNewBrandInfoForm','adminAddBrand')
                                           resetAndShowDialog('addNewBrandInfoForm','brandInfoDialog')
                                           makeDialogTitle('aboutInfoDialog', 'Добавить бренд')">Добавить бренд
</button>
<div id="brandInfoDialog" title="Добавить бренд">
    <p class="errorMessage"></p>

    <form id="addNewBrandInfoForm" class="editBrandInfoForm" name="addNewBrandInfoForm"
          action="<?php echo core_route::$path;?>/brands/adminAddBrand"
          onsubmit="return checkBrandInfoForm('<?php echo core_route::$path . "/brands/checkForDuplicate"; ?>')"
          method="post">
        <input id="newBrandInfoNameOld" class="editBrandInfoInput" name="newBrandInfoNameOld" type="hidden" value="">

        <div class="editBrandInfoDiv">
            <label for="newBrandInfoName">Название</label>
            <input id="newBrandInfoName" class="editBrandInfoInput" name="newBrandInfoName" value="">
        </div>
        <div class="editBrandInfoDiv">
            <label for="newBrandInfoPictureUrl">Url картинки</label>
            <input id="newBrandInfoPictureUrl" class="editBrandInfoInput" name="newBrandInfoPictureUrl" value="default">
        </div>
        <input class="saveButton" type="submit" name="saveButton" value="Save"/>
        <button type='button' class="cancelCloseDialog" onclick="closeDialog('brandInfoDialog')">Cancel</button>
        <div class="clear">
        </div>
    </form>
</div>
<script>
    addDialog('brandInfoDialog');
</script>

<div id="textInfoDialog">
    <p class="errorMessage"></p>

    <form id="textInfoForm" class="dialogForm" name="textInfoForm"
          action="<?php echo core_route::$path;?>/info/adminAddItem"
          onsubmit="return checkTextInfoForm()" method="post">
        <input id="textInfoId" name="textInfoId" type="hidden" value="">
        <input id="textInfoBrand" name="textInfoBrand" type="hidden"
               value="<?php echo $data['brandInfo'][0]['name'] ?>">
        <input id="textInfoCategory" class="dialogFormSelect" name="textInfoCategory" type="hidden" value="">

        <div class="dialogFormDiv">
            <label for="textInfoContent">Содержание:</label>
            <textarea id="textInfoContent" class="dialogFormTextArea" name="textInfoContent"></textarea>

            <div class="clear">
            </div>
        </div>

        <div class="dialogFormDiv">
            <label for="textInfoType">Тип:</label>
            <select id="textInfoType" class="dialogFormSelect" name="textInfoType" size='1'>
    <?php
                        foreach ($data['infoTypes'] as $infoType) {
        echo "<option value=" . $infoType['name'] . ">" . $infoType['name'] . "</option>";
    }
        ?>
            </select>

            <div class="clear">
            </div>
        </div>
        <div class="dialogFormDiv">
            <label for="textInfoOrder">Порядок:</label>
            <input id="textInfoOrder" class="dialogFormInput" name="textInfoOrder" value="1">
        </div>
        <div class="dialogFormDiv">
            <label for="textInfoEnabled">Показывать:</label>
            <select id="textInfoEnabled" class="dialogFormSelect" name="textInfoEnabled" size='1'>
                <option value='1'>Да</option>
                <option value='0'>Нет</option>
            </select>
        </div>
        <div class="dialogFormDiv">
            <label for="textInfoClass">Класс:</label>
            <input id="textInfoClass" class="dialogFormInput" name="textInfoClass" value="someInfo">
        </div>
        <input class="saveButton" type="submit" name="saveButton" value="Save"/>
        <button type='button' class="cancelCloseDialog" onclick="closeDialog('textInfoDialog')">Cancel</button>
        <div class="clear">
        </div>
    </form>
</div>
<script>
    addDialog('textInfoDialog');
</script>

<table class="brandInfoTable">
    <thead>
    <tr>
        <td>Name</td>
        <td>Picture url</td>
    </tr>
    </thead>
    <tbody>
    <tr>

        <td> <?php echo $data['brandInfo'][0]['name'] ?> </td>
        <td><?php echo $data['brandInfo'][0]['pictureUrl'] ?> </td>
        <td>
            <button id='changeBrandInfoButton' class="changeInfoButton" onclick="
                    makeDialogTitle('brandInfoDialog', 'Изменить информацию');
                    resetAndShowDialog('addNewBrandInfoForm','brandInfoDialog');
                    makeBrandInfoValues('<?php echo addslashes($data['brandInfo'][0]['name']); ?>',
                    '<?php echo $data['brandInfo'][0]['pictureUrl']; ?>');
                    changeFormAction('addNewBrandInfoForm','adminChangeBrand')
                    ">Change
            </button>
        </td>

        <td>
            <a class="deleteInfoButton"
               href="<?php echo core_route::$path . "/brands/adminDeleteBrand/name/" . $data['brandInfo'][0]['name'];?>"
               onclick="return confirm('Are you sure you want to delete:  <?php echo addslashes($data['brandInfo'][0]['name']);?> brand? ALL DATA RELATED TO THIS BRAND WILL BE DELETED AS WELL!!!')">Delete</a>
        </td>


    </tr>
    </tbody>
</table>

    <?php
        foreach ($data['categories'] as $category) {
    echo "<div class='categoryInfoHead'>
                  <p class='category'>" . $category['name'] . "</p>
                        status:
                        <span id='status" . $category['name'] . "'class='brandStatus'>"
         . ($data['existingCategories'][$category['name']] == 1 ? 'enabled' : 'disabled')
         . "</span>
                  <button class='changeInfoButton' onclick=\"changeCategoryState(
                                    '" . addslashes($data['brandInfo'][0]['name'] ) . "',
                                    '" . $category['name'] . "',
                                    '" . core_route::$path . "/brandCategory/adminChangeState" . "')
                            \">Change state
                  </button>
                  <button class='addInfoButton' onclick=\"
                                            changeFormAction('textInfoForm','adminAddItem')
                                            resetAndShowDialog('textInfoForm','textInfoDialog');
                                            makeDialogTitle('textInfoDialog', 'Добавить информацию')
                                            assignFormValue('" . addslashes($category['name'] ) . "','textInfoCategory')\">
                                Добавить информацию
                  </button>
            </div>
            <table class='infoTable'>
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
                    <tr><td><span class='infoStatus'>Enabled:</span></tr><td>";

    foreach ($data['infoTypes'] as $infoType) {
        echo "<tr><td class='infoType'>" . $infoType['name'] . "</tr></td>";
        if (empty($data['textInfo']['enabled'][$category['name']][$infoType['name']]))
            echo "<tr><td></td><td class='noInfo'>None</td></tr>";
        else
            foreach ($data['textInfo']['enabled'][$category['name']][$infoType['name']] as $info) {
                echo "<tr class='rowInfo'>
                              <td></td><td></td>
                              <td>" . $info['id'] . "</td>
                              <td>" . $info['info'] . "</td>
                              <td>" . $info['order'] . "</td>
                              <td>" . $info['class'] . "</td>
                              <td>
                                <button class='changeInfoButton' onclick=\"
                                makeDialogTitle('textInfoDialog', 'Изменить информацию')
                                resetAndShowDialog('textInfoForm','textInfoDialog');
                                makeTextInfoValues(
                                    '" . $info['id'] . "',
                                    '" . addslashes($info['info']) . "',
                                    '" . $info['type'] . "',
                                    '" . $info['order'] . "',
                                    '" . $info['enabled'] . "',
                                    '" . addslashes($info['class']) . "'
                                );
                                changeFormAction('textInfoForm','adminChangeItem')
                               \">Change</button>
                               </td>
                               <td>
                                <a class='deleteInfoButton' href='" . core_route::$path . "/info/adminDeleteItem/id/" . $info['id']
                     . "/brand/" . $data['brandInfo'][0]['name']
                     . "' onclick=\"return confirm('Are you sure you want to delete: "
                     . $info['id'] . " info?')\">Delete</a>
                              </td>
                               </tr>";
            }
    }
    echo "<tr><td><span class='infoStatus'>Disabled:</span></tr><td>";
    foreach ($data['infoTypes'] as $infoType) {
        echo "<tr><td class='infoType'>" . $infoType['name'] . "</tr></td>";
        if (empty($data['textInfo']['disabled'][$category['name']][$infoType['name']]))
            echo "<tr><td></td><td class='noInfo'>None</td></tr>";
        else
            foreach ($data['textInfo']['disabled'][$category['name']][$infoType['name']] as $info) {
                echo "<tr class='rowInfo'>
                              <td></td><td></td>
                              <td>" . $info['id'] . "</td>
                              <td>" . $info['info'] . "</td>
                              <td>" . $info['order'] . "</td>
                              <td>" . $info['class'] . "</td>
                              <td>
                                <button class='changeInfoButton' onclick=\"
                                makeDialogTitle('textInfoDialog', 'Изменить информацию')
                                resetAndShowDialog('textInfoForm','textInfoDialog');
                                makeTextInfoValues(
                                    '" . $info['id'] . "',
                                    '" . addslashes($info['info']) . "',
                                    '" . $info['type'] . "',
                                    '" . $info['order'] . "',
                                    '" . $info['enabled'] . "',
                                    '" . addslashes($info['class']) . "'
                                );
                                changeFormAction('textInfoForm','adminChangeItem')
                               \">Change</button>
                               </td>
                               <td>
                                <a class='deleteInfoButton' href='" . core_route::$path . "/info/adminDeleteItem/id/" . $info['id']
                     . "/brand/" . $data['brandInfo'][0]['name']
                     . "' onclick=\"return confirm('Are you sure you want to delete: "
                     . $info['id'] . " info?')\">Delete</a>
                              </td>
                               </tr>";
            }
    }


    echo"</tbody>
         </table><div class='divForBorder'></div>";
}
?>
<script>
    brandStatusColor();
</script>