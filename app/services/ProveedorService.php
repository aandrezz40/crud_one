<?php
namespace App\services;
use App\Models\Proveedor;

Class ProveedorService{
    public function getProveedor(){
        $proveedor = Proveedor::all();
        return $proveedor;
    }
}