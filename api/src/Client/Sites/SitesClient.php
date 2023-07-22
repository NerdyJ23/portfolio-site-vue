<?php

namespace App\Client\Sites;
use App\Client\AbstractClient;

class SitesClient extends AbstractClient {
	const TABLE = "Sites";
	const IMAGES_DIR = RESOURCES . 'images' . DS;
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

	static function getImage(string $id, string $dir): mixed {
		$path = self::IMAGES_DIR .  $dir;
		if (file_exists($path) && is_dir($path)) {
			$file = $path . DS . $id;
			if (file_exists($file) && is_file($file)) {
				return $file;
			}
		}
		return null;
	}

	static function getImageList(string $dir): mixed {
		if (!file_exists(self::IMAGES_DIR . $dir) || !is_dir(self::IMAGES_DIR . $dir)) {
			mkdir(self::IMAGES_DIR . $dir, 0755);
			touch(self::IMAGES_DIR . $dir . DS . '.gitkeep');
			return [];
		}
		//convert associative array to simple array, remove .. and . "files" in the directory
		$result = array_values(array_diff(scandir(self::IMAGES_DIR . $dir), array('..', '.', '.gitkeep')));
		$callback = fn(string $item):string => 'images/' . $dir . '/' . $item;
		$result = array_map($callback, $result);
		return $result;
	}
}