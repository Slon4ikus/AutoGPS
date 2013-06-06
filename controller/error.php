<?php

class controller_error extends core_controller
{
   public function index()
   {
        $this->view->generate("template.php", "error.php");
   }
}
