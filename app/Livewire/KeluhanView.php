<?php

namespace App\Livewire;

use App\Models\KategoriKeluhan;
use App\Models\Keluhan;
use App\Models\Lampiran;
use App\Models\Penugasan;
use App\Models\Petugas;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Livewire\WithPagination;

class KeluhanView extends Component
{
    use WithFileUploads;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $keluhanId;
    public $id_kategori;
    public $no_keluhan;
    public $deskripsi;
    public $status;
    public $foto;
    public $lampiran = [];
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
            'no_keluhan' => 'required|string|unique:keluhan,no_keluhan,'.$this->keluhanId,
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
            $data['tanggal'] = now()->format('Y-m-d');
        }

        Keluhan::updateOrCreate(['id' => $this->keluhanId], $data);
        $id_keluhan = $this->keluhanId ?? Keluhan::where('no_keluhan', $this->no_keluhan)->first()->id;
        if(!empty($this->lampiran)){
            foreach($this->lampiran as $lampiran){
                $data = [
                    'id_keluhan' => $id_keluhan,
                    'path_file' => $lampiran->store('lampiran')
                ];
                Lampiran::create($data);
            }
        }
        //auto assign (random)
        $id_petugas = $this->cariPetugas();
        Penugasan::create([
            'id_keluhan' => $id_keluhan,
            'id_petugas' => $id_petugas,
            'tanggal' => now()->format('Y-m-d H:i:s'),
        ]);
        
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
        $this->reset('lampiran');
    }

    public function delete(){
        Keluhan::destroy($this->keluhanId);
    }

    public function render() {
        $keluhan = Keluhan::paginate(25);
        $kategori = KategoriKeluhan::all();
        return view('livewire.keluhan', compact('keluhan', 'kategori'));
    }

    protected function cariPetugas(){
        $petugas = Petugas::where('id_kategori', $this->id_kategori)->get();
        $id = $petugas->random()->id;

        return $id;
    }
}
