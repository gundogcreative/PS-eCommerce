<?php

use Phalcon\Mvc\Model\Validator\Uniqueness as UniquenessValidator;
use Phalcon\Mvc\Model\Validator\PresenceOf;

class Branches extends Phalcon\Mvc\Model {

	/**
    * @Primary
    * @Identity
    * @Column(type="integer", nullable=false)
    */
	public $id;

	public $branchName;
	public $metroId;
	public $abbreviation;
	public $regionId;
	public $isActive;

    public function initialize() {
        $this->setSource("branches");

        $this->hasMany("id", "Drivers", "branchId");
        $this->hasOne("regionId", "Regions", "id");
    }

    public function validation() {

    	//branchName
        $this->validate(new UniquenessValidator(array(
            'field' => 'branchName',
            'message' => 'Sorry, This Branch already exists'
        )));

        $this->validate(new PresenceOf(array(
          'field' => 'branchName',
          'message' => 'The Branch Name is required'
      	)));

        //metroId
        $this->validate(new UniquenessValidator(array(
            'field' => 'metroId',
            'message' => 'Sorry, This Metro Id already exists'
        )));

        $this->validate(new PresenceOf(array(
          'field' => 'metroId',
          'message' => 'The Metro Id is required'
      	)));

      	//abbreviation 
        $this->validate(new PresenceOf(array(
          'field' => 'abbreviation',
          'message' => 'The Abbreviation is required'
      	)));

        if ($this->validationHasFailed() == true) {
            return false;
        }
    }

    public function onValidationFails() { 

    	//Obtain the flash service from the DI container
        $flash = $this->getDI()->getFlashSession();

 		foreach ($this->getMessages() as $message) {
 			$newMessage = $this->getCorrectMessage($message);
 			$flash->error($newMessage);
        }
    }

    private function getCorrectMessage($message) { 

			$splitFieldName = preg_split('/(?=\p{Lu})/u', $message->getField());
			$fieldName = implode(" ", $splitFieldName);
			return ucwords(str_replace($message->getField(), $fieldName, $message));
    }

}