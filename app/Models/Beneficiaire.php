<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beneficiaire extends Model
{
    use HasFactory;
    protected $primaryKey='idbeneficiaire ';
    protected $fillable =['code_beneficiaire','nombeneficiaire','fonction','etablissement_id','situation'];

}
