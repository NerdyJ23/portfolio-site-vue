<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProgrammingLanguagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
	const TABLE = "ProgrammingLanguages";

    public function run(): void
    {
        DB::table(self::TABLE)->insert([
			["Name" => "CakePHP", "Icon" => "ViFileTypeCakephp"],
			["Name" => "Vue.js", "Icon" => "ViFileTypeVue"],
			["Name" => "React", "Icon" => "ViFileTypeReactjs"],
			["Name" => "PHP", "Icon" => "ViFileTypePhp"],
			["Name" => "HTML", "Icon" => "ViFileTypeHtml"],
			["Name" => "CSS", "Icon" => "ViFileTypeCss"],
			["Name" => "Javascript", "Icon" => "ViFileTypeJsOfficial"],
		]);
    }
}
