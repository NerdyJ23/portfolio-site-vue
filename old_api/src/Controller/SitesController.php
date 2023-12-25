<?php

namespace App\Controller;

use Cake\Controller\Controller;
use App\Client\Sites\SitesClient;
use App\Schema\AbstractSchema;
use App\Controller\Component\Enum\StatusCodes;

class SitesController extends ApiController {
	public function initialize(): void {
		parent::initialize();
	}

	public function index() {
		self::list();
	}

	public function list() {
		$result = SitesClient::list();
		$this->set('count', $result->total);
		$this->set('result', AbstractSchema::schema($result->list, "Site"));
	}

	public function getImage(string $path, string $filename) {
		$filepath = SitesClient::getImage(dir: $path, id: $filename);
		if ($filepath !== null) {
			return $this->response->withFile($filepath);
		}
		return $this->response(StatusCodes::NOT_FOUND);
	}
}