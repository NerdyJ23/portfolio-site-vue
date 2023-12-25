<?php
namespace App\Controller\Files;

use App\Client\Files\FilesClient;
use App\Client\Files\ImagesClient;

use App\Schema\AbstractSchema;
use App\Controller\ApiController;
use App\Controller\Component\Enum\StatusCodes;

class ImagesController extends ApiController {
	public function initialize(): void {
		parent::initialize();
	}

	public function getImage(string $path, string $filename) {
		$filepath = FilesClient::getFile(path: ImagesClient::IMAGES_DIR . $path, filename: $filename);
		if ($filepath !== null) {
			return $this->response->withFile($filepath);
		}
		return $this->response(StatusCodes::NOT_FOUND);
	}

	public function getIcon(string $path, string $filename) {
		$filepath = FilesClient::getFile(path: ImagesClient::ICONS_DIR . $path, filename: $filename);
		return $filepath === null ? $this->response(StatusCodes::NOT_FOUND) : $this->response->withFile($filepath);
	}
}