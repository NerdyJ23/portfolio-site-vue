<?php

namespace App\Controller;

use Cake\Controller\Controller;
use App\Client\Sites\SitesClient;
use App\Schema\AbstractSchema;

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
}