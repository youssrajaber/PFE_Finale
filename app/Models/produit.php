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
        'quantite',
        'Discription',
        'idCat',
    ];

    public function cart()
    {
        return $this->belongsTo(cart::class);
    }
    public function historique()
    {
        return $this->belongsTo(historique::class);
    }
    public function category()
    {
        return $this->belongsTo(category::class);
    }
}
