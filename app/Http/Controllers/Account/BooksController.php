<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBook;
use App\Http\Requests\UpdateBook;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::paginate(10);
        return view('books.index', ['books' => $books]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function store(StoreBook $request) //есть подозрение, что здесь есть косяк
    {
        $data = $request->validated();
        $data['uuid'] = Str::uuid();

        if ($request->hasFile('cover')) {
            $cover = $request->file('cover');
            $data['cover'] = $cover->getClientOriginalName();
            $cover->storeAs('books', $data['cover'], 'public');
        }

        $book = Book::create($data);

        return redirect()->route('books.index');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        return view('books.edit', ['book' => $book]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBook $request, Book $book)
    {
        $data = $request->validated();
        $book->title = $data['title'];

        if($request->hasFile('cover')) {
            $cover = $request->file('cover');
            $book->cover = $cover->getClientOriginalName();
            $cover->storeAs('books', $book->cover, 'public');
        }


        $book->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Book $book

     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        try {
            $book->delete();

            return back();
        }catch (\Exception $e) {
            dd($e->getMessage());
        }

    }
}
