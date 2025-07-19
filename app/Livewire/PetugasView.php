<?php

namespace App\Livewire;

use App\Models\KategoriKeluhan;
use App\Models\Petugas;
use Livewire\Component;

class PetugasView extends Component
{
    public $petugasId;
    public $nama;
    public $no_hp;
    public $email;
    public $id_kategori;
    public $success = false;

    public function setModal($id = null){
        $this->clear();

        if($id){
            $this->petugasId = $id;
            $petugas = Petugas::find($id);
            $this->nama = $petugas->nama;
            $this->no_hp = $petugas->no_hp;
            $this->email = $petugas->email;
            $this->id_kategori = $petugas->id_kategori;
        }
    }

    public function simpan(){
        $data = $this->validate([
            'nama' => 'required|string|max:255',
            'no_hp' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'id_kategori' => 'required'
        ]);
        Petugas::updateOrCreate(['id' => $this->petugasId], $data);

        $this->clear();
        $this->success = true;
    }

    public function clear(){
        $this->reset('petugasId');
        $this->reset('nama');
        $this->reset('no_hp');
        $this->reset('email');
        $this->reset('id_kategori');
        $this->reset('success');
    }

    public function delete(){
        Petugas::destroy($this->petugasId);
    }

    public function render() {
        $petugas = Petugas::all();
        $kategori = KategoriKeluhan::all();
        return view('livewire.petugas', compact('petugas', 'kategori'));
    }
}
