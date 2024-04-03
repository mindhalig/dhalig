<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category;
use App\Models\Author;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       
        $search = $request->input('search');
        $perPage = $request->input('perPage', 10); 

        $query = Book::query();

        if ($search) {
            $query->where('name', 'like', "%{$search}%")
                ->orWhere('isbn', 'like', "%{$search}%");
        }

        $books = $query->paginate($perPage);

      
        return view('books.index', compact('books', 'perPage'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $book = new Book;
        $categories = Category::all();
        $authors = Author::all(); 
        return view('books.create', compact('book','categories','authors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'isbn' => 'required|string|max:255',
            'category_id' => 'required',
            'author_id' => 'required',
        ]);

        
        $book = new Book;
        $book->name = $request->name;
        $book->isbn = $request->isbn;
        $book->category_id = $request->category_id;
        $book->author_id = $request->author_id;

        $book->save();

        
        return redirect()->route('books.index')->with('success', 'Book added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $book = Book::findOrFail($id);
        $categories = Category::all(); 
        $authors = Author::all(); 


       
        return view('books.edit', compact('book','categories','authors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'isbn' => 'required|string|max:255',
            'category_id' => 'required',
            'author_id' => 'required',
        ]);

    
        $book = Book::findOrFail($id);

       
        $book->name = $request->name;
        $book->isbn = $request->isbn;
        $book->category_id = $request->category_id;
        $book->author_id = $request->author_id;

      
        $book->save();

       
        return redirect()->route('books.index')->with('success', 'Book updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Book::findOrFail($id); 
        $book->delete();

        return redirect()->route('books.index')->with('success', 'Book deleted successfully.');
    }
    public function toggleStatus(Book $book)
    {
       
        $book->status = !$book->status;


        $book->save();

        return back()->with('success', 'Status changed successfully.');
    }
}
