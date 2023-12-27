<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
	const TABLE = "SiteLanguagesUsed";
    public function up(): void
    {
        if(!Schema::hasTable(self::TABLE)) {
			Schema::create(self::TABLE, function (Blueprint $table) {
				$table->id();
				$table->unsignedBigInteger("Site_ID");
				$table->unsignedBigInteger("Programming_Language_ID");
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

	//Add constraints and fk here as all tables will exist
	public function after(): void {

	}
};
