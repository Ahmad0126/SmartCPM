<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lampiran extends Model
{
    protected $table = 'lampiran';
    protected $fillable = [
        'id_keluhan',
        'path_file',
    ];
}
