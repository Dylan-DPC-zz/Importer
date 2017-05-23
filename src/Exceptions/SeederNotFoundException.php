<?php
/**
 * Created by PhpStorm.
 * User: dpc
 * Date: 24/5/17
 * Time: 1:17 AM
 */

namespace Dpc\Importer;


class SeederNotFoundException extends \Exception
{
    protected $seeder;

    /**
     * SeederNotFoundException constructor.
     * @param string $seeder
     */
    public function __construct(string $seeder)
    {
        $this->seeder = $seeder;
        $this->message = $seeder . ' . not found';
    }


}