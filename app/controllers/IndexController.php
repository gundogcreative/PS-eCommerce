<?php

class IndexController extends Phalcon\Mvc\Controller {

	public function indexAction() {
        $this->getPageAssets(); 
		$this->view->title = "nuCards - Activate Your Cards";

        if($this->request->isGet()) { 
            $card_code              = $this->request->get("CardNum");
            $split_card_code        = chunk_split($card_code, 4, "-");
            $final_card_code        = rtrim($split_card_code, "-");
            $this->view->card_code  = $final_card_code;
        } else { 
            $this->view->card_code  = NULL;
        }
        
	}

    public function successAction() { 
        
        if($this->request->isPost()) { 
            $nuCard             = new NuCards();
            $nuCard->full_name  = $this->request->getPost('full_name');
            $nuCard->email      = $this->request->getPost('email');
            $nuCard->phone      = $this->request->getPost('phone');
            $nuCard->card_code  = $this->request->getPost('card_code');
            
            if($nuCard->save() == false) { //if the save was successful return to index
                /*DEBUG
                 foreach ($nuCard->getMessages() as $message) {
                    var_dump($message);
                }
                die(); 
                */
                return $this->dispatcher->forward(array(
                    'controller' => 'Index',
                    'action' => 'index'
                ));            
            } else { //save was a success...
                $this->getPageAssets(); 
		        $this->view->title = "nuCards - Success";
            }        
            
        } else { //if you did not submit the form you should not be on the success page
            return $this->response->redirect("index"); 
        }

    }

	private function getPageAssets() {

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
