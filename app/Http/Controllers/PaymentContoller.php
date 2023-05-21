<?php

namespace App\Http\Controllers;

use App\Models\cart;
use App\Models\commande;
use App\Models\historique;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use PDF;

// use Stripe;

use Stripe;
use Charge;
use Illuminate\Support\Facades\DB;

class PaymentContoller extends Controller
{
    public function generatePDF()
    {
        $produits = DB::table('carts')
            ->join('produits', 'produits.id', '=', 'carts.idPrd')
            ->select('produits.nom', 'produits.prix', 'carts.quantite', 'carts.totale')
            ->where('carts.idUser', '=', auth()->user()->id)
            ->get();

        $data = [
            'products' => $produits
        ];

        $pdf = PDF::loadView('products.catalogue', $data);
        return $pdf->download('catalogue.pdf');
    }
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

        $carts = cart::where('idUser', Auth::user()->id)->get();

        if ($carts) {
            foreach ($carts as $cart) {
                commande::create([
                    'idUser' => $cart->idUser,
                    'idCart' => $cart->id,
                    'date' => date('Y-m-d-H:i'),
                    'Adress' => auth()->user()->Adress,
                    'Telephone' => auth()->user()->Telephone,
                    'total' => $cart->totale,
                    'payment' => 'Card',
                ]);
                historique::create([
                    'idUser' => $cart->idUser,
                    'idPrd' => $cart->idPrd,
                    'quantite' => $cart->quantite,
                    'totale' => $cart->totale,
                ]);
            }

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

        $carts = cart::where('idUser', Auth::user()->id)->get();
        if ($carts) {
            foreach ($carts as $carta) {
                commande::create([
                    'idUser' => $carta->idUser,
                    'idCart' => $carta->id,
                    'date' => date('Y-m-d-H:i'),
                    'Adress' => $addrs,
                    'Telephone' => $phone,
                    'total' => $carta->totale,
                    'payment' => 'Cash',
                ]);

                historique::create([
                    'idUser' => $carta->idUser,
                    'idPrd' => $carta->idPrd,
                    'quantite' => $carta->quantite,
                    'totale' => $carta->totale,
                ]);
            }

            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
            DB::table('carts')
                ->where('carts.idUser', Auth::user()->id)
                ->delete();
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        }

        return redirect('/')->with('success', 'tamamo Tamam  !!!');
    }
}
