<?php
namespace App\Repositories;
use App\Repositories\Interfaces\CategoryRepositoryInterface;
use App\Models\Category;

class CategoryRepository Implements CategoryRepositoryInterface{

    public function all(){
        return Category::get();
    }

    public function get($id){
        return Category::find($id);
    }

    public function store(array $data){
        return Category::create($data);
    }

    public function update($id, array $data){
        return Category::find($id)->update($data);
    }

    public function delete($id){
        return Category::destroy($id);
    }
}