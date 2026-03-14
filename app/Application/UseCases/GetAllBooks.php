<?php

namespace App\Application\UseCases;

use App\Domain\Repositories\BookRepositoryInterface;

class GetAllBooks
{
    public function __construct(private BookRepositoryInterface $repo) {}

    public function execute()
    {
        return $this->repo->getAll();
    }
}
