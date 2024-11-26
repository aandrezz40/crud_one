<?php 
namespace App\services;
use App\Models\Producto;

Class ProductoService{
    public function getProducto(){
        $producto = Producto::all();
        return $producto;
    }
}