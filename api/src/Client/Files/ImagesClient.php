<?php
namespace App\Client\Files;

use App\Client\AbstractClient;

class ImagesClient extends AbstractClient {
	const IMAGES_DIR = RESOURCES . 'images' . DS;
	const IMAGES_URL = 'images/';

	const ICONS_DIR = RESOURCES . 'icons' . DS;
	const ICONS_URL = 'images/icons/';

	static function getImageList(string $folder) {
		return FilesClient::getFileList(local_dir: self::IMAGES_DIR, dir: $folder, url: self::IMAGES_URL);
	}
}