<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class affectation extends Model
{
    use HasFactory;
    protected $fillable = [
        'puce_id',
        'personnel_id',
        'date_affectation',
        'observation',



    ];
    public function puce():BelongsTo{
        return $this->belongsTo(Puce::class);
    }
    public function personnel():BelongsTo{
        return $this->belongsTo(Personnel::class);
    }
}
