<?php

namespace App\Repositories\Book;

use App\Models\Book;
use App\Repositories\ResourceRepository;
use Illuminate\Support\Collection;


class BookRepository extends ResourceRepository {


    public function __construct(Book $book) {
        $this->model = $book;
    }

    public function getById($id)
    {
        return $this->model->with('category')
            ->where('id', $id)
            ->first();
    }

    public function getPublished(){
        return $this->model->with('category')
            ->where('is_published', 1)
            ->orderBy('created_at', 'desc')
            ->get();
    }

    public function getLast3Published(){
        return $this->model->with('category')
            ->where('is_published', 1)
            ->orderBy('created_at', 'desc')
            ->limit(3)
            ->get();
    }

    public function getByCategory($id){
        return $this->model->where('category_id', $id)
            ->orderBy('created_at', 'desc')
            ->limit(6)
            ->get();
    }

}
