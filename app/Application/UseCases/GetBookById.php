<?php

namespace App\Application\UseCases;

use App\Domain\Repositories\BookRepositoryInterface;

class GetBookById
{
    public function __construct(private BookRepositoryInterface $repo) {}

    public function execute($id)
    {
        return $this->repo->getById($id);
    }
}
