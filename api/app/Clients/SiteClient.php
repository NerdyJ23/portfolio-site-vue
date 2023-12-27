<?php
namespace App\Clients;

use App\Models\Site;

class SiteClient {
	public static function search (string $sitename) : Site | null {
		return Site::where("Name", $sitename)->first();
	}
}