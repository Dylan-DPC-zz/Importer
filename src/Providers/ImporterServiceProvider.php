<?php namespace Dpc\Importer\Providers;

use Dpc\Importer\ForeignConnectionContract;
use Dpc\Importer\ForeignConnectionManager;
use Dpc\Importer\Importer;
use Dpc\Importer\ImporterContract;
use Illuminate\Support\ServiceProvider;

class ImporterServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ImporterContract::class, Importer::Class);
        $this->app->bind(ForeignConnectionContract::class,
            ForeignConnectionManager::class);
    }
}
