<?php

namespace App\Http\Controllers;

use App\Models\cart;
use App\Models\commande;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

// use Stripe;

use Stripe;
use Charge;
use Illuminate\Support\Facades\DB;

class PaymentContoller extends Controller
{
    // public function cash()
    // {
    //     DB::table('carts')->where('idUser', 1)->delete();


    //     return redirect()->back()->with('success', 'tamamo Tamam KOlxi khales!!!');
    // }
    public function stripe($totalPrix)
    {
        return view('products.Payment', compact('totalPrix'));
    }

    public function stripePost(Request $request, $totalPrix)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        Stripe\Charge::create([
            "amount" => $totalPrix * 100,
            "currency" => "usd",
            "source" => $request->stripeToken,
            "description" => " thanks for payment ."
        ]);

        $cart = cart::where('idUser', Auth::user()->id)->first();
        if ($cart) {
            commande::create([
                'idUser' => $cart->idUser,
                'idCart' => $cart->id,
                'date' => date('Y-m-d-H:i'),
                'Adress' => auth()->user()->Adress,
                'Telephone' => auth()->user()->Telephone,
                'total' => $cart->totale,
                'payment' => 'Card',
            ]);
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
            DB::table('carts')
                ->join('commandes', 'commandes.idCart', '=', 'carts.id')
                ->where('carts.idUser', Auth::user()->id)
                ->delete();
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        }

        Session::flash('success', 'Payment successful!');

        return redirect('/');
    }
    public function payInfosget()
    {
        return view('login.PayCach');
    }
    public function payInfos(Request $req)
    {
        $phone = $req->phone;
        $addrs = $req->addrs;

        $cart = cart::where('idUser', Auth::user()->id)->first();
        if ($cart) {
            commande::create([
                'idUser' => $cart->idUser,
                'idCart' => $cart->id,
                'date' => date('Y-m-d-H:i'),
                'Adress' => $addrs,
                'Telephone' => $phone,
                'total' => $cart->totale,
                'payment' => 'Cash',
            ]);

            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
            DB::table('carts')
                // ->join('commandes', 'commandes.idCart', '=', 'carts.id')
                ->where('carts.idUser', Auth::user()->id)
                ->delete();
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        }
        return redirect('/')->with('success', 'tamamo Tamam  !!!');
    }
}
