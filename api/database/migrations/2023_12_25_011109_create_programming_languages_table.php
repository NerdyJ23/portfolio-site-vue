<?php

use App\Models\ProgrammingLanguage;
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
		$lang = new ProgrammingLanguage();
		if (!Schema::hasTable($lang->getTable())) {
			Schema::create($lang->getTable(), function (Blueprint $table) {
				$table->id("ID");
				$table->string("Name", 30)->nullable(false)->unique(true);
				$table->string("Icon", 50);
			});
		}
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
		$lang = new ProgrammingLanguage();
        Schema::dropIfExists($lang->getTable());
    }
};
