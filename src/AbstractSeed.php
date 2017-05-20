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
    }


    abstract public function getData();

    public function setData($data): AbstractSeed
    {
      $this->data = $data;
      return $this;
    }

    public function prepareData() : AbstractSeed
    {
      return $this;
    }

    public function chunkData(): AbstractSeed
    {
        $this->data->chunk(50);
        return $this;
    }

    abstract public function seed();

}