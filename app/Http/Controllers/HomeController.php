<?php

namespace App\Http\Controllers;

use App\Models\categories;
use App\Models\contact;
use App\Models\produit;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        $categories = categories::all();
        return view('products.indexP', compact('productss', 'categories'));
    }
    public function home()
    {
        return view('components.Home');
    }
    public function create()
    {
        $showAll = categories::all();
        return view('dashboard.CreatePrd', compact('showAll'));
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

    public function search(Request $request)
    {


        $keyword = $request->input('keyword');

        $resulta = DB::table('produits')->where('nom', 'LIKE', '%' . $keyword . '%')
            // ->orWhere('Discription', 'LIKE', '%' . $keyword . '%')
            ->get();
        // dd($resulta);


        return view('products.search', compact('resulta'));
    }
}
