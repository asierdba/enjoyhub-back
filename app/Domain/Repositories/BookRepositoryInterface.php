<?php

namespace App\Domain\Repositories;

interface BookRepositoryInterface
{
    public function getAll();
    public function create(array $data);
    public function getById($id);
}
