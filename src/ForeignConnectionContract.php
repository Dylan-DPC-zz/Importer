<?php namespace Dpc\Importer;


interface ForeignConnectionContract
{
    public function table(string $table);
}