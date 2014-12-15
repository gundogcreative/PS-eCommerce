<?php

use Phalcon\Mvc\Model\Validator\Uniqueness as UniquenessValidator;
use Phalcon\Mvc\Model\Validator\Email as EmailValidator;
use Phalcon\Mvc\Model\Validator\PresenceOf;

class NuCards extends Phalcon\Mvc\Model {

	protected $full_name;
	protected $email;
	protected $phone;
	protected $card_code;
	protected $dt_uploaded;

    public function initialize() {
        $this->setSource("nu_cards");
    }

    public function beforeSave() { 
        
    }

    public function beforeValidation() { 
        
        $this->dt_uploaded = date('Y-m-d H:m:i');
    }

    public function validation() {
        //branchName
        $this->validate(new UniquenessValidator(array(
            'field' => "card_code",
            'message' => "unique"
        )));

        $this->validate(new PresenceOf(array(
          'field' => 'full_name',
          'message' => 'required'
        )));

        $this->validate(new PresenceOf(array(
          'field' => 'email',
          'message' => 'required'
        )));

        $this->validate(new EmailValidator(array(
            'field' => 'email',
            'message' => 'format'
        )));

        $this->validate(new PresenceOf(array(
          'field' => 'phone',
          'message' => 'required'
        )));

        if ($this->validationHasFailed() == true) {
            return false;
        }
    }

    public function onValidationFails() { 
    	//Obtain the flash service from the DI container
        $flash = $this->getDI()->getFlashSession();
        $errors = Array();

 		foreach ($this->getMessages() as $message) {
            $errors["{$message->getField()}"] = "{$message->getMessage()}";
        }
        
 		$flash->error(json_encode($errors));
    }

}
