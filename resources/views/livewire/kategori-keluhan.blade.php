<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Kategori Keluhan</h4>
                        <div class="card-description">
                            <div class="float-right btn-plus">
                                <a href="">
                                    <button class="btn btn-success"><i class="mdi mdi-plus-circle"></i> Tambah Menu</button>
                                </a>
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
                                @foreach ($kategori as $k)
                                    <tr>
                                        <td>{{ $loop->iteration() }}</td>
                                        <td>{{ $k->nama }}</td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
</div>
