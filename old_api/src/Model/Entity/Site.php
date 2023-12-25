<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use App\Client\Security\EncryptionClient;

class Site extends Entity {
	protected $_accessible = [
		'ID' => true,
		'Name' => true,
		'Description' => true,
		'URL' => true,
		'Date' => true,
		'ImagesDirectory' => true
	];
}