<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proveedor;

class ProveedorController extends Controller
{
    public function index(){
        $proveedors = Proveedor::all();
        return view("proveedor", compact("proveedors"));
    }
    
    public function createProveedor(Request $request){
        $validate = $request->validate(
            [
                'name' => 'required|unique:proveedors|max:255',
                'direction'=> 'required',
                'phone' => 'required',
                'email' => 'required|email',
                'contact' => 'required',
                'description' => 'required'

            ]
        );
        Proveedor::created($validate);
        $proveedors = Proveedor::all();
        return view("proveedor", compact("proveedors"));
    }

    public function updateProveedor(Request $request){
        $validate = $request->validate(
            [
                'name' => 'required|unique:proveedors|max:255',
                'direction'=> 'required',
                'phone' => 'required',
                'email' => 'required|email',
                'contact' => 'required',
                'description' => 'required'

            ]
        );
        Proveedor::where('id',$request->id)->update($validate);
    }
    public function deleteProveedor($id){
        Proveedor::destroy($id);
    }
}