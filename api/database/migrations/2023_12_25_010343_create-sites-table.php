<?php

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
		$table = $site->getTable();
		print_r($table);
		if (!Schema::hasTable($table)) {
			Schema::create($table, function (Blueprint $table) {
				$table->id("ID");
				$table->string("Name", 255)->nullable(false);
				$table->string("Description", 3000);
				$table->string("Url", 1000)->nullable(true);
				$table->string("Repo", 1000)->nullable(true);
				$table->string("Date", 30);
				$table->string("ImagesDirectory", 50);
				$table->boolean("Visible")->nullable(false)->default(false);
			});
		}
        //
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
		$site = new Site();
        Schema::dropIfExists($site->getTable());
    }
};
