<?php

namespace App\Http\Controllers;

use App\CartDetail;
use App\Product;
use Illuminate\Http\Request;

class CartDetailController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request)
    {
        $cartDetail = new CartDetail();
        $cartLine = CartDetail::where('product_id', '=', $request->product_id)->where('cart_id', '=', auth()->user()->cart->id)->first();
        $producto = Product::find($request->product_id);


        if($request->quantity > $producto->quantity){
            return  back()->with('error', 'Ha seleccionado más cantidad de la disponible. Solo quedan ' . $producto->quantity . " unidades. Por favor vuelva a seleccionar el producto" );
        }


        if($cartLine){
            $cartLine->quantity += $request->quantity;
            $cartLine->total = Product::find($request->product_id)->price * $cartLine->quantity;
            $cartLine->save();
        }else{
            $cartDetail->cart_id = auth()->user()->cart->id;
            $cartDetail->product_id = $request->product_id;
            $cartDetail->quantity = $request->quantity;
            $cartDetail->total = Product::find($request->product_id)->price * $cartDetail->quantity;
            $cartDetail->save();
        }



        return back()->with('status', 'El producto se ha añadido al carrito');
    }

    public function destroy(Request $request)
    {
        $cartDetail = CartDetail::find($request->cart_detail_id);
        if ($cartDetail->cart_id == auth()->user()->cart->id) {
            $cartDetail->delete();
        }

        return back()->with('status', 'El producto se ha eliminado correctamente');
    }
}
