<?php
namespace App\Schema\Schemas;

use App\Schema\SchemaInterface;
use App\Schema\AbstractSchema;
use App\Client\Security\EncryptionClient;

class SiteSchema implements SchemaInterface {
	static function toSummarizedSchema($site): mixed {
		return [
			'id' => EncryptionClient::encrypt($site->ID),
			'name' => $site->Name,
			'description' => $site->Description,
			'url' => $site->URL,
			'date' => $site->Date,
			'images' => $site->ImagesDirectory,
			'languages' => AbstractSchema::schema($site->programming_languages, "ProgrammingLanguage")
		];
	}

	static function toExtendedSchema($site): array {
		return self::toSummarizedSchema($site);
	}
}

