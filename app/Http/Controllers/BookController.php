<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function download(string $uuid)
    {
      $book = Book::where('uuid', $uuid)->firstOrFail();
      $path = storage_path('app/public/books/' . $book->cover);
      return response()->download($path);
    }
}
