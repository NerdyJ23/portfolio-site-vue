<?php

namespace App\Client\Sites;
use App\Client\AbstractClient;

class SitesClient extends AbstractClient {
	const TABLE = "Sites";

	static function list(): mixed {
		$query = parent::fetchTable(self::TABLE)
		->find('all')
		->where([
			'Visible' => true
		])
		->contain(["ProgrammingLanguages"])
		->order(['date' => 'DESC']);

		return parent::toList($query);
	}
}