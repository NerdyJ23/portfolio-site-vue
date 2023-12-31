<?php

namespace App\Listeners;

use Database\Seeders\SiteSeeder;
use Exception;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\Migrations\Migrator;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Artisan;

class AfterMigrateListener
{
    /**
     * Create the event listener.
     */
	public const TO_RUN = [SiteSeeder::class];

    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(object $event): void
    {
		Artisan::call("db:seed");
		foreach(self::TO_RUN as $run) {
			try {
				dump("Run after for class " . $run);
				$run::after();
			} catch(Exception $e) {
				dump($e->getMessage());
			}
		}
    }
}
