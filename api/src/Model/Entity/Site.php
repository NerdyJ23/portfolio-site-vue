<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use App\Client\Security\EncryptionClient;

class Site extends Entity {
	// protected $_hidden = ['ID'];

	protected $_accessible = [
		'Name' => true,
		'Description' => true,
		'URL' => true,
		'Date' => true,
		'ImagesDirectory' => true
	];
}