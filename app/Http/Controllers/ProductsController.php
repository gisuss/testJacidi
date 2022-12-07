<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ProductsController extends Controller
{
    public function index() {
        $products = products::Paginate(10);
        return view('products.index', ['products' => $products]);
    }

    public function create() {   //MUESTRA FORMULARIO VACIO
        return view('products.create');
    }

    public function store(Request $request) {   //RECIBE EL POST DEL CREATE        
        $campos = [
            'name'          => 'required|min:8',
            'description'   => 'required|min:15|max:255',
            'price'         => 'required',
        ];

        $mensaje = [
            'description.required' => 'La descripción para el producto es requerida.',
            'price.required' => 'El precio para el producto es requerido.',
            'name.required' => 'El nombre para el producto es requerido.',
            'description.min' => 'La descripción del producto debe ser mayor a 15 caracteres.',
            'description.max' => 'La descripción del producto debe ser menor a 255 caracteres.',
            'name.min' => 'El nombre del producto debe ser mayor a 8 caracteres.'
        ];

        $this->validate($request, $campos, $mensaje);

        $product = products::create([
            'name'          =>  $request->name,
            'description'   =>  $request->description,
            'price'         =>  $request->price,
            'user_id'       =>  Auth::user()->id,
        ]);
        $result = $product->save();

        if ($result) {
            return redirect()->route('index.product')->with('success', 'Se creó el producto correctamente.');
        }else{
            return Redirect()->back()->with('error','Producto no creado.');
        }
    }

    public function edit($id) {
        $product = products::find($id);        
        
        //Revisa que el usuario exista
        if (isset($product)) {
            return view('products.edit', compact('product'));
        }else{
            return Redirect()->back()->with('error','Producto no encontrado.');
        }
    }

    public function update($id, Request $request) {
        $product = products::find($id);
        
        //Revisa que el usuario exista
        if (isset($product)) {
            $request->validate([
                'name'          => 'required|min:8',
                'description'   => 'required|min:15|max:255',
                'price'         => 'required',
            ]);

            $product->name = $request->name;
            $product->description = $request->description;
            $product->price = $request->price;
            $product->save();

            return redirect()->route('index.product')->with('success','Producto Editado Correctamente.');
        }
    }

    public function show($id) {
        $product = products::find($id);
        if(isset($product)) {
            return view('products.show', compact('product'));
        }else{
            return Redirect()->back()->with('error','Producto no encontrado.');
        }
    }

    public function destroy($id) {
        products::destroy($id);
        return redirect()->route('index.product')->with('success',"Producto Eliminado Correctamente.");
    }

    public function reporte(Request $request) {
        $date_ini = $request->input('fecha').' 00:00:00';
        $date_fin = $request->input('fecha').' 23:59:59';
        $products = products::whereBetween('created_at', [$date_ini, $date_fin])->get();
        return view('products.reporte', compact('products'));
    }
}
