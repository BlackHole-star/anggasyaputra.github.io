<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Book;
use Illuminate\View\View;

class BookController extends Controller
{

    public function index(): View
    {
        $books = Book::all();
        return view ('books.index')->with('books', $books);
    }

 
    public function create(): View
    {
        return view('books.create');
    }

  
    public function store(Request $request): RedirectResponse
    {
        $input = $request->all();
        Book::create($input);
        return redirect('books')->with('flash_message', 'Book Addedd!');
    }

    public function show(string $isbn): View
    {
        $book = Book::find($isbn);
        return view('books.show')->with('books', $book);
    }

    public function edit(string $isbn): View
    {
    $book = Book::find($isbn);
    return view('books.edit', compact('book'));
    }


    public function update(Request $request, string $isbn): RedirectResponse
    {
        $book = Book::find($isbn);
        $input = $request->all();
        $book->update($input);
        return redirect('books')->with('flash_message', 'book Updated!');  
    }

    
    public function destroy(string $isbn): RedirectResponse
    {
        Book::destroy($isbn);
        return redirect('books')->with('flash_message', 'book deleted!');
    }
}