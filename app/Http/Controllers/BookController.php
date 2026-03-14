<?php

namespace App\Http\Controllers;

use App\Application\UseCases\GetAllBooks;
use App\Application\UseCases\CreateBook;
use App\Application\UseCases\GetBookById;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(GetAllBooks $useCase)
    {
        return $useCase->execute();
    }

    public function store(Request $request, CreateBook $useCase)
    {
        return $useCase->execute($request->all());
    }

    public function show($id, GetBookById $useCase)
    {
        return $useCase->execute($id);
    }
}
