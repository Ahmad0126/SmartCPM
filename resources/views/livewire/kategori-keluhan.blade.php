<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Kategori Keluhan</h4>
                        <div class="card-description">
                            <div class="float-right btn-plus">
                                <button class="btn btn-success" wire:click='setModal()' data-toggle="modal" data-target="#modal">
                                    <i class="mdi mdi-plus-circle"></i> Tambah
                                </button>
                            </div>
                            <div class="notify">

                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered">
                                <thead class="ctable">
                                <tr class="ctable">
                                    <th>No</th>
                                    <th>Nama Kategori</th>
                                    <th>Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($kategori as $k)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $k->nama }}</td>
                                            <td>
                                                <a class="btn btn-sm btn-warning" wire:click='setModal({{ $k->id }})' data-toggle="modal" data-target="#modal">
                                                    <i class="mdi mdi-pen"></i>
                                                </a>
                                                <a class="btn btn-sm btn-danger" wire:click='setModal({{ $k->id }})' data-toggle="modal" data-target="#confirmModal">
                                                    <i class="mdi mdi-delete"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" tabindex="-1" id="confirmModal" wire:ignore.self>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Konfirmasi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Yakin ingin menghapus data ini?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" wire:click='clear()'>Tidak</button>
                    <button type="button" class="btn btn-primary" wire:click='delete()' data-dismiss="modal">Ya</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" tabindex="-1" id="modal" wire:ignore.self>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ $kategoriId ? 'Edit' : 'Tambah' }} Kategori</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Nama Kategori</label>
                        <input type="text" class="form-control form-control-lg @error('nama') is-invalid @enderror" wire:model='nama' placeholder="Masukkan Nama">
                        @foreach($errors->all() as $err)
                            <div class="invalid-feedback">
                                {{ $err }}
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" wire:click='clear()'>Batal</button>
                    <button type="button" class="btn btn-primary" wire:click='simpan()'>Simpan</button>
                </div>
            </div>
        </div>
    </div>
</div>
