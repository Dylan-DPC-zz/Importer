<?php
/**
 * Created by PhpStorm.
 * User: dpc
 * Date: 26/3/17
 * Time: 1:08 AM
 */

namespace Dpc\Importer;


interface ForeignConnectionContract
{
    public function table(string $table);

}