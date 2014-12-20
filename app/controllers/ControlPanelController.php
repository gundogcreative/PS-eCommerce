<?php

require_once("../app/lib/controlpanel.php");

class ControlPanelController extends Phalcon\Mvc\Controller {

    public function indexAction() {

        //$this->view->disable();

        /***************************
        * Set Page Up
        ****************************/
        getPageAssets($this->assets);

        $this->view->title  = "Control Panel";

        $this->view->headerHtml = getControlPanelHeaderHtml();
        /***************************
        * End Set Page Up
        ****************************/

    }

}

