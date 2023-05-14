<?php

namespace App\Http\Controllers;

use App\Models\produit;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'home']);
        //  ta teEml login add dkhol
        //specifie ->only('home') drr login
        //specifie ->except(['home']) kolxi khadam b login ela home
        //
    }
    public function index()
    {
        $productss = produit::paginate(4);
        return view('products.indexP', compact('productss'));
    }
    public function home()
    {
        return view('components.Home');
    }
    public function create()
    {
        return view('products.CreatePrd');
    }
    public function store(Request $req)
    {
        $nom = $req->nom;
        $prix = $req->prix;
        $quantity = $req->Qnt;
        $img = $req->image;
        $extension = $img->getClientOriginalName();
        $image_name = time() . '_' . $extension;
        $img->move(public_path('images'), $image_name);
        $req->validate([
            'nom' => 'required',
            'prix' => 'required',
            // 'quantite'=>'required'
        ]);
        //insertion
        produit::create([
            'nom' => $nom,
            'prix' => $prix,
            'image' => $image_name,
            'quantite' => $quantity
        ]);
        return redirect()->route('AllPrd')->with('success', 'votre produit est bien cree');
    }
    public function destroy($id)
    {
        $pr = produit::find($id);
        $pr->delete();
        return redirect()->route('AllPrd')->with('success', 'votre produit est bien supprimer');
    }
    public function show(Request $req)
    {
        $id = $req->id;
        $product = produit::findOrFail($id);
        return  view('products.show', compact('product'));
    }
    public function edit($id)
    {
        $pr = produit::find($id);
        return  view('products.update', compact('pr'));
    }
    public function update(Request $request, $id)
    {
        // validation des chapms :
        $request->validate([
            'nom' => 'required',
            'prix' => 'required',
        ]);

        // récupérer l'objet article via l'id

        $productedit = produit::find($id);

        if ($request->has('image')) {
            $file = $request->image;
            $extension = $file->getClientOriginalName();
            $image_name = time() . '_' . $extension;
            $file->move(public_path('images'), $image_name);
            $productedit->image = $image_name;
        }
        // update with save
        $productedit->nom = $request->input('nom');
        $productedit->prix = $request->input('prix');
        $productedit->quantite = $request->input('quantite');
        $productedit->save();

        return redirect()->route('AllPrd')->with('success', 'You have successfully updated an products.');
    }
}
