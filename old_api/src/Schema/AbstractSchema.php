<?php
namespace App\Schema;

class AbstractSchema {
	static $schemas = [
		'Site' => 'App\Schema\Schemas\SiteSchema',
		'ProgrammingLanguage' => 'App\Schema\Schemas\ProgrammingLanguageSchema'
	];

	static function schema(mixed $item, string $schema): mixed {
		$type = 'App\Model\Entity\\' . $schema;

		if (is_a($item, $type, true)) {
			return AbstractSchema::$schemas[$schema]::toExtendedSchema($item);
		} else if (is_array($item)) {
			$result = [];
			foreach ($item as $i) {
				if (is_a($i, $type, true)) {
					$result[] = AbstractSchema::$schemas[$schema]::toSummarizedSchema($i);
				}
			}
			return $result;
		}
		return null;
	}
}