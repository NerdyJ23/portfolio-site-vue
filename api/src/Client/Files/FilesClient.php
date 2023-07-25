<?php

namespace App\Client\Files;
use App\Client\AbstractClient;

class FilesClient extends AbstractClient {
	static function getWebsiteImage() {

	}

	static function getFile(string $path, string $filename): mixed {
		if (file_exists($path) && is_dir($path)) {
			$file = $path . DS . $filename;
			if (file_exists($file) && is_file($file)) {
				return $file;
			}
		}
		return null;
	}

	static function getFileList(string $local_dir, string $dir, string $url): mixed {
		if (!file_exists($local_dir . $dir) || !is_dir($local_dir . $dir)) {
			mkdir($local_dir . $dir, 0755);
			touch($local_dir . $dir . DS . '.gitkeep');
			return [];
		}
		//convert associative array to simple array, remove .. and . "files" in the directory
		$result = array_values(array_diff(scandir($local_dir . $dir), array('..', '.', '.gitkeep')));
		$callback = fn(string $item):string => $url . $dir . '/' . $item;
		$result = array_map($callback, $result);
		return $result;
	}
}