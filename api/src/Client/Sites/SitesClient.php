<?php

namespace App\Client\Sites;
use App\Client\AbstractClient;

class SitesClient extends AbstractClient {
	const TABLE = "Sites";

	static function list(): mixed {
		$query = parent::fetchTable(self::TABLE)
		->find('all')
		->contain(["ProgrammingLanguages"])
		->order(['date' => 'DESC']);

		return parent::toList($query);
	}

	static function getImage(string $id, string $dir): mixed {
		$path = RESOURCES . 'images' . DS .  $dir;
		if (file_exists($path) && is_dir($path)) {
			$file = $path . DS . $id;
			if (file_exists($file) && is_file($file)) {
				return $file;
			}
		}
		return null;
	}
}