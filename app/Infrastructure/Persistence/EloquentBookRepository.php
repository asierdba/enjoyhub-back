<?php

namespace App\Infrastructure\Persistence;

use App\Domain\Entities\Book;
use App\Domain\Repositories\BookRepositoryInterface;

class EloquentBookRepository implements BookRepositoryInterface
{
    public function getAll()
    {
        return Book::all();
    }

    public function create(array $data)
    {
        return Book::create($data);
    }

    public function getById($id)
    {
        return Book::findOrFail($id);
    }
}
