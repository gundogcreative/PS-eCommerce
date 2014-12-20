<?php

require_once("../app/lib/templates.php");

class IndexController extends Phalcon\Mvc\Controller {

	public function indexAction() {
        
		$header = getMainHeader();
        var_dump($header);
        die();

		$this->view->title = "Protection Source - Home Security Arizona";

	}

	public function getPageAssets() {

        //Add some local CSS resources
        $this->assets
            ->addCss('css/bootstrap.min.css')
            ->addCss('css/protectionSource.css')
            ->addCss('css/snap.css')
            ->addCss('css/font-awesome.min.css')
            ->addCss('css/bootstrap-switch.css')
            ->addCss('slick/slick.css');

        //and some local javascript resources
        $this->assets
            ->addJs('js/bootstrap.min.js')
            ->addJs('js/snap.js')
            ->addJs('js/fastclick.js')
            ->addJs('js/bootstrap-switch.js')
            ->addJs('slick/slick.js')
            ->addJs('js/protectionSource.js');

    }

}
