<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Petugas extends Model
{
    protected $table = 'petugas';
    protected $fillable = [
        'nama',
        'email',
        'no_hp',
        'id_kategori',
    ];

    public function kategori():BelongsTo{
        return $this->belongsTo(KategoriKeluhan::class, 'id_kategori');
    }
}
