<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Landors
 * Date: 5/5/13
 * Time: 11:46 PM
 * To change this template use File | Settings | File Templates.
 */

class controller_news extends core_controller
{

    function index()
    {
        $this->view->generate("template.php", "news.php");
    }
}
