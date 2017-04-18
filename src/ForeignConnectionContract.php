<?php

namespace Dpc\Importer;

interface ForeignConnectionContract
{
    /**
     * Connect to a table.
     *
     * @param string $table
     *
     * @return \Illuminate\Database\Connection
     */
    public function table(string $table);
}
