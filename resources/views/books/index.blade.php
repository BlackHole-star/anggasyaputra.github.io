@extends('books.layout')
@section('content')

<div class="card mt-5">
    <div class="card-header">Books Data</div>
    <div class="card-body">
        <a href="{{ route('books.create') }}" class="btn btn-primary mb-4">+ Add Book</a>
        <br>
        <table class="table table-striped">
            <tr>
                <th>ISBN</th>
                <th>Title</th>
                <th>Category</th>
                <th>Author</th>
                <th>Price</th>
                <th>Action</th>
            </tr>
            @foreach($books as $book)
            <tr>
                <td>{{ $book->isbn }}</td>
                <td>{{ $book->title }}</td>
                <td>{{ $book->category }}</td>
                <td>{{ $book->author }}</td>
                <td>{{ $book->price }}</td>
                <td>
                    <a class="btn btn-warning btn-sm" href="{{ route('books.edit', ['isbn' => $book->isbn]) }}">Edit</a>
                    <form method="POST" action="{{ url('/books' . '/' . $book->isbn) }}" accept-charset="UTF-8" style="display:inline">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-danger btn-sm" title="Delete Book" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
        <br />
        Total Rows = {{ $books->count() }}
    </div>
</div>
@endsection