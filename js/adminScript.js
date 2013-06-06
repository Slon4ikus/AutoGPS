function addDialog(contentId) {
    $("#" + contentId).dialog({
        autoOpen: false,
        width: 'auto',
        beforeClose: function() {
            return confirm('Are you sure? All NEW data you entered will be deleted');
        }
    });
}

function makeDialogTitle(dialogId, title) {
    $("#" + dialogId).dialog({ title: "" + title });
}

function showDialog(contentId) {
    $("#" + contentId).dialog("open");
}

function closeDialog(contentId) {
    $("#" + contentId).dialog("close");
}

function resetForm(formId) {
    $("#" + formId).each(function() {
        this.reset();
    });
}

function resetAndShowDialog(formId, contentId) {
    resetForm(formId);
    setErrorMessage('');
    showDialog(contentId);
}

function checkAboutInfoForm() {
    var contentValue = $("#newAboutInfoContent").val();
    var orderValue = $("#newAboutInfoOrder").val();
    if (contentValue != '') {
        if (orderValue != '') {
            if (!isNaN(orderValue)) {
                if (orderValue > 0 && orderValue % 1 === 0)
                    return true;
                else
                    setErrorMessage("Поле \"" + $("label[for='newAboutInfoOrder']").html() + "\" должно быть положительным целым числом");
            }
            else
                setErrorMessage("Поле \"" + $("label[for='newAboutInfoOrder']").html() + "\" должно содержать только цифры");
        }
        else
            setErrorMessage("Поле \"" + $("label[for='newAboutInfoOrder']").html() + "\" не должно быть пусто");
    }
    else
        setErrorMessage("Поле \"" + $("label[for='newAboutInfoContent']").html() + "\" не должно быть пусто");
    return false;
}

function setErrorMessage(message) {
    $(".errorMessage").html(message);
}

function makeAboutInfoValues(info_id, info_content, info_type, info_order, info_enabled, info_class) {
    while (info_content.indexOf("<br />") != -1) {
        info_content = info_content.replace("<br />", "\n");
    }
    $("#newAboutInfoId").val(info_id);
    $("#newAboutInfoContent").val(info_content);
    $("#newAboutInfoType").val(info_type);
    $("#newAboutInfoOrder").val(info_order);
    $("#newAboutInfoEnabled").val(info_enabled);
    $("#newAboutInfoClass").val(info_class);
}

function changeFormAction(formId, newActionName) {
    var oldAction = $('#' + formId).get(0).getAttribute('action');
    var lastSymbPos = findLastCharacterPos(oldAction, '/');
    var newAction = oldAction.substr(0, lastSymbPos + 1) + newActionName;
    $('#' + formId).get(0).setAttribute('action', newAction);
}

function findLastCharacterPos(str, ch) {
    var pos = str.indexOf(ch, 0);
    var lastPos = pos;
    while (pos != -1) {
        lastPos = pos;
        pos = str.indexOf(ch, pos + 1);
    }
    return lastPos;
}

/* brands */ /* brands *//* brands *//* brands *//* brands *//* brands *//* brands *//* brands *//* brands */

function makeSelectedElement(selectId, selectedValue) { //  alert(selectedValue);
   $("#"+selectId+" option").filter(function() { return $(this).html() == ""+selectedValue; }).attr("selected", "selected");;
   //$("#" + selectId).find("option:contains('" + selectedValue + "')").attr("selected", "selected");

}

function makeBrandInfoValues(name, pictureUrl) {
    $("#newBrandInfoNameOld").val(name);
    $("#newBrandInfoName").val(name);
    $("#newBrandInfoPictureUrl").val(pictureUrl);
}

function checkBrandInfoForm(controllerUrl) {
    var nameOldValue = $("#newBrandInfoNameOld").val();
    var nameValue = $("#newBrandInfoName").val();
    var pictureUrlValue = $("#newBrandInfoPictureUrl").val();
    if (nameValue != '') {
        if (pictureUrlValue != '') {
            if(nameOldValue != nameValue) {
                xmlhttp = new XMLHttpRequest();
                xmlhttp.open("GET", controllerUrl + "/brand/" + nameValue, false);
                xmlhttp.send();
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    if (xmlhttp.responseText == 'ok') {
                        return true;
                    }
                    else
                        setErrorMessage("Запись с таким названиеим уже существует! Hазвание должно быть уникальным!");
                }
            }
            else
                return true;
        }
        else
            setErrorMessage("Поле \"" + $("label[for='newBrandInfoPictureUrl']").html() + "\" не должно быть пусто");
    }
    else
        setErrorMessage("Поле \"" + $("label[for='newBrandInfoName']").html() + "\" не должно быть пусто");
    return false;
}

function changeCategoryState(brand, category, controllerUrl) {
     xmlhttp = new XMLHttpRequest();
     xmlhttp.open("GET", controllerUrl+"/brand/"+brand+"/category/"+category, false);
     xmlhttp.send();
     if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
         if(xmlhttp.responseText == 'enabled') {
             $("#status"+category).html("enabled");    // alert("ena");
         }
         else {
            $("#status"+category).html("disabled");    // alert("dis");
         }
     }
}

function makeTextInfoValues(info_id, info_content, info_type, info_order, info_enabled, info_class) {
    while (info_content.indexOf("<br />") != -1) {
        info_content = info_content.replace("<br />", "\n");
    }
    $("#textInfoId").val(info_id);
    $("#textInfoContent").val(info_content);
    $("#textInfoType").val(info_type);
    $("#textInfoOrder").val(info_order);
    $("#textInfoEnabled").val(info_enabled);
    $("#textInfoClass").val(info_class);
}

function checkTextInfoForm() {
    var contentValue = $("#textInfoContent").val();
    var orderValue = $("#textInfoOrder").val();
    if (contentValue != '') {
        if (orderValue != '') {
            if (!isNaN(orderValue)) {
                if (orderValue > 0 && orderValue % 1 === 0)
                    return true;
                else
                    setErrorMessage("Поле \"" + $("label[for='textInfoOrder']").html() + "\" должно быть положительным целым числом");
            }
            else
                setErrorMessage("Поле \"" + $("label[for='textInfoOrder']").html() + "\" должно содержать только цифры");
        }
        else
            setErrorMessage("Поле \"" + $("label[for='textInfoOrder']").html() + "\" не должно быть пусто");
    }
    else
        setErrorMessage("Поле \"" + $("label[for='textInfoContent']").html() + "\" не должно быть пусто");
    return false;
}

function assignFormValue(value, elementId) {
    $("#"+elementId).val(value);
}




window.onload = function() {

};
