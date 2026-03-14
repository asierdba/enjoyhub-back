<?php

namespace App\Application\UseCases;

use App\Domain\Repositories\BookRepositoryInterface;

class CreateBook
{
    public function __construct(private BookRepositoryInterface $repo) {}

    public function execute(array $data)
    {
        return $this->repo->create($data);
    }
}
