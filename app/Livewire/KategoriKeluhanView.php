<?php

namespace App\Livewire;

use App\Models\KategoriKeluhan;
use Livewire\Component;

class KategoriKeluhanView extends Component
{
    public function render() {
        $kategori = KategoriKeluhan::all();

        return view('livewire.kategori-keluhan', compact('kategori'));
    }
}
