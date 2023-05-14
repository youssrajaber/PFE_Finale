<?php

namespace App\Http\Controllers;

use App\Models\cart;
use App\Models\commande;
use App\Models\produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class cartController extends Controller
{
    public function show()
    {
        return view('products.Panier');
    }
    public function store($id)
    {
        $userid = auth()->user()->id;
        $count = DB::table('carts')
            ->where('idUser', '=', $userid)
            ->where('idPrd', '=', $id)
            ->count();
        //totale DB
        $prod2 = DB::table('produits')
            ->join('carts', 'produits.id', '=', 'carts.idPrd')
            ->where('carts.idUser', '=', auth()->user()->id)
            ->sum('produits.prix');
        $productPrice = DB::table('produits')->where('id', $id)->value('prix');
        $quantity = DB::table('carts')->where('idPrd', $id)->value('quantite');
        $totalPrice = $productPrice * $quantity;

        $quantitePrd = DB::table('produits')
            ->where('id', '=', $id)
            ->value('quantite');
        if ($count > 0) {
            $quantite = DB::table('carts')
                ->where('idUser', '=', $userid)
                ->where('idPrd', '=', $id)
                ->value('quantite');

            DB::table('carts')
                ->where('idUser', '=', $userid)
                ->where('idPrd', '=', $id)
                ->update(['quantite' =>  $quantite + 1]);
            // dd($quantitePrd);


        } else {
            $idd = $id;
            cart::create([
                'idUser' => auth()->user()->id,
                'idPrd' => $idd,
                'totale' => $totalPrice
            ]);
            DB::table('produits')
                ->where('id', '=', $id)
                ->update(['quantite' =>  $quantitePrd - 1]);
        }
        return redirect()->route('affichage')->with('success', 'votre produit est bien ajouter');
    }
    public function affiche(Request $req)
    {
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

        return  view('products.Cart', compact('prod', 'totalPrix'));
    }
    public function deleteItem($id, $quantite)
    {

        $pn = cart::where('idPrd', $id)
            ->where('idUser', auth()->user()->id)
            ->first();
        $pn->delete();

        $quantitePrd = DB::table('produits')
            ->where('id', '=', $id)
            ->value('quantite');

        DB::table('produits')
            ->where('id', '=', $id)
            ->update(['quantite' =>  $quantitePrd + $quantite]);
        return redirect()->route('affichage')->with('success', 'supprimer avec succes');
    }
    public function updateItem(Request $req)
    {
        $quantite = DB::table('produits')
            ->select('quantite')
            ->where('id', '=', $req->id)
            ->value('quantite');

        $newQuantite = $req->quantity;
        if( ($quantite - $newQuantite) <0){
            return redirect()->route('affichage')->with('success','max Quantite '.$quantite);
        }

        DB::table('carts')
            ->join('produits', 'produits.id', '=', 'carts.idPrd')
            ->where('carts.idUser', '=', auth()->user()->id)
            ->where('carts.idPrd', '=', $req->id)
            ->update(['carts.quantite' => $newQuantite]);

        // dd($quantite);
        DB::table('produits')
            ->select('quantite')
            ->where('id', '=', $req->id)
            ->update(['quantite' => (int)$quantite - $newQuantite]);
        return redirect()->route('affichage');
    }
    public function panier()
    {
        return view('products.Cart');
    }
}
