<?php

class PrivacyController extends Phalcon\Mvc\Controller {

	public function indexAction() {
        $this->getPageAssets(); 
		$this->view->title = "nuCards - Private Policy";
	}

	public function getPageAssets() {

        //Add some local CSS resources
        $this->assets
            ->addCss('css/bootstrap.min.css')
            ->addCss('css/font-awesome.min.css')
            ->addCss('css/nucards.css');

        //and some local javascript resources
        $this->assets
            ->addJs('js/bootstrap.min.js')
            ->addJs('js/jasny-bootstrap.min.js')
            ->addJs('js/nucards.js');

    }

}
