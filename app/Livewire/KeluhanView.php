<?php

namespace App\Livewire;

use App\Models\KategoriKeluhan;
use App\Models\Keluhan;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class KeluhanView extends Component
{
    use WithFileUploads;

    public $keluhanId;
    public $id_kategori;
    public $no_keluhan;
    public $deskripsi;
    public $status;
    public $foto;
    public $success = false;

    public function setModal($id = null){
        $this->clear();

        if($id){
            $this->keluhanId = $id;
            $keluhan = Keluhan::find($id);
            $this->no_keluhan = $keluhan->no_keluhan;
            $this->id_kategori = $keluhan->id_kategori;
            $this->deskripsi = $keluhan->deskripsi;
            $this->status = $keluhan->status;
        }
    }

    public function simpan(){
        $rules = [
            'no_keluhan' => 'required|string|unique:keluhan',
            'id_kategori' => 'required',
            'deskripsi' => 'required|string',
            'status' => 'nullable|string|max:255',
        ];
        if($this->keluhanId == null){
            $rules['foto'] = 'required|image';
        }

        $data = $this->validate($rules);
        if($this->foto){
            $data['path_foto'] = $this->foto->store('selfies');
        }
        if($this->keluhanId == null){
            $data['id_user'] = auth()->id();
        }

        Keluhan::updateOrCreate(['id' => $this->keluhanId], $data);
        $this->clear();
        $this->success = true;
    }

    public function clear(){
        $this->reset('keluhanId');
        $this->reset('foto');
        $this->reset('no_keluhan');
        $this->reset('id_kategori');
        $this->reset('deskripsi');
        $this->reset('status');
        $this->reset('success');
    }

    public function delete(){
        Keluhan::destroy($this->keluhanId);
    }

    public function render() {
        $keluhan = Keluhan::all();
        $kategori = KategoriKeluhan::all();
        return view('livewire.keluhan', compact('keluhan', 'kategori'));
    }
}
