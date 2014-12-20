<?php

class PrivacyController extends Phalcon\Mvc\Controller {

	public function indexAction() {

		$this->getPageAssets();

		$this->view->title = "NHP - Privacy";
	}

	public function getPageAssets() {

        //Add some local CSS resources
        $this->assets
            ->addCss('css/bootstrap.min.css')
            ->addCss('css/taskforcebravo.css')
            ->addCss('css/nhp.css')
            ->addCss('css/font-awesome.min.css');

        //and some local javascript resources
        $this->assets
            ->addJs('js/jquery.js')
            ->addJs('js/bootstrap.min.js')
            ->addJs('js/taskforcebravo.js')
            ->addJs('js/mobileMenu.js');

    }

}
