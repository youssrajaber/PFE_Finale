<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class commande extends Model
{
    use HasFactory;

    protected $fillable = [
        'idUser',
        'idCart',
        'date',
        'Adress',
        'Telephone',
        'total',
        'payment'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function cart()
    {
        return $this->hasMany(cart::class);
    }
    public function historique()
    {
        return $this->hasMany(historique::class);
    }
}
