<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class dotation extends Model
{
    use HasFactory;
    protected $fillable = [
        'puce_id',
        'date_dotation',
        'est_active',
        'type_dotation',
    ];
    public function puce():BelongsTo{
        return $this->belongsTo(Puce::class);
    }
}
