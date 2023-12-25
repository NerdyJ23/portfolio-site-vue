<?php
namespace App\Model\Table;

use Cake\ORM\Table;

class ProgrammingLanguagesTable extends Table {
	public function initialize(array $config): void {
		$this->setTable('ProgrammingLanguages')
		->belongsToMany("Sites", [
			"joinTable" => "Ref_Sites_Languages",
			"bindingKey" => "ID",
			"foreignKey" => "Language_ID"
		]);
	}
}