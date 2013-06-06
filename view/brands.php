<ul class="brandList">
<?php
    foreach($data['brands'] as $brand) {
        echo
        "<li>
            <a href='".core_route::$path."/info/index/name/".$brand['name']."/scroll/".$data["url"]."'>
                <img src='".core_route::$path."/images/brands/".$brand['pictureUrl'].".png'>
                <h3>".$brand["name"]."</h3>
            </a>
        </li>";

    }
?>
</ul>