<?php

namespace App\Http\Controllers;

use App\Models\categories;
use App\Models\commande;
use App\Models\contact;
use App\Models\historique;
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
        $totalcontact = contact::all()->count();

        $totalusers = User::where('role', 'USER')->count();

        $messages = $this->messages();
        return view('dashboard.dashboard', compact('totalprd', 'totalcmd', 'totalusers', 'messages', 'totalcontact'));
    }
    public function AllOrder()
    {
        $messages = $this->messages();
        $allOrders = DB::table('commandes')
            ->join('users', 'commandes.idUser', '=', 'users.id')
            ->select('users.email', 'users.image', 'commandes.date', 'commandes.Adress', 'commandes.Telephone', 'commandes.total', 'commandes.payment')
            ->paginate(4);
        $totalcontact = contact::all()->count();
        return view('dashboard.AdminOrder', compact('allOrders', 'messages', 'totalcontact'));
    }
    public function AllPrd()
    {
        $messages = $this->messages();
        $allPrds = produit::paginate(4);
        $totalcontact = contact::all()->count();
        return view('dashboard.Allprd', compact('allPrds', 'messages', 'totalcontact'));
    }
    public function AddCategory()
    {
        $showAll = categories::all();
        $messages = $this->messages();
        $totalcontact = contact::all()->count();

        return view('dashboard.AddCategory', compact('showAll', 'messages', 'totalcontact'));
    }
    public function store(Request $req)
    {
        $nomCat = $req->add;
        $img = $req->file('image');
        $extension = $img->getClientOriginalName();
        $image_name = time() . '_' . $extension;
        $img->move(public_path('images'), $image_name);


        categories::create([
            'nom' => $nomCat,
            'image' => $image_name
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

    public function messages()
    {
        $messages = contact::all();
        return $messages;
    }

    public function messagesView()
    {
        $messages = contact::all();
        $totalcontact = contact::all()->count();
        return view('components.messages', compact('messages', 'totalcontact'));
        // return view('components.Dashboard-Admin', compact('messages'));

    }
    public function msgadmin()
    {
        $messages = $this->messages();
        $totalcontact = contact::all()->count();
        return view('dashboard.dashboard', compact('messages', 'totalcontact'));
    }
    public function clients()
    {
        $clients = User::where('role', 'USER')->get();
        $messages = $this->messages();
        $totalcontact = contact::all()->count();
        return view('dashboard.clients', compact('clients', 'messages', 'totalcontact'));
    }
    public function clientsDelete($id)
    {
        $clients = User::find($id);
        $clients->delete();
        return redirect()->back();
    }
}
