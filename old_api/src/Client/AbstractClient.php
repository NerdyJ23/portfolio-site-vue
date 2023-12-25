<?php
namespace App\Client;

use Cake\ORM\TableRegistry;
use App\Client\Security\EncryptionClient;

class AbstractClient {
	static function fetchTable(string $table) {
		return TableRegistry::getTableLocator()->get($table);
	}

	static function decrypt(string $id):int {
		return EncryptionClient::decrypt($id);
	}

	static function encrypt(int $id):string {
		return EncryptionClient::encrypt($id);
	}

	//Turns a query into an array object
	static function toList(mixed $query): object {
		return (object) [
			'total' => $query->all()->count(),
			'list' =>
			$query//->limit($pagination->getLimit())
			//->page($pagination->getPage())
			->all()
			->toArray()
		];
	}
}