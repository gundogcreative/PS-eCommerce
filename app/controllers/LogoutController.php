<?php

require_once("../app/lib/controlpanel.php");

class LogoutController extends Phalcon\Mvc\Controller {

    public function indexAction() {

        //$this->view->disable();
        $this->session->destroy();

        return $this->response->redirect("login");

    }

}

