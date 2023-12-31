<?php

use App\Models\ProgrammingLanguage;
use App\Models\Site;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
		$site = new Site();
		$lang = new ProgrammingLanguage();

		if(Schema::hasTable("SiteLanguagesUsed") && Schema::hasTable($site->getTable()) && Schema::hasTable($lang->getTable())) {
			Schema::table("SiteLanguagesUsed", function(Blueprint $table) use($site, $lang)  {
				$table->foreign("Site_ID")->references("ID")->on($site->getTable());
				$table->foreign("Programming_Language_ID")->references("ID")->on($lang->getTable());
			});
		}
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
