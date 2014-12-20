<?php

require_once("../app/lib/controlpanel.php");

class LoginController extends Phalcon\Mvc\Controller {

    
    private function _registerSession($user) {
        $this->session->set('auth', array(
            'id' => $user->id,
            'username' => $user->username,
            'region' => $user->region,
            'role' => $user->role,
        ));
    }

    public function startAction() {
        
        if ($this->request->isPost()) {

            //Receiving the variables sent by POST
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');

            $password = md5($password);

            //Find the user in the database
            $user = Users::findFirst(array(
                "username = :username: AND password = :password:",
                "bind" => array('username' => $username, 'password' => $password)
            ));

            if ($user != false) {

                $this->_registerSession($user);

                return $this->response->redirect("controlpanel");
            }

            $this->flashSession->error('Wrong email/password');
        }

        //Forward to the login form again
        return $this->dispatcher->forward(array(
            'controller' => 'login',
            'action' => 'index'
        ));

    }


    public function indexAction() {

        //$this->view->disable();

        getPageAssets($this->assets);
        $this->view->title = "Login";

    }

    /*
    public function loginAttempt() { 
        $connection = getConnection();
        $loginQuery = "SELECT id, username 
                            FROM users 
                            WHERE username = '{$_POST['username']}' AND password = MD5('{$_POST['password']}')  
                            ";
        $result     = $connection->query($loginQuery);

        $result->setFetchMode(Phalcon\Db::FETCH_ASSOC);
        $results = $result->fetchAll();

        if(sizeof($results) == 0) { 
            $this->view->loginError = "Username and/or Password is Incorrect";
            return false;
        } else { 
            //Set a session variable
            $this->session->set("username", $results[0]["username"]);
            $this->session->set("userId", $results[0]["id"]);
            $this->session->set("isLoggedIn", true);
            return true;
        }

    }
    */

}
