<?php

namespace App\Http\Controllers;
use App\Models\Producto;
use App\services\ProductoService;
use App\services\CategoriaService;
use App\services\ProveedorService;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function home(Request $request, ProductoService $productoService, CategoriaService $categoriaService, ProveedorService $proveedorService){
        
        $products = $productoService->getProducto();
        $categorys = $categoriaService->getCategorys();
        $providers = $proveedorService->getProveedor();
        return view('home', ['products'=>$products, 'categorys'=>$categorys, 'providers'=>$providers]);
    }
    public function createProduct(Request $request){
        $validate = $request->validate(
            [
                'product' => 'required|max:255|unique:productos',
                'description' => 'required|max:1000',
                'price' => 'required',
                'stock' => 'required',
                'id_categoria' => 'required|numeric',
                'id_proveedor' => 'required|numeric'
            ]
            );
            Producto::created($validate);
        
    }
    public function updateProducto(Request $request, $id){
        $validate = $request->validate(
            [
                'product' => 'required|max:255|unique:productos',
                'description' => 'required|max:1000',
                'price' => 'required',
                'stock' => 'required',
                'id_categoria' => 'required|numeric',
                'id_proveedor' => 'required|numeric'
            ]
        );

        Producto::where('id',$id)->update($validate);
    }
    public function destroyProducto($id){
        Producto::destroy($id);
    }
}