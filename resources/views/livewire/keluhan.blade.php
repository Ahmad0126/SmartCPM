<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Keluhan</h4>
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
                                    <th>Keluhan oleh</th>
                                    <th>Kategori</th>
                                    <th>Deskripsi</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($keluhan as $k)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $k->user->name }}</td>
                                            <td>{{ $k->kategori->nama }}</td>
                                            <td>{{ $k->deskripsi }}</td>
                                            <td>{{ $k->status }}</td>
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
                    <h5 class="modal-title">{{ $keluhanId ? 'Edit' : 'Tambah' }} Keluhan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Deskripsi</label>
                        <textarea rows="10" class="form-control form-control-lg @error('deskripsi') is-invalid @enderror" wire:model='deskripsi' placeholder="Masukkan Deskripsi"></textarea>
                        @foreach($errors->get('deskripsi') as $err)
                            <div class="invalid-feedback">
                                {{ $err }}
                            </div>
                        @endforeach
                    </div>
                    <div class="form-group">
                        <label for="">Foto Selfie</label>
                        <input type="file" class="form-control form-control-lg @error('foto') is-invalid @enderror" wire:model='foto' placeholder="Masukkan Nama">
                        @foreach($errors->get('foto') as $err)
                            <div class="invalid-feedback">
                                {{ $err }}
                            </div>
                        @endforeach
                    </div>
                    <div class="form-group">
                        <label for="">Kategori</label>
                        <select class="form-control form-control-lg @error('id_kategori') is-invalid @enderror" wire:model='id_kategori'>
                            <option value="" selected>-- Pilih Kategori --</option>
                            @foreach ($kategori as $k)
                                <option value="{{ $k->id }}">{{ $k->nama }}</option>
                            @endforeach
                        </select>
                        @foreach($errors->get('id_kategori') as $err)
                            <div class="invalid-feedback">
                                {{ $err }}
                            </div>
                        @endforeach
                    </div>
                    <div class="form-group">
                        <label for="">Status</label>
                        <select class="form-control form-control-lg @error('status') is-invalid @enderror" wire:model='status'>
                            <option value="" selected>-- Pilih status --</option>
                            <option value="open">OPEN</option>
                            <option value="in_progress">IN PROGRESS</option>
                            <option value="resolved">RESOLVED</option>
                            <option value="closed">CLOSED</option>
                        </select>
                    </div>
                    @if($success)
                        <div class="alert alert-success alert-dismissible" role="alert">
                            Berhasil!
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" wire:click='clear()'>Tutup</button>
                    <button type="button" class="btn btn-primary" wire:click='simpan()'>Simpan</button>
                </div>
            </div>
        </div>
    </div>
</div>
