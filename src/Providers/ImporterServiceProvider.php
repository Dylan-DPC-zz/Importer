<?php namespace Dpc\Importer\Providers;

use Dpc\Importer\Commands\ImportData;
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
        if ($this->app->runningInConsole()) {
            $this->commands([
                ImportData::class
            ]);
        }
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
