<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Landors
 * Date: 5/5/13
 * Time: 9:03 PM
 * To change this template use File | Settings | File Templates.
 */
 
class core_view {
   public static function generate($template, $content, $data = null)
    {
        include 'view' . DIRECTORY_SEPARATOR . $template;
    }
}
