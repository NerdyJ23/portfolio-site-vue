<?php
namespace App\Schema\Schemas;

use App\Schema\SchemaInterface;
use App\Schema\AbstractSchema;
use App\Client\Files\ImagesClient;

class ProgrammingLanguageSchema implements SchemaInterface {

	static function toSummarizedSchema($language): mixed {
		$result = (object) [
			'name' => $language->Name
		];

		if(!is_null($language->Icon)) {
			$result->icon = ImagesClient::ICONS_URL . 'languages/' . $language->Icon;
		}
		return $result;
	}

	static function toExtendedSchema($language): array {
		return self::toSummarizedSchema($language);
	}
}

