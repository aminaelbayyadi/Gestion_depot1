<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reception extends Model
{
    use HasFactory;
    protected $primaryKey='idreception';
    protected $fillable =['numreception','nomfour','datereception','nbrarticle'];

    
  
}
