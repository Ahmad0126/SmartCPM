<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Keluhan extends Model
{
    protected $table = 'keluhan';
    protected $fillable = [
        'id_user',
        'id_kategori',
        'deskripsi',
        'path_foto',
        'status',
    ];

    public function user():BelongsTo{
        return $this->belongsTo(User::class, 'id_user');
    }
    public function kategori():BelongsTo{
        return $this->belongsTo(KategoriKeluhan::class, 'id_kategori');
    }
}
