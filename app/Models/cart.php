<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cart extends Model

{
    use HasFactory;
    protected $fillable = [
        'idUser', 'idPrd', 'totale'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function produit()
    {
        return $this->hasMany(produit::class);
    }
    public function commande()
    {
        return $this->belongsTo(commande::class);
    }
}
