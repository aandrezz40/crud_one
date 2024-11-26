<?php
namespace App\services;
use App\Models\Categoria;
Class CategoriaService{
    public function getCategorys(){
        $categorias = Categoria::all();
        return $categorias;
    }
}