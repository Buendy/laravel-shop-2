<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function show(Request $request)
    {
        $query = $request->input('query');
        $products = Product::where('name', 'like', '%'.$query.'%')->paginate(6);

        if ($products->count() == 1) {
            return redirect('/products/' . $products->first()->id);
        }

        return view('search.show', compact('products', 'query'));
    }

    public function data()
    {
        $products = Product::pluck('name');
        return $products;
    }
}
