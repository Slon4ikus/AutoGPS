<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Slon
 * Date: 27.05.13
 * Time: 20:37
 * To change this template use File | Settings | File Templates.
 */

class controller_contacts extends core_controller
{
    public function showContacts()
    {
        $this->view->generate("template.php", "contacts.php", '');
    }

}
