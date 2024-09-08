<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class personnel extends Model
{
    use HasFactory;
    protected $fillable = [
        'entite_id',
        'matricule',
        'nom',
        'prenom',
        'numero_de_telephone',
        'email',
    ];
    public function entite():BelongsTo{
        return $this->belongsTo(Entite::class);
    }
}
