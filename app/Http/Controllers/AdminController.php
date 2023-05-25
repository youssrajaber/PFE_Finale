<?php

namespace App\Http\Controllers;

use App\Models\categories;
use App\Models\commande;
use App\Models\contact;
use App\Models\produit;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        $totalprd = produit::all()->count();
        $totalcmd = commande::all()->count();
        $totalusers = User::all()->count();
        return view('dashboard.dashboard', compact('totalprd', 'totalcmd', 'totalusers'));
    }
    public function AllOrder()
    {
        $allOrders = DB::table('commandes')
            ->join('users', 'commandes.idUser', '=', 'users.id')
            ->select('users.email', 'users.image', 'commandes.date', 'commandes.Adress', 'commandes.Telephone', 'commandes.total', 'commandes.payment')
            ->get();
        return view('dashboard.AdminOrder', compact('allOrders'));
    }
    public function AllPrd()
    {
        $allPrd = produit::all();
        return view('dashboard.Allprd', compact('allPrd'));
    }
    public function AddCategory()
    {
        $showAll = categories::all();
        return view('dashboard.AddCategory', compact('showAll'));
    }
    public function store(Request $req)
    {
        $nomCat = $req->add;
        categories::create([
            'nom' => $nomCat,
        ]);
        return  back();
    }
    public function destroyCat($id)
    {
        $p = categories::find($id);
        DB::table('produits')->where('idCat', $id)->delete();
        $p->delete();
        return redirect()->back();
    }
    // public function showCategory($id)
    // {
    //     $categoryName = DB::table('categories')
    //         ->where('id', $id)
    //         ->value('nom');

    //     $categoryProducts = DB::select('Select * from produits where idCat =' . $id);
    //     return view('dashboard.allCategoryProducts', compact('categoryProducts', 'categoryName'));
    // }
    public function messages()
    {
        $messages = contact::all();
        return view('components.messages', compact('messages'));
    }
    public function clients()
    {
        $clients = User::where('role', 'USER')->get();
        return view('dashboard.clients', compact('clients'));
    }
    public function clientsDelete($id)
    {
        $clients = User::find($id);
        $clients->delete();
        return redirect()->back();
    }
}
