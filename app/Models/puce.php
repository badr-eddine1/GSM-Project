<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class puce extends Model
{
    use HasFactory;
    protected $fillable = [
        'numero_telephone',
        'fournisseur',
        'type_puce',

    ];
}
