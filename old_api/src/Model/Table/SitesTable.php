<?php
namespace App\Model\Table;

use Cake\ORM\Table;

class SitesTable extends Table {
	public function initialize(array $config): void {
		$this->setTable("Sites")
		->belongsToMany("ProgrammingLanguages", [
			"joinTable" => "Ref_Sites_Languages",
			"bindingKey" => "ID",
			"foreignKey" => "Site_ID",
			"targetForeignKey" => "Language_ID"
		]);
	}
}