<?php

namespace App\Client\Sites;
use App\Client\AbstractClient;

class SitesClient extends AbstractClient {
	const TABLE = "Sites";

	static function list(): mixed {
		$query = parent::fetchTable(self::TABLE)
		->find('all')
		->contain(["ProgrammingLanguages"]);
		return parent::toList($query);
	}
}