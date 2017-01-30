<?php

namespace Sprig\Repository;

class Repository
{
    protected $git;

    public function __construct($path)
    {
        $this->git = Git::create($path);

        $this->fetch();
    }
}