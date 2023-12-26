<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
	const TABLE = "ProgrammingLanguages";

    public function up(): void
    {
		if (!Schema::hasTable(self::TABLE)) {
			Schema::create(self::TABLE, function (Blueprint $table) {
				$table->id();
				$table->string("Name", 30)->nullable(false);
				$table->string("Icon", 50);
			});
		}
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(self::TABLE);
    }
};
