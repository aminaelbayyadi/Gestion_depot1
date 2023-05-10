<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sortie extends Model
{
    use HasFactory;
    protected $primaryKey='idreception';
    protected $fillable =['num_sortie','datesortie','nbr_article_sortie','beneficiaire_id'];
}
