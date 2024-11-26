<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;

class CategoriaController extends Controller
{
    public function index(){
        $categorys = Categoria::all();
        return view("categoria", compact("categorys"));
    }

    public function createCategory(Request $request){
        $validate = $request->validate(
            [
                'name' => 'required|unique:categorias|max:255',
                'description' => 'required'
            ]
        );
        Categoria::created($validate);
    }

    public function setCategory(Request$request){
        $category = $validate = $request->validate(
            [
                'name' => 'required|unique:categorias|max:255',
                'description' => 'required'
            ]
        );
        Categoria::where($request->id)->update($category);
    }

    public function deleteCategory($id){
        Categoria::destroy($id);
    }
}