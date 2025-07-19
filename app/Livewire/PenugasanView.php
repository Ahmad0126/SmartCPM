<?php

namespace App\Livewire;

use App\Models\Keluhan;
use App\Models\Penugasan;
use App\Models\Petugas;
use Livewire\Component;

class PenugasanView extends Component
{
    public $penugasanId;
    public $id_petugas;
    public $no_keluhan;
    public $status;
    public $success = false;

    public function setModal($id = null){
        $this->clear();

        if($id){
            $this->penugasanId = $id;
            $penugasan = Penugasan::find($id);
            $this->id_petugas = $penugasan->id_petugas;
            $this->no_keluhan = $penugasan->keluhan->no_keluhan;
            $this->status = $penugasan->status;
        }
    }

    public function simpan(){
        $data = $this->validate([
            'id_petugas' => 'required',
            'no_keluhan' => 'required|exists:keluhan,no_keluhan',
            'status' => 'required|string|max:255',
        ]);
        $data['id_keluhan'] = Keluhan::where('no_keluhan', $this->no_keluhan)->first()->id;
        $data['tanggal'] = now()->format('Y-m-d H:i:s');
        Penugasan::updateOrCreate(['id' => $this->penugasanId], $data);

        $this->clear();
        $this->success = true;
    }

    public function clear(){
        $this->reset('penugasanId');
        $this->reset('id_petugas');
        $this->reset('no_keluhan');
        $this->reset('status');
        $this->reset('success');
    }

    public function delete(){
        Penugasan::destroy($this->penugasanId);
    }
    public function render() {
        $penugasan = Penugasan::all();
        $petugas = Petugas::all();
        return view('livewire.penugasan', compact('penugasan', 'petugas'));
    }
}
