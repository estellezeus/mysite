<?php

namespace App\Http\Controllers;

use App\Repositories\Book\BookRepository;
use App\Repositories\CategoryRepository;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $bookRepository;
    protected $categoryRepository;

    public function __construct(BookRepository $bookRepository, CategoryRepository $categoryRepository)
    {
        $this->bookRepository = $bookRepository;
        $this->categoryRepository = $categoryRepository;
    }

    public function welcome(){
        $last3Books = $this->bookRepository->getLast3Published();

        $segments = \Request::segments();

        return view('welcome', compact('last3Books', 'segments'));
    }

    public function bookDetails($id){
        try {
            $book = $this->bookRepository->getById($id);
            $categories = $this->categoryRepository->getAll();
            $books = $this->bookRepository->getByCategory($book->category_id);
            $segments = \Request::segments()[0];

            return view('frontend.books.show', compact('book', 'categories', 'books', 'segments'));

        }catch (\Exception $e){
            dd($e);
        }
    }

    public function booksList(){
        try {
            $books = $this->bookRepository->getPublished();
            $categories = $this->categoryRepository->getAll();
            $segments = \Request::segments()[0];


            return view('frontend.books.index', compact('books', 'categories', 'segments'));
        }catch (\Exception $e){
            //dd($e);
        }
    }
}
