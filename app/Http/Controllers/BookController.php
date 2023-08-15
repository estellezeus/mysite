<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Repositories\Book\BookRepository;
use App\Repositories\CategoryRepository;
use Illuminate\Http\Request;

class BookController extends Controller
{
    protected $bookRepository;
    protected $categoryRepository;

    public function __construct(BookRepository $bookRepository, CategoryRepository $categoryRepository)
    {
        $this->bookRepository = $bookRepository;
        $this->categoryRepository = $categoryRepository;
    }

    public function index()
    {
        $books = $this->bookRepository->getAll();
        $nbPublishedBooks = count($this->bookRepository->getPublished());

        session(["nbPubBooks"=>$nbPublishedBooks]);

        return view('Backend.Books.index', compact('books'));
    }


    public function create()
    {
        //dd('in');
        $categories = $this->categoryRepository->getAll();
        return view('Backend.Books.create', compact('categories'));
    }


    public function store(Request $request)
    {
        $inputs = $request->input();
        try {
            $bookCouv = $request->file('image');
            $imageName = str_replace(" ", "_",$request['title']).'.'.$request->file('image')->getClientOriginalExtension();
            $path = $bookCouv->storePubliclyAs('public/books', $imageName);

            $inputs['image'] = $imageName;
            $this->bookRepository->store($inputs);

            return redirect(route('books.index'))->with(["status"=>"success", "message"=>"Le livre a été créé !"]);
        }catch (\Exception $e){
            //dd($e);
            return redirect()->back()->with(["status"=>"error", "message"=>$e->getMessage()]);
        }
    }


    public function show($id)
    {
        try {
            $book = $this->bookRepository->getById($id);

            if($book){

                return view('Backend.Books.show', compact('book'));

            }else{
                return back()->with(["status"=>"warning", "message"=>"Le livre que vous voulez visualiser n'existe pas !"]);
            }

        }catch (\Exception $e){
            dd($e);
            return back()->with(["status"=>"error", "message"=>$e->getMessage()]);
        }
    }


    public function edit($id)
    {
        try {
            $book = $this->bookRepository->getById($id);
            $categories = $this->categoryRepository->getAll();

            if($book){
                return view('Backend.Books.edit', compact('book', 'categories'));
            }else{
                return back()->with(["status"=>"warning", "message"=>"Le livre que vous voulez mettre à jour n'existe pas !"]);
            }
        }catch (\Exception $e){
            return redirect()->back()->with(["status"=>"error", "message"=>$e->getMessage()]);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $inputs = $request->all();

            $book = $this->bookRepository->getById($id);

            if($book){
                if($request->file('image')){
                    $bookCouv = $request->file('image');
                    $imageName = str_replace(" ", "_",$request['title']).'.'.$request->file('image')->getClientOriginalExtension();
                    $path = $bookCouv->storePubliclyAs('public/books', $imageName);
                    $inputs['image'] = $path;
                }

                $this->bookRepository->update($id, $inputs);

                return $this->index()->with(["status"=>"success", "message"=>"Livre mis à jour avec succès !"]);
            }else{
                return back()->with(["status"=>"warning", "message"=>"L'élement que vous voulez mettre à jour n'existe pas !"]);
            }

        }catch (\Exception $e){
            //dd($e);
            return back()->with(["status"=>"error", "message"=>$e->getMessage()]);
        }
    }


    public function destroy($id)
    {
        try {
            $book = $this->bookRepository->getById($id);

            if($book){
                $this->bookRepository->destroy($id);

                return back()->with(["status"=>"success", "message"=>"Livre supprimé avec succès"]);
            }else{
                return back()->with(["status"=>"warning", "message"=>"Le livre que vous voulez supprimer n'existe pas !"]);
            }

        }catch (\Exception $e){
            dd($e);
            return back()->with(["status"=>"error", "message"=>$e->getMessage()]);
        }

    }
}
