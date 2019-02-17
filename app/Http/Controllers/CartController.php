<?php

namespace App\Http\Controllers;

use App\CartDetail;
use App\Mail\NewOrder;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Barryvdh\DomPDF\Facade;

class CartController extends Controller
{
    public function update()
    {
        $cart = auth()->user()->cart;
        $cart->status = 'Pending';
        $cart->order_date = Carbon::now();
        $user = auth()->user();

        $cart->save();

        $admins = User::where('admin', true)->get();
        Mail::to($admins)->send(new NewOrder(auth()->user(), $cart));
        $pdf = Facade::loadView('pdf.invoice', compact('cart','user'));
        return $pdf->download($cart->order_date . '--invoice.pdf');

        //return back()->with('status', 'Tu pedido se ha registrado correctamente');
    }
}
