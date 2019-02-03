<?php

namespace App\Http\Controllers;

use App\Mail\NewOrder;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CartController extends Controller
{
    public function update()
    {
        $cart = auth()->user()->cart;
        $cart->status = 'Pending';
        $cart->order_date = Carbon::now();
        $cart->save();

        $admins = User::where('admin', true)->get();
        Mail::to($admins)->send(new NewOrder(auth()->user(), $cart));

        return back()->with('status', 'Tu pedido se ha registrado correctamente');
    }
}
