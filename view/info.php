<h1 class="infoHead"><?php echo $data['brand']?></h1>
<?php
        if ($data['existingCategories']['gps'] == true) {
    echo "<div id='gpsInfoDiv' class='gpsInfoDiv'> <h2> Gps </h2>
      <div class='gpsPrimaryText'>";
    foreach ($data['mainInfo']['gps']['primary_text'] as $gpsInfo) {
        echo "<p class='primary_text ".$gpsInfo['class']."'>" . $gpsInfo['info'] . "</p>";
    }
    echo "</div>
    <div class='gpsPrimaryImages'>";
    foreach ($data['mainInfo']['gps']['primary_image'] as $gpsInfo) {
        echo "<img class='primary_image ".$gpsInfo['class']."' src=" . core_route::$path .
             "/images/brands/" . $data['brand'] . "/gps/" . $gpsInfo['info'] . ">";
    }
    echo "</div>
    <div class='gpsSecondaryText'>";
    foreach ($data['mainInfo']['gps']['secondary_text'] as $gpsInfo) {
        echo "<p class='secondary_text ".$gpsInfo['class']."'>" . $gpsInfo['info'] . "</p>";
    }
    echo "</div>
        <div class='gpsSecondaryImages'>";

    foreach ($data['mainInfo']['gps']['secondary_image'] as $gpsInfo) {
        echo "<img class='secondary_image ".$gpsInfo['class']."' src=" . core_route::$path .
             "/images/brands/" . $data['brand'] . "/gps/" . $gpsInfo['info'] . ">";
    }

    echo "</div>
</div>";
}
if ($data['existingCategories']['russification'] == true) {
    echo "<div id='russificationInfoDiv' class='russificationInfoDiv'>
            <h2> Russification </h2>
        <div class='rusPrimaryText'>";
    foreach ($data['mainInfo']['russification']['primary_text'] as $rusInfo) {
        echo "<p class='primary_text ".$rusInfo['class']."'>" . $rusInfo['info'] . "</p>";
    }
    echo "</div>
    <div class='rusPrimaryImages'>";
    foreach ($data['mainInfo']['russification']['primary_image'] as $rusInfo) {
        echo "<img class='primary_image ".$rusInfo['class']."' src=" . core_route::$path .
             "/images/brands/" . $data['brand'] . "/russification/" . $rusInfo['info'] . ">";
    }
    echo "</div>
    <div class='rusSecondaryText'>";
    foreach ($data['mainInfo']['russification']['secondary_text'] as $rusInfo) {
        echo "<p class='secondary_text ".$rusInfo['class']."'>" . $rusInfo['info'] . "</p>";
    }
    echo "</div>
    <div class='rusSecondaryImages'>";
    foreach ($data['mainInfo']['russification']['secondary_image'] as $rusInfo) {
        echo "<img class='secondary_image '".$rusInfo['class']."src=" . core_route::$path .
             "/images/brands/" . $data['brand'] . "/russification/" . $rusInfo['info'] . ">";
    }
    echo "</div>
</div>";
}
if ($data['existingCategories']['other'] == true) {
    echo "<div id='otherInfoDiv' class='otherInfoDiv'>
            <h2> Other </h2>
    <div class='otherPrimaryText'>";
    foreach ($data['mainInfo']['other']['primary_text'] as $otherInfo) {
        echo "<p class='primary_text ".$otherInfo['class']."'>" . $otherInfo['info'] . "</p>";
    }
    echo "</div>
    <div class='rusPrimaryImages'>";
    foreach ($data['mainInfo']['other']['primary_image'] as $otherInfo) {
        echo "<img class='primary_image ".$otherInfo['class']."' src=" . core_route::$path .
             "/images/brands/" . $data['brand'] . "/other/" . $otherInfo['info'] . ">";
    }
    echo "</div>
    <div class='rusSecondaryText'>";
    foreach ($data['mainInfo']['other']['secondary_text'] as $otherInfo) {
        echo "<p class='secondary_text ".$otherInfo['class']."'>" . $otherInfo['info'] . "</p>";
    }
    echo "</div>
    <div class='rusSecondaryImages'>";
    foreach ($data['mainInfo']['other']['secondary_image'] as $otherInfo) {
        echo "<img class='secondary_image '".$otherInfo['class']."src=" . core_route::$path .
             "/images/brands/" . $data['brand'] . "/other/" . $otherInfo['info'] . ">";
    }
    echo "</div>
</div>";
}
?>
<script>
    scrollToElem('<?php echo $data['scroll']; ?>Div', 1500);
</script>
