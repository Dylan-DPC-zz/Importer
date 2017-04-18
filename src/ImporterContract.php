<?php

namespace Dpc\Importer;

interface ImporterContract
{
    /**
     * Import the data.
     *
     * @return $this
     */
    public function import() : self;
}
