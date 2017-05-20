<?php namespace Dpc\Importer;


use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class Importer implements ImporterContract
{
    public function import() : ImporterContract
    {
        $seeders = config('importer.seeds');
        DB::transaction(function () use ($seeders) {
            collect($seeders)->each(function ($seeder) {
                $seeder = App::make($seeder);
                $seeder->getData()->chunk(config('importer.chunkBy'), function ($rows) use ($seeder) {
                    $seeder->setData($rows)->prepareData()->seed();
                });

            });
        });
        return $this;
    }
}