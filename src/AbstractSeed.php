<?php

namespace Dpc\Importer;

abstract class AbstractSeed
{
    /**
     * The imported data.
     *
     * @var mixed
     */
    protected $data;

    /**
     * The connection manager.
     *
     * @var \Dpc\Importer\ForeignConnectionContract
     */
    protected $manager;

    /**
     * AbstractSeed constructor.
     *
     * @param \Dpc\Importer\ForeignConnectionContract $manager
     */
    public function __construct(ForeignConnectionContract $manager)
    {
        $this->manager = $manager;
        $this->data = $this->getData();
    }

    /**
     * Get the seed data.
     *
     * @return mixed
     */
    abstract public function getData();

    /**
     * Prepare the data for seeding.
     *
     * @return $this
     */
    public function prepareData() : AbstractSeed
    {
        return $this;
    }

    /**
     * Seed the data.
     *
     * @return void
     */
    abstract public function seed();
}
