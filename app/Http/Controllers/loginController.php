<?php

namespace App\Http\Controllers;

// use App\Models\client;

use App\Models\historique;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class loginController extends Controller
{
    public function create()
    {
        return view('login.signup');
    }
    public function store(Request $req)
    {
        $nom = $req->name;
        $email = $req->email;
        $addrs = $req->addrs;
        $phone = $req->phone;
        $img = $req->img;

        $extension = $img->getClientOriginalName();
        $image_name = time() . '_' . $extension;
        $img->move(public_path('images'), $image_name);


        // $pas = $req->password;
        // dd($req);
        $pas = Hash::make($req->password);
        User::create([
            'name' => $nom,
            'email' => $email,
            'password' => $pas,
            'Adress' => $addrs,
            'Telephone' => $phone,
            'image' => $image_name,
            'role' => User::USER_ROLE,
        ]);
        return redirect('/loginys')->with('success', 'votre compte est bien cree' . $nom);
    }
    public function show()
    {
        return view('login.show');
    }
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');


        if (Auth::attempt($credentials)) {
            return redirect('/')->with('success', 'vous etes bien connecte' . auth()->user()->name);
        }

        // If authentication failed, check if the password is incorrect or the user doesn't exist
        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return redirect()->route('login.show')->withErrors(['email' => 'User not found']);
        }

        if (!Hash::check($request->password, $user->password)) {
            return redirect()->route('login.show')->withErrors(['password' => 'Incorrect password']);
        }
    }
    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect()->route('login.show')->with('success', 'deconecte ! ');
    }
    public function details($name, $email)
    {
        $image = DB::table('users')
            ->where('id', auth()->user()->id)
            ->select('image')
            ->get();

        $count = DB::table('commandes')
            ->join('users', 'commandes.idUser', '=', 'users.id')
            ->where('users.id', auth()->user()->id)
            ->count();
        $historiques = historique::join('produits', 'produits.id', '=', 'historiques.idPrd')
            ->select('produits.nom', 'produits.prix', 'produits.image', 'historiques.quantite', 'historiques.totale')
            ->where('historiques.idUser',  auth()->user()->id)
            ->get();
        // $totalSum = DB::table('historiques')
        //     ->join('users', 'users.id', '=', 'historiques.idUser')
        //     ->where('historiques.idUser', auth()->user()->id)
        //     ->sum('historiques.totale');

        $totalSum = DB::table('historiques')
            ->join('users', 'historiques.idUser', '=', 'users.id')
            ->where('historiques.idUser', auth()->user()->id)
            ->sum('historiques.totale');


        if (auth()->user()->role === 'ADMIN') {
            return view('login.ProfileDetails', compact('email', 'name', 'image', 'count', 'historiques', 'totalSum'));
        } else {
            return view('login.UserDetails', compact('email', 'name', 'image', 'count', 'historiques'));
        }
    }

    public function editProfile(Request $req)
    {
        $user = User::find(auth()->user()->id);

        $nom = $req->nom;
        $email = $req->email;
        $tele = $req->tele;
        $addres = $req->addres;
        $img = $req->image;
        $image_name = $user->image;


        if ($req->has('image')) {
            $extension = $img->getClientOriginalName();
            $image_name = time() . '_' . $extension;
            $img->move(public_path('images'), $image_name);
        }

        $user->update([
            'name' => $nom,
            'email' => $email,
            'Adress' => $addres,
            'Telephone' => $tele,
            'image' => $image_name,

        ]);
        return  back()->with('success', 'profile updated');
    }
}
