<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

class ProgrammingLanguage extends Entity {
	protected $_hidden = ["ID"];
	protected $_accessible = [
		"Name" => true
	];
}