<?php

namespace App\Livewire;

use App\Models\KategoriKeluhan;
use Livewire\Component;

class KategoriKeluhanView extends Component
{
    public $kategoriId;
    public $nama;

    public function setModal($id = null){
        $this->clear();

        if($id){
            $this->kategoriId = $id;
            $kategori = KategoriKeluhan::find($id);
            $this->nama = $kategori->nama;
        }
    }

    public function simpan(){
        $data = $this->validate([
            'nama' => 'required|max:255|unique:kategori_keluhan'
        ]);
        KategoriKeluhan::updateOrCreate(['id' => $this->kategoriId], $data);

        $this->clear();
    }

    public function clear(){
        $this->reset('kategoriId');
        $this->reset('nama');
    }

    public function delete(){
        KategoriKeluhan::destroy($this->kategoriId);
    }
    
    public function render() {
        $kategori = KategoriKeluhan::all();

        return view('livewire.kategori-keluhan', compact('kategori'));
    }
}
