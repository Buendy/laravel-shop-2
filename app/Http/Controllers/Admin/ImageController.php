<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Product;
use App\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ImageController extends Controller
{
    public function index(Product $product)
    {
        $images = $product->images()->orderBy('featured', 'DESC')->get();

        return view('admin.images.index', compact('images', 'product'));
    }

    public function store(Request $request, Product $product)
    {
        $file = $request->file('photo');
        $path = public_path() . '/images/products';
        $filename = uniqid() . $file->getClientOriginalName();
        $result = $file->move($path, $filename);

        if ($result) {
            $productImage = new ProductImage();
            $productImage->image = $filename;
            $productImage->product_id = $product->id;
            $productImage->save();
        }

        return redirect()->back();
    }

    public function destroy(Product $product, ProductImage $productImage)
    {
        if (substr($productImage->image, 0, 4) == 'http') {
            $deleted = true;
        } else {
            $fullPath = public_path() . '/images/products/' . $productImage->image;
            $deleted = File::delete($fullPath);
        }

        if ($deleted) {
            $productImage->delete();
        }
        return redirect()->back();
    }

    public function select(Product $product, ProductImage $productImage)
    {
        $product->images()->update(['featured' => false]);

        $productImage->featured = true;
        $productImage->save();

        return redirect()->back();
    }
}
