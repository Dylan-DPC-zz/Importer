<?php namespace Dpc\Importer;


use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

interface ImporterContract
{
    public function import(string $seed = null): ImporterContract;
}