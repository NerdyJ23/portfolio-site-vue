<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
	const TABLE = "Sites";
    /**
     * Run the migrations.
     */
    public function up(): void
    {
		if (!Schema::hasTable(self::TABLE)) {
			Schema::create(self::TABLE, function (Blueprint $table) {
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
        Schema::dropIfExists(self::TABLE);
    }
};
