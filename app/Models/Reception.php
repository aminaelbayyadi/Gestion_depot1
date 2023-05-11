<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reception extends Model
{
    use HasFactory;
    protected $primaryKey='idreception';
    protected $fillable =['fournisseur_id','datereception','nbrarticle'];

    
    public function Fournisseurs()
    {
        return $this->belongsTo(Fournisseur::class, 'fournisseur_id', 'idfournisseur');
    }
}
