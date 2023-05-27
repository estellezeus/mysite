<?php
/**
 * Created by PhpStorm.
 * User: tgb17
 * Date: 09/04/17
 * Time: 16:59
 */

namespace App\Repositories;


abstract class ResourceRepository {

    protected $model;

    public function store($inputs) {
        return $this->model->create($inputs);
    }
    public function update($id, $inputs) {
        $this->getById($id)->update($inputs);
    }

    public function destroy($id) {
        $this->getById($id)->delete();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getAll(){
        return $this->model->orderBy('created_at', "desc")->get();
    }
    public function getById($id) {
        return $this->model->where('id', $id)->first();
    }
    public function getByEmail($email){
        $result = $this->model->where('email',$email)->first();
        return  $result;
    }


}

