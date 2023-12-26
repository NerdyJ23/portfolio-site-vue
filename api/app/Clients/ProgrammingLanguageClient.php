<?php
namespace App\Clients;

use App\Models\ProgrammingLanguage;

class ProgrammingLanguageClient {

	public static function search(string $name): ProgrammingLanguage|null {
		return ProgrammingLanguage::where('Name', $name)->first();
	}

	public static function get(int $id): ProgrammingLanguage|null {
		return ProgrammingLanguage::find($id)->first();
	}
}