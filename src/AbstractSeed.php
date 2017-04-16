<?php namespace Dpc\Importer;


abstract class AbstractSeed
{
    protected $data;

    protected $manager;

    /**
     * AbstractSeed constructor.
     * @param ForeignConnectionContract $manager
     */
    public function __construct(ForeignConnectionContract $manager)
    {
        $this->manager = $manager;
        $this->data = $this->getData();

    }


    abstract public function getData();

    public function prepareData() : AbstractSeed
    {
      return $this;
    }

    abstract public function seed();

}