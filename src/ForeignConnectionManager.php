<?php namespace Dpc\Importer;


use Illuminate\Support\Facades\DB;

class ForeignConnectionManager implements ForeignConnectionContract
{
    /**
     * The connection to use.
     *
     * @var string|null
     */
    protected $connection;

    /**
     * Construct a new foreign connection manager.
     */
    public function __construct()
    {
        $this->connection = config('importer.connection');
    }

    /**
     * Connect to a table.
     *
     * @param string $table
     *
     * @return \Illuminate\Database\Connection
     */
    public function table(string $table)
    {
      return DB::connection($this->connection)->table($table);
    }
}
