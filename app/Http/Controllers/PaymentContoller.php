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
    public function Menu()
    {
        //         
        if (Auth::user()) {
            $prod = DB::table('produits')
                ->join('carts', 'carts.idPrd', '=', 'produits.id')
                ->select('produits.id', 'produits.nom', 'produits.quantite', 'produits.prix', 'produits.image', 'carts.quantite')
                ->where('carts.idUser', '=', auth()->user()->id)
                ->get();
            $getTotal = DB::table('produits')
                ->join('carts', 'produits.id', '=', 'carts.idPrd')
                ->select('produits.prix', 'carts.quantite')
                ->where('carts.idUser', '=', auth()->user()->id)
                ->get();
            $totalPrix = (int)'carts.quantite';
            foreach ($getTotal as $item) {
                $prix = $item->prix;
                $quantity = $item->quantite;
                $totalPrix += $prix * $quantity;
            };
            DB::table('carts')
                ->join('produits', 'produits.id', '=', 'carts.idPrd')
                ->where('carts.idUser', '=', auth()->user()->id)
                ->update(['carts.totale' => $totalPrix]);

            $count = DB::table('carts')->where('carts.idUser', '=', auth()->user()->id)->count();
        } else {
            $prod = null;
            $totalPrix = null;
            $count = null;
        }
        // return view('components.Menu', compact('prod', 'totalPrix', 'count'));
        return [$prod, $totalPrix, $count];
    }
    public function generatePDF()
    {
        $produits = DB::table('carts')
            ->join('produits', 'produits.id', '=', 'carts.idPrd')
            ->select('produits.nom', 'produits.prix', 'carts.quantite', 'carts.totale')
            ->where('carts.idUser', '=', auth()->user()->id)
            ->get();
        $total = DB::table('carts')
            ->where('idUser', '=', auth()->user()->id)
            ->value('totale');

        $data = [
            'products' => $produits,
            'total' => $total
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
        $paramss = $this->Menu();
        $prod = $paramss[0];
        $totalPrix = $paramss[1];
        $count = $paramss[2];
        return view('login.PayCach', compact('prod', 'totalPrix', 'count'));
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

        return redirect('/')->with('success', '  Parfait!!!');
    }
}
