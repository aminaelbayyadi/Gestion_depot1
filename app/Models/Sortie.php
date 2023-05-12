<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sortie extends Model
{
    use HasFactory;
    protected $primaryKey='idsortie';
    protected $fillable =['numsortie','datesortie','nbr_article_sortie','beneficiaire_id'];

    public function Beneficiaires()
    {
        return $this->belongsTo(Beneficiaire::class, 'beneficiaire_id', 'idbeneficiaire');
    }
}
