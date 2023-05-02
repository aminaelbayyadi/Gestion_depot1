<?php

namespace App\Models;
use App\Models\Produit;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;
    protected $table = 'stock';
    protected $primaryKey='idstock';
    protected $fillable =['quantiter','produit_id'];

    public function produits()
    {
        return $this->belongsTo(Produit::class, 'produit_id', 'idproduit');
    }
    
}
