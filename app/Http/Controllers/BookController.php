<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\BookCopy;


class BookController extends Controller
{   
    public function index(Request $request)
    {
        $query = Book::query();

        // Search title or author
        if ($request->search) {
            $query->where(function ($q) use ($request) {
                $q->where('title', 'like', '%' . $request->search . '%')
                ->orWhere('author', 'like', '%' . $request->search . '%');
            });
        }

        // Category filter
        if ($request->filter) {
            $query->where('category', $request->filter);
        }

        $books = $query->with('copies')->get();

        return view('books', compact('books'));
    }

    public function books()
    {
        $books = Book::with('copies')->get();

        return view('books', ['books' => $books]);
    }

    public function addBook(Request $request) {

        $coverImagePath = null;
        if ($request->hasFile('cover_image')) {
            $coverImagePath = $request->file('cover_image')->store('book-covers', 'public');
        }
        $book = Book::create([
            'title' => $request->title,
            'author' => $request->author,
            'isbn' => $request->isbn,
            'publisher' => $request->publisher,
            'publication_year' => $request->publication_year,
            'category' => $request->category,
            'shelf_location' => $request->shelf_location,
            'description' => $request->description,
            'cover_image' => $coverImagePath,
            
        ]);

        for ($i = 0; $i < $request->copies; $i++) {

            $bookCopy = BookCopy::create([
                'book_id' => $book->id,
                'status' => 'available',
                'condition' => 'new',
            ]);

            $bookCopy->update([
                'accession_number' => 'LIB-' . $bookCopy->id,
            ]);
        }

        return redirect('/books');
    }
}