<?php

namespace Database\Seeders;

use App\Clients\ProgrammingLanguageClient;
use App\Clients\SiteClient;
use App\Models\ProgrammingLanguage;
use App\Models\Site;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
	const TABLE = "Sites";
	const SITE_LANGUAGES = [
		"Timetable" => ["HTML", "CSS", "PHP", "Javascript"],
		"DnD Version 1.0" => ["CSS", "HTML", "Javascript", "PHP"],
		"DnD Version 2.0" => ["CSS", "HTML", "Javascript", "PHP"],
		"TasTAFE Project" => ["HTML", "CSS"],
		"Warframe Checklist" => ["CSS", "PHP", "Javascript"],
		"MTG Card Knockout List" => ["Vue.js"],
		"DnD Version 3.0" => ["Vue.js", "CakePHP"],
		"Budgeting Version 3.0" => ["Vue.js", "CakePHP"],
		"Budgeting Version 4.0" => ["Vue.js", "Laravel", "Redis"]
	];

    public function run(): void
    {
        DB::table(self::TABLE)->insert([
			[
				"Name" => "Timetable",
				"Description" => "A very basic site I used to keep track of the local bus schedule and my uni timetable as well as link to my local Plex server",
				"URL" => "timetable.projects.jessprogramming.com",
				"Date" => "2016",
				"Repo" => null,
				"ImagesDirectory" => "timetable",
				"Visible" => true
			],
			[
				"Name" => "DnD Version 1.0",
				"Description" => "Made to keep track and immortalize my characters in dnd",
				"URL" => "dndv1.projects.jessprogramming.com",
				"Date" => "2016",
				"Repo" => null,
				"ImagesDirectory" => "dndv1",
				"Visible" => true
			],
			[
				"Name" => "DnD Version 2.0",
				"Description" => "My second iteration, this one involved having much better UI and cleaning up a lot of the backend code",
				"URL" => "dndv1.projects.jessprogramming.com",
				"Repo" => "https://github.com/NerdyJ23/site-old-dnd",
				"Date" => "2016",
				"ImagesDirectory" => "dndv1",
				"Visible" => true
			],
			[
				"Name" => "TasTAFE Project",
				"Description" => "A html website I created as part of finishing my Cert 3 in ICT",
				"URL" => "tafe.projects.jessprogramming.com",
				"Date" => "2016",
				"Repo" => null,
				"ImagesDirectory" => "tafe",
				"Visible" => true
			],
			[
				"Name" => "Warframe Checklist",
				"Description" => "I wanted to have a list of all the items in warframe that I owned and could see which I had yet to collect. There was no API at the time so I had to create and source the files seperately and manually",
				"URL" => "warframe.projects.jessprogramming.com",
				"Date" => "2017",
				"Repo" => null,
				"ImagesDirectory" => "warframe",
				"Visible" => true
			],
			[
				"Name" => "MTG Card Knockout List",
				"Description" => "A databaseless site that shows all the cards from the selected MTG set, queried via Scryfall's API, and allows importing your .csv collection from deckbox.org to see which cards from the selected set you have not yet collected",
				"URL" => "mtg.projects.jessprogramming.com",
				"Date" => "2022",
				"Repo" => null,
				"ImagesDirectory" => "mtg-checklist",
				"Visible" => false
			],
			[
				"Name" => "DnD Version 3.0",
				"Description" => "My most current version of the DnD character site, this one written in vue using my knowledge from commercial work",
				"URL" => "dnd.jessprogramming.com",
				"Date" => "2023",
				"Repo" => null,
				"ImagesDirectory" => "dndv3",
				"Visible" => true
			],
			[
				"Name" => "Budgeting Version 3.0",
				"Description" => "A site I created for myself to help with recording my spending and as a challenge to learn some php frameworks, and I ended up deciding to use CakePHP",
				"Repo" => "https://github.com/NerdyJ23/budget3.0",
				"Date" => "2023",
				"URL" => null,
				"ImagesDirectory" => "budget",
				"Visible" => true
			],
			[
				"Name" => "Budgeting Version 4.0",
				"Description" => "After learning some more about CakePHP I decided to learn Laravel. It ended up being much nicer to use, as well as being able to properly run and debug on local, so I migrated the old budget site to it.",
				"URL" => "budget.jessprogramming.com",
				"Repo" => "https://github.com/NerdyJ23/budget4.0-laravel",
				"Date" => "2023",
				"ImagesDirectory" => "budget-laravel",
				"Visible" => true
			]
			]);
    }

	public static function after() {
		foreach (self::SITE_LANGUAGES as $sitename => $languages ) {
			$site = SiteClient::search($sitename);
			if (!is_null($site)) {
				foreach($languages as $languagename) {
					$lang = ProgrammingLanguageClient::search($languagename);
					if (!is_null($lang)) {
						$site->languages()->sync([$lang->ID], false);
						$site->refresh();
					}
				}
			}
		}
	}
}
