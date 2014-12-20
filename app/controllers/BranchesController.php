<?php

require_once("../app/lib/controlpanel.php");

class BranchesController extends Phalcon\Mvc\Controller {

    public function indexAction() {

        //$this->view->disable();

        /***************************
        * Set Page Up
        ****************************/
        getPageAssets($this->assets);

        $this->view->title  = "Branches";

        $this->view->headerHtml = getControlPanelHeaderHtml();
        /***************************
        * End Set Page Up
        ****************************/

        // The data set to paginate
        $branches = Branches::find();
        $page = pageIt($branches, 30);

        $this->view->pageInfo = $page;

    }

    public function editAction() { 

        //$this->view->disable();

        $branchId = (int) $this->request->get("id"); //what are we editing? 
        $branch = Branches::find("id = {$branchId}");

        if(count($branch) > 0) {
            $this->tag->setDefault("id", $branch[0]->id);
            $this->tag->setDefault("branchName", $branch[0]->branchName);
            $this->tag->setDefault("metroId", $branch[0]->metroId);
            $this->tag->setDefault("abbreviation", $branch[0]->abbreviation);
            $this->tag->setDefault("regionId", $branch[0]->regionId);
            $this->tag->setDefault("isActive", $branch[0]->isActive);

            $this->view->title = "Edit Branch - {$branch[0]->branchName}";
        } else {
            
            //Forward to the login form again
            return $this->response->redirect("branches"); 
        }

        /***************************
        * Set Page Up
        ****************************/
        getPageAssets($this->assets);

        $this->view->headerHtml = getControlPanelHeaderHtml();
        /***************************
        * End Set Page Up
        ****************************/
    }

    public function saveAction() { 

       if ($this->request->isPost()) {
            //Receiving the variables sent by POST
            $branch = new Branches();
            $branch->id           = $this->request->getPost('id');
            $branch->branchName   = $this->request->getPost('branchName');
            $branch->metroId      = $this->request->getPost('metroId');
            $branch->abbreviation = $this->request->getPost('abbreviation');
            $branch->regionId     = $this->request->getPost('regionId');
            $branch->isActive     = $this->request->getPost('isActive');

            if($branch->save() == false) {
                return $this->dispatcher->forward(array(
                    'controller' => 'branches',
                    'action' => 'edit'
                ));            
            } else {
                $this->flashSession->success("Branch was updated");
            }
        }

        return $this->response->redirect("branches"); 

    }

    public function newAction() { 

        //$this->view->disable();

        /***************************
        * Set Page Up
        ****************************/
        getPageAssets($this->assets);

        $this->view->title  = "New Branch";

        $this->view->headerHtml = getControlPanelHeaderHtml();
        /***************************
        * End Set Page Up
        ****************************/

    }

    public function createAction() { 

       if ($this->request->isPost()) {
            //Receiving the variables sent by POST
            $branch = new Branches();
            $branch->branchName   = $this->request->getPost('branchName');
            $branch->metroId      = $this->request->getPost('metroId');
            $branch->abbreviation = $this->request->getPost('abbreviation');
            $branch->regionId     = $this->request->getPost('regionId');
            $branch->isActive     = $this->request->getPost('isActive');

            if($branch->save() == false) {
                return $this->dispatcher->forward(array(
                    'controller' => 'branches',
                    'action' => 'new'
                ));            
            } else {
                $this->flashSession->success("Branch was Created");
            }
        }

        return $this->response->redirect("branches"); 

    }

}

