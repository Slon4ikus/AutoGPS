<?php
    if (!empty($data['info'])) {
    foreach ($data['info']['primary_text'] as $info) {
        echo "<p class='" . $info['class'] . "'>" . $info['content'] . "</p>";
    }
    foreach ($data['info']['primary_image'] as $info) {
        echo "<img class='" . $info['class'] . "' src='" . core_route::$path . "/images/about/" . $info['content'] . "'>";
    }
    foreach ($data['info']['secondary_text'] as $info) {
        echo "<p class='" . $info['class'] . "'>" . $info['content'] . "</p>";
    }
    foreach ($data['info']['secondary_image'] as $info) {
        echo "<img class='" . $info['class'] . "' src='" . core_route::$path . "/images/about/" . $info['content'] . "'>";
    }
}
?>

 
