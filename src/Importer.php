<?php namespace Dpc\Importer;


use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class Importer implements ImporterContract
{
    public function import(array $seed = []) : ImporterContract
    {
        $seeders = $seed ? $seed : config('importer.seeds');
        DB::transaction(function () use ($seeders) {
            collect($seeders)->each(function ($seeder) {
                $seeder = App::make($seeder);
                if (!$seeder) {
                    throw new SeederNotFoundException;
                }
                $seeder->getData()->chunk(config('importer.chunkBy'), function ($rows) use ($seeder) {
                    $seeder->setData($rows)->prepareData()->seed();
                });

            });
        });
        return $this;
    }
}