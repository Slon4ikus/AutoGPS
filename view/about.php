<h1>About</h1>
<?php
    if(!empty($data['info']) ) {
        foreach($data['info'] as $infoType) {
            foreach($infoType as $info)
                echo "<p class='".$info['class']."'>".$info['content']."</p>";
        }
    }
?>

 
