<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fournisseur extends Model
{
    use HasFactory;
    protected $fillable =['codefour','nomfour','telfour','emailfour','adrfour','imagefour'];

    public function receptions()
    {
        return $this->hasMany('App\Models\Reception');
    }
}
