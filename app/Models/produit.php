<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class produit extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom',
        'prix',
        'image',
        'quantite'
    ];
    // public function commande(){
    //     return $this->belongsTo(commande::class);
    // }
    public function cart(){
        return $this->belongsTo(cart::class);
    }
}
