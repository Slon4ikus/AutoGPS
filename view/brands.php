<ul class="brandList">
<?php
    foreach($data['brands'] as $brand) {
        echo
        "<li>
            <a href='".core_route::$path."/info/index/name/".$brand['name']."/scroll/".$data["url"]."'>
                <img class='brandImage' src='".core_route::$path."/images/brands/".$brand['name']."/".$brand['pictureUrl']."'>
                <h3 class='brandName'>".$brand["name"]."</h3>
            </a>
        </li>";

    }
?>
    <div class="clear">
    </div>
</ul>