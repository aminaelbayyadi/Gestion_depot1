<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detaitreception extends Model
{
    use HasFactory;
    protected $table = 'Detailsreception';
    protected $primaryKey='iddetails';
    protected $fillable =['codeproduit','nomproduit','reception_id','quantite_recue'];

}
