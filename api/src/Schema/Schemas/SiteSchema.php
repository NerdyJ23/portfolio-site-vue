<?php
namespace App\Schema\Schemas;

use App\Schema\SchemaInterface;
use App\Schema\AbstractSchema;

class SiteSchema implements SchemaInterface {
	static function toSummarizedSchema($site): mixed {
		return [
			'name' => $site->Name,
			'description' => $site->Description,
			'date' => $site->Date,
			'languages' => AbstractSchema::schema($site->programming_languages, "ProgrammingLanguage")
		];
	}

	static function toExtendedSchema($site): array {
		return self::toSummarizedSchema($site);
	}
}

