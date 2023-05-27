<?php

namespace App\Repositories;

use App\Models\Category;
use App\Repositories\ResourceRepository;
use Illuminate\Support\Collection;


class CategoryRepository extends ResourceRepository {


    public function __construct(Category $category) {
        $this->model = $category;
    }

    public function getById($id)
    {
        return $this->model->with('books')
            ->where('id', $id)
            ->first();
    }

}
