<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Landors
 * Date: 5/6/13
 * Time: 4:16 PM
 * To change this template use File | Settings | File Templates.
 */
 
class core_controller {
    public $view;
    public $model;

    function __construct()
    {
        $this->view = new core_view();
    }
}
