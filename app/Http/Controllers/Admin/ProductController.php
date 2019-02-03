<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(10);
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::orderBy('name')->get();
        return view('admin.products.create')->with(compact('categories'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required | min:3',
            'description' => 'required | max:200',
            'price' => 'required | numeric | min:0'
        ], [
            'name.required' => 'El nombre es obligatorio',
            'name.min' => 'El nombre ha de tener al menos 3 caracteres',
            'description.required' => 'La descripción es obligatoria',
            'description.max' => 'La descripción no puede tener más de 200 caracteres',
            'price.required' => 'El precio es obligatorio',
            'price.numeric' => 'El precio debe ser un número',
            'price.min' => 'El precio mínimo es cero'

        ]);

        $product = new Product();
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->category_id = $request->input('category_id')!=0 ? $request->input('category_id') : null;
        $product->long_description = $request->input('long_description');
        $product->save();

        return redirect('/admin/products');
    }

    public function edit(Product $product)
    {
        $categories = Category::orderBy('name')->get();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        $this->validate($request, [
            'name' => 'required | min:3',
            'description' => 'required | max:200',
            'price' => 'required | numeric | min:0'
        ], [
            'name.required' => 'El nombre es obligatorio',
            'name.min' => 'El nombre ha de tener al menos 3 caracteres',
            'description.required' => 'La descripción es obligatoria',
            'description.max' => 'La descripción no puede tener más de 200 caracteres',
            'price.required' => 'El precio es obligatorio',
            'price.numeric' => 'El precio debe ser un número',
            'price.min' => 'El precio mínimo es cero'

        ]);

        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->category_id = $request->input('category_id')!=0 ? $request->input('category_id') : null;
        $product->long_description = $request->input('long_description');
        $product->save();

        return redirect('/admin/products');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect('/admin/products');
    }

    public function addStock(Product $product)
    {
        return view('admin.products.add', compact('product'));
    }

    public function addStockUpdate(Request $request, Product $product)
    {
        $this->validate($request, [
            'quantity' => 'required | numeric | min:0 | max:100',
        ],[
            'quantity.required' => 'Debes introducir una cantidad',
            'quantity.numeric' => 'Debes introducir un número',
            'quantity.min' => 'Minimo un producto para añadir',
            'quantity.max' => 'Máximo cien productos para añadir',
        ]);

        $product->quantity += $request->input('quantity');
        $product->save();

        return redirect('/admin/products');


    }

}
