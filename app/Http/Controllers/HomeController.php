<?php

namespace App\Http\Controllers;

use App\Models\categories;
use App\Models\contact;
use App\Models\produit;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;



class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'home', 'Allproducts']);
    }
    public function Allproducts()
    {

        $All = produit::all();
        $paramss = $this->Menu();
        $prod = $paramss[0];
        $totalPrix = $paramss[1];
        $count = $paramss[2];
        return view('components.Allproducts', compact('All', 'prod', 'totalPrix', 'count'));
    }
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
    public function index()
    {
        $paramss = $this->Menu();
        $prod = $paramss[0];
        $totalPrix = $paramss[1];
        $count = $paramss[2];
        $productss = produit::paginate(4);
        $categories = categories::all();
        // $All = produit::all();
        return view('products.indexP', compact('productss', 'categories', 'prod', 'totalPrix', 'count'));
    }


    public function create()
    {
        $messages = $this->messages();
        $showAll = categories::all();
        $totalcontact = contact::all()->count();
        return view('dashboard.CreatePrd', compact('showAll', 'messages', 'totalcontact'));
    }
    public function store(Request $req)
    {

        $nom = $req->nom;
        $prix = $req->prix;
        $quantity = $req->Qnt;
        $category = $req->category;
        $description = $req->description;

        $img = $req->image;
        $extension = $img->getClientOriginalName();
        $image_name = time() . '_' . $extension;
        $img->move(public_path('images'), $image_name);
        $req->validate([
            'nom' => 'required',
            'prix' => 'required',
        ]);

        //insertion
        produit::create([
            'nom' => $nom,
            'prix' => $prix,
            'image' => $image_name,
            'quantite' => $quantity,
            'Discription' => $description,
            'idCat' => $category
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
        $paramss = $this->Menu();
        $prod = $paramss[0];
        $totalPrix = $paramss[1];
        $count = $paramss[2];
        $id = $req->id;
        $product = produit::findOrFail($id);
        return  view('products.show', compact('product', 'prod', 'totalPrix', 'count'));
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
    public function contact()
    {
        return view('components.contactus');
    }
    public function contactPost(Request $req)
    {

        $fullname = $req->fullname;
        $email = $req->email;
        $subject = $req->subject;
        $area = $req->area;

        contact::create([
            'fullname' => $fullname,
            'email' => $email,
            'subject' => $subject,
            'textErea' => $area
        ]);

        return  redirect()->back();
    }

    public function showCategory($id)
    {
        $paramss = $this->Menu();
        $prod = $paramss[0];
        $totalPrix = $paramss[1];
        $count = $paramss[2];

        $categoryName = DB::table('categories')
            ->where('id', $id)
            ->value('nom');

        $categoryProducts = DB::select('Select * from produits where idCat =' . $id);
        return view('dashboard.allCategoryProducts', compact('categoryProducts', 'categoryName', 'prod', 'totalPrix', 'count'));
    }

    // Message
    public function messages()
    {
        $messages = contact::all();
        return $messages;
    }

    public function search(Request $req)
    {
        $paramss = $this->Menu();
        $prod = $paramss[0];
        $totalPrix = $paramss[1];
        $count = $paramss[2];

        $inptname = $req->search;
        $All = DB::table('produits')
            ->where('nom', 'LIKE', '%' . $inptname . '%')
            ->get();
        return view('components.Allproducts', compact('All', 'prod', 'totalPrix', 'count'));
    }
}
