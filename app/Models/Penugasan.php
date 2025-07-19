<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Penugasan extends Model
{
    protected $table = 'penugasan';
    protected $fillable = [
        'id_keluhan',
        'id_petugas',
        'tanggal',
        'status',
    ];

    public function petugas():BelongsTo {
        return $this->belongsTo(Petugas::class, 'id_petugas');
    }
    public function keluhan():BelongsTo {
        return $this->belongsTo(Keluhan::class, 'id_keluhan');
    }
}
