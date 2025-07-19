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
    public $deskripsi;
    public $status;
    public $foto;
    public $success = false;

    public function setModal($id = null){
        $this->clear();

        if($id){
            $this->keluhanId = $id;
            $kategori = Keluhan::find($id);
            $this->id_kategori = $kategori->id_kategori;
            $this->deskripsi = $kategori->deskripsi;
            $this->status = $kategori->status;
        }
    }

    public function simpan(){
        $rules = [
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
