<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Etablissement;

class Beneficiaire extends Model
{
    use HasFactory;
    protected $primaryKey='idbeneficiaire ';
    protected $fillable =['code_beneficiaire','nombeneficiaire','fonction','etablissement_id','situation'];

    public function Etablissements()
    {
        return $this->belongsTo(Etablissement::class, 'etablissement_id', 'idetablissement ');
    }

}
