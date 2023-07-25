<?php
namespace App\Schema\Schemas;

use App\Schema\SchemaInterface;
use App\Schema\AbstractSchema;

use App\Client\Security\EncryptionClient;
use App\Client\Sites\SitesClient;
use App\Client\Files\FilesClient;
use App\Client\Files\ImagesClient;

class SiteSchema implements SchemaInterface {
	static function toSummarizedSchema($site): mixed {
		return [
			'id' => EncryptionClient::encrypt($site->ID),
			'name' => $site->Name,
			'description' => $site->Description,
			'url' => $site->URL,
			'date' => $site->Date,
			'images' => ImagesClient::getImageList($site->ImagesDirectory),
			'languages' => AbstractSchema::schema($site->programming_languages, "ProgrammingLanguage")
		];
	}

	static function toExtendedSchema($site): array {
		return self::toSummarizedSchema($site);
	}
}

