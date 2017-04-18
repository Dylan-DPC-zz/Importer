<?php

namespace Dpc\Importer;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class Importer implements ImporterContract
{
    /**
     * Import the data.
     *
     * @return $this
     */
    public function import() : ImporterContract
    {
        $seeders = config('importer.seeds');

        DB::transaction(function () use ($seeders) {
            foreach ($seeders as $seeder) {
                $seeder = App::make($seeder);

                $seeder->prepareData()->seed();
            }
        });

        return $this;
    }
}
