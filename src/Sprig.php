<?php

namespace Sprig;

use Sprig\Repository;

class Sprig
{
    protected $repository;

    public function __construct()
    {
        $this->repository = new Repository;

        $features = $this->repository->features();



        return $this->repository->branches();
        //return $this->repository->fetch();
    }
}