<?php
namespace App\Schema\Schemas;

use App\Schema\SchemaInterface;
use App\Schema\AbstractSchema;

class ProgrammingLanguageSchema implements SchemaInterface {
	static function toSummarizedSchema($language): mixed {
		return [
			'name' => $language->Name,
		];
	}

	static function toExtendedSchema($language): array {
		return self::toSummarizedSchema($language);
	}
}

