<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Book;
use Illuminate\View\View;
use Illuminate\Foundation\Http\FormRequest;

class StoreBookRequest extends FormRequest
{
    public function rules()
    {
        return [
            'isbn' => [
                'required',
                'string',
                'regex:/^[0-9\-]*$/',
                'min:13',
            ],
            'title' => 'required|string',
            'category' => 'required|string',
            'author' => 'required|string',
            'price' => 'required|numeric',
        ];
    }
}

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

  
    public function store(StoreBookRequest $request)
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


    public function update(StoreBookRequest $request, string $isbn): RedirectResponse
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