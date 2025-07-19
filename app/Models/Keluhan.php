<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Keluhan extends Model
{
    use HasFactory;
    protected $table = 'keluhan';
    protected $fillable = [
        'id_user',
        'id_kategori',
        'no_keluhan',
        'deskripsi',
        'path_foto',
        'status',
        'tanggal',
    ];

    public function user():BelongsTo{
        return $this->belongsTo(User::class, 'id_user');
    }
    public function kategori():BelongsTo{
        return $this->belongsTo(KategoriKeluhan::class, 'id_kategori');
    }
}
