<?php

namespace App\Http\Controllers;

use App\Models\commande;
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
        // return view('login.Dashbord',compact('totalprd','totalcmd','totalusers'));
        return view('login.index', compact('totalprd', 'totalcmd', 'totalusers'));
    }
    public function AllOrder()
    {
        // $user_id = Auth::user()->id;
        $allOrders = DB::table('commandes')
            ->join('users', 'commandes.idUser', '=', 'users.id')
            // ->where('users.id', $user_id)
            ->select('users.email', 'users.image', 'commandes.date', 'commandes.Adress', 'commandes.Telephone', 'commandes.total', 'commandes.payment')
            ->get();

        // dd($allOrder);

        return view('login.AdminOrder', compact('allOrders'));
    }
    public function AllPrd()
    {
        $allPrd = produit::all();
        return view('dashboard.Allprd', compact('allPrd'));
    }
}
