<?php namespace Dpc\Importer\Commands;

use Dpc\Importer\ImporterContract;
use Illuminate\Console\Command;

class ImportData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'importer:import {--seed=* : file path to seed to import }';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Runs the seeds to import';

    protected $importer;

    /**
     * Create a new command instance.
     * @param ImporterContract $importer
     */
    public function __construct(ImporterContract $importer)
    {
        $this->importer = $importer;
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        return $this->importer->import($this->argument('seed'));
    }
}
