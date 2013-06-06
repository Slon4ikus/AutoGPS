<?php
class core_controller
{
    public $view;
    public $model;
    
    function __construct()
    {
        $this->view = new core_view();
    }
}
