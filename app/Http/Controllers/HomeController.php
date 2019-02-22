<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Author;
use App\Book;

/**
 * Spliting this controller into BookController and AuthorController will allow for better organization as the app grows
 * - remember to update routes and references when spliting out this file
 * 
 * Missing proper doc blocks on all actions
 */

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
    public function authors()
    {
        $authors = Author::all();

        return view('authors', compact('authors'));
    }

    /**
     * This action needs to have validation
     * @link https://laravel.com/docs/5.7/validation#form-request-validation
     * Create app/Http/Requests/AuthorRequest.php
     * Create rules inside AuthorRequest.php
     * Example:
     * public function rules(){
     *  return [
     *      'name' => ['required', 'string'],
     *      'birthday' => ['required', 'date'],
     *      'biography' => ['required']
     *  ];
     * }
     * 
     * Then change this functions signature to 
     *  public function addAuthor(AuthorRequest $request)
     * 
     * add inside the method
     * $validated = $request->validated();
     */
    public function addAuthor()
    {

        /**
         * Use Mass Assign to get this done faster
         *  - must have set up fillable in the model first
         * Example:
         *  Author::create($request->all());
         */
        $author = new Author;
        $author->name = $_POST['name'];
        $author->birthday = $_POST['birthday'];
        $author->biography = $_POST['biography'];
        $author->save();

        session()->flash('status', 'Author Added!');
        return redirect('authors');
    }
    public function deleteAuthor($author_id)
    {
        /**
         * This can be reduced to 
         * Author::find($author_id)->delete();
         */
        DB::table('authors')->where('id', $author_id)->delete();

        session()->flash('status', 'Author Deleted!');
        return redirect('authors');
    }

    public function books()
    {
        $books = Book::all();

        return view('books', compact('books'));
    }

    /**
     * This action needs to have validation
     * @link https://laravel.com/docs/5.7/validation#form-request-validation
     * Create app/Http/Requests/BookRequest.php
     * Create rules inside BookRequest.php
     * Example:
     * public function rules(){
     *  return [
     *      'title' => 'required|string',
     *      'publication_date' => 'required|date',
     *      'author_id' => 'required|exists:author,',
     *      'description' => 'required',
     *      'pages' => 'required|integer'
     *  ];
     * }
     * 
     * Then change this functions signature to 
     *  public function addBook(BookRequest $request)
     * 
     * add inside the method
     * $validated = $request->validated();
     */
    public function addBook()
    {

         /**
         * Use Mass Assign to get this done faster
         *  - must have set up fillable in the model first
         * Example:
         *  Book::create($request->all());
         */
        $book = new Book;
        $book->title = $_POST['title'];
        $book->author_id = $_POST['author_id'];
        $book->publication_date = $_POST['publication_date'];
        $book->description = $_POST['description'];
        $book->pages = $_POST['pages'];
        $book->save();

        session()->flash('status', 'Book Added!');
        return redirect('books');
    }
    public function deleteBook($book_id)
    {
        /**
         * This can be reduced to 
         * Book::find($book_id)->delete();
         */
        DB::table('books')->where('id', $book_id)->delete();

        session()->flash('status', 'Book Deleted!');
        return redirect('books');
    }
}
