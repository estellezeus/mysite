<?php

namespace App\Http\Controllers;

use App\Repositories\Book\BookRepository;
use App\Repositories\CategoryRepository;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $categoryRepository;
    protected $bookRepository;

    public function __construct(CategoryRepository $categoryRepository, BookRepository $bookRepository)
    {
        $this->categoryRepository = $categoryRepository;
        $this->bookRepository = $bookRepository;
    }

    public function index()
    {
        $categories = $this->categoryRepository->getAll();
        $nbCategories = count($categories);

        session(["nbCateg"=>$nbCategories]);

        return view('Backend.Categories.index', compact('categories'));
    }


    public function create()
    {
        //dd('in');
        return view('Backend.Categories.create');
    }


    public function store(Request $request)
    {
        $inputs = $request->input();
        try {
            $this->categoryRepository->store($inputs);

            return redirect(route('categories.index'))->with(["status"=>"success", "message"=>"Catégorie créée avec succès !"]);
        }catch (\Exception $e){
            dd($e);
            return redirect()->back()->with(["status"=>"error", "message"=>$e->getMessage()]);
        }
    }


    public function show($id)
    {
        try {
            $category = $this->categoryRepository->getById($id);

            if($category){

                return view('Backend.Categories.show', compact('category'));

            }else{
                return back()->with(["status"=>"warning", "message"=>"La catégorie que vous voulez visualiser n'existe pas !"]);
            }

        }catch (\Exception $e){
            dd($e);
            return back()->with(["status"=>"error", "message"=>$e->getMessage()]);
        }
    }


    public function edit($id)
    {
        try {
            $category = $this->categoryRepository->getById($id);

            if($category){
                return view('Backend.Categories.edit', compact('category'));
            }else{
                return back()->with(["status"=>"warning", "message"=>"La catégorie que vous voulez mettre à jour n'existe pas !"]);
            }
        }catch (\Exception $e){
            return redirect()->back()->with(["status"=>"error", "message"=>$e->getMessage()]);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $inputs = $request->all();

            $category = $this->categoryRepository->getById($id);

            if($category){

                $this->categoryRepository->update($id, $inputs);

                return $this->index()->with(["status"=>"success", "message"=>"Catégorie mise à jour avec succès !"]);
            }else{
                return back()->with(["status"=>"warning", "message"=>"La catégorie que vous voulez mettre à jour n'existe pas !"]);
            }

        }catch (\Exception $e){
            //dd($e);
            return back()->with(["status"=>"error", "message"=>$e->getMessage()]);
        }
    }


    public function destroy($id)
    {
        try {
            $category = $this->categoryRepository->getById($id);
            $books = $this->bookRepository->getAll();

            if($category){
                foreach ($books as $book){
                    if($book->category_id === $id){
                        return back()->with(["status"=>"info", "message"=>"Vous ne pouvez pas supprimer cette catégorie, car elle est utilisée !"]);
                    }
                }

                $this->categoryRepository->destroy($id);

                return back()->with(["status"=>"success", "message"=>"Catégorie supprimée avec succès"]);
            }else{
                return back()->with(["status"=>"warning", "message"=>"La catégorie que vous voulez supprimer n'existe pas !"]);
            }

        }catch (\Exception $e){
            dd($e);
            return back()->with(["status"=>"error", "message"=>$e->getMessage()]);
        }

    }
}
