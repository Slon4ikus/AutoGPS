<h1 class="infoHead"><?php echo $data['brand']?></h1>
<div class="gpsInfoDiv">
    <?php
        if ($data['existingCategories']['gps'] == true) {
            echo "<h2> Gps </h2>";
        }
    ?>
    <div class="gpsPrimaryText">
    <?php
                foreach ($data['mainInfo']['gps']['primary_text'] as $gpsInfo) {
        echo "<p class='primary_text'>" . $gpsInfo['info'] . "</p>";
    }
        ?>
    </div>
    <div class="gpsPrimaryImages">
    <?php
                foreach ($data['mainInfo']['gps']['primary_image'] as $gpsInfo) {
        echo "<img class='primary_image' src=" . core_route::$path .
             "/images/brands/" . $data['brand'] . "/gps/" . $gpsInfo['info'] . ".png>";
    }
        ?>
    </div>
    <div class="gpsSecondaryText">
    <?php
                foreach ($data['mainInfo']['gps']['secondary_text'] as $gpsInfo) {
        echo "<p class='secondary_text'>" . $gpsInfo['info'] . "</p>";
    }
        ?>
    </div>
    <div class="gpsSecondaryImages">
    <?php
                foreach ($data['mainInfo']['gps']['secondary_image'] as $gpsInfo) {
        echo "<img class='secondary_image' src=" . core_route::$path .
             "/images/brands/" . $data['brand'] . "/gps/" . $gpsInfo['info'] . ".png>";
    }
        ?>
    </div>
</div>

    <?php
        if ($data['existingCategories']['gps'] == true) {
            echo "<h2> Russification </h2>";
        }
    ?>
<div class="rusInfoDiv">
    <div class="rusPrimaryText">
    <?php
                foreach ($data['mainInfo']['russification']['primary_text'] as $gpsInfo) {
        echo "<p class='primary_text'>" . $gpsInfo['info'] . "</p>";
    }
        ?>
    </div>
    <div class="rusPrimaryImages">
    <?php
                foreach ($data['mainInfo']['russification']['primary_image'] as $gpsInfo) {
        echo "<img class='primary_image' src=" . core_route::$path .
             "/images/brands/" . $data['brand'] . "/russification/" . $gpsInfo['info'] . ".png>";
    }
        ?>
    </div>
    <div class="rusSecondaryText">
    <?php
                foreach ($data['mainInfo']['russification']['secondary_text'] as $gpsInfo) {
        echo "<p class='secondary_text'>" . $gpsInfo['info'] . "</p>";
    }
        ?>
    </div>
    <div class="rusSecondaryImages">
    <?php
                foreach ($data['mainInfo']['russification']['secondary_image'] as $gpsInfo) {
        echo "<img class='secondary_image' src=" . core_route::$path .
             "/images/brands/" . $data['brand'] . "/russification/" . $gpsInfo['info'] . ".png>";
    }
        ?>
    </div>
</div>

<?php
        if ($data['existingCategories']['other'] == true) {
            echo "<h2> Other </h2>";
        }
    ?>
<div class="otherInfoDiv">
    <div class="otherPrimaryText">
    <?php
                foreach ($data['mainInfo']['other']['primary_text'] as $gpsInfo) {
        echo "<p class='primary_text'>" . $gpsInfo['info'] . "</p>";
    }
        ?>
    </div>
    <div class="rusPrimaryImages">
    <?php
                foreach ($data['mainInfo']['other']['primary_image'] as $gpsInfo) {
        echo "<img class='primary_image' src=" . core_route::$path .
             "/images/brands/" . $data['brand'] . "/other/" . $gpsInfo['info'] . ".png>";
    }
        ?>
    </div>
    <div class="rusSecondaryText">
    <?php
                foreach ($data['mainInfo']['other']['secondary_text'] as $gpsInfo) {
        echo "<p class='secondary_text'>" . $gpsInfo['info'] . "</p>";
    }
        ?>
    </div>
    <div class="rusSecondaryImages">
    <?php
                foreach ($data['mainInfo']['other']['secondary_image'] as $gpsInfo) {
        echo "<img class='secondary_image' src=" . core_route::$path .
             "/images/brands/" . $data['brand'] . "/other/" . $gpsInfo['info'] . ".png>";
    }
        ?>
    </div>
</div>
 
