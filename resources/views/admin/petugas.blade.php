@extends('layouts.main_admin')

@section('title', 'Data Petugas | SIPADU')

@section('content')

<div class="container-fluid px-4">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <div>
            <h3 class="fw-bold mb-0">Data Petugas</h3>
            <small class="text-muted">Kelola daftar petugas yang tercatat di sistem SIPADU.</small>
        </div>

        <button class="btn btn-primary btn-sm " data-bs-toggle="modal" data-bs-target="#modalTambah">
            <i class="fas fa-plus"></i> Tambah Petugas
        </button>
    </div>


    <div class="card shadow-sm border-0">
        <div class="card-header bg-primary text-white">
            <i class="fas fa-user-tie me-2"></i> Daftar Petugas

        </div>

        <div class="card-body">
            <table id="datatablesSimple" class="table table-striped table-bordered">
                <thead class="text-center">
                    <tr>
                        <th width="5%">No</th>
                        <th>Email</th>
                        <th>Nama Petugas</th>
                        <th>Jabatan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($petugas as $p)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td>{{ $p->email }}</td>
                        <td>{{ $p->nama_petugas }}</td>
                        <td>{{ $p->jabatan }}</td>
                        <td class="text-center">
                            <button class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                data-bs-target="#modalEdit{{ $p->id_user }}">
                                <i class="fas fa-edit"></i>
                            </button>

                            <!-- Modal Edit Petugas -->
                            <div class="modal fade" id="modalEdit{{ $p->id_user }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Edit Data Petugas</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{route('petugas.update', $p->id_user)}}" method="post">
                                                @csrf
                                                <div class="mb-4 row">
                                                    <label for="text" class="col-sm-3 col-form-label">Email</label>
                                                    <div class="col-sm-9">
                                                        <input name="email" class="form-control " type="email" value="{{ $p->email }}" id="text" aria-label=".form-control-lg example">
                                                    </div>
                                                </div>
                                                <div class="mb-4 row">
                                                    <label for="text" class="col-sm-3 col-form-label">Password </label>
                                                    <div class="col-sm-9">
                                                        <input name="password" class="form-control " type="password" placeholder="(kosongkan jika tidak ingin diubah)"  id="text" aria-label=".form-control-lg example">
                                                    </div>
                                                </div>
                                                <div class="mb-4 row">
                                                    <label for="text" class="col-sm-3 col-form-label">Nama Petugas</label>
                                                    <div class="col-sm-9">
                                                        <input name="nama_petugas" class="form-control " type="text" value="{{ $p->nama_petugas }}" id="text" aria-label=".form-control-lg example">
                                                    </div>
                                                </div>
                                                <div class="mb-4 row">
                                                    <label for="text" class="col-sm-3 col-form-label">Jabatan</label>
                                                    <div class="col-sm-9">
                                                        <input name="jabatan" class="form-control " type="text" value="{{ $p->jabatan }}" id="text" aria-label=".form-control-lg example">
                                                    </div>
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                                </div>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>



                            <!-- Tombol Delete -->
                            <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modalHapus{{ $p->id_user }}">
                                <i class="fas fa-trash"></i>
                            </button>

                            <!-- Modal Hapus -->
                            <div class="modal fade" id="modalHapus{{ $p->id_user }}" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">

                                        <form action="{{ route('petugas.delete', $p->id_user) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <div class="modal-header">
                                                <h5 class="modal-title">Hapus Data Petugas</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>

                                            <div class="modal-body">
                                                Yakin mau hapus <strong>{{ $p->nama_petugas }}</strong>?
                                                Aksi ini tidak dapat dibatalkan.
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                            </div>

                                        </form>

                                    </div>
                                </div>
                            </div>
                        </td>


                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" class="text-center text-muted">Belum ada data petugas.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>

<!-- Modal Tambah -->
<div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Petugas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('petugas.store')}}" method="post">
                    @csrf
                    <div class="mb-4 row">
                        <label for="text" class="col-sm-3 col-form-label">Email</label>
                        <div class="col-sm-9">
                            <input name="email" class="form-control " type="email" placeholder="Masukkan Email" id="text" aria-label=".form-control-lg example">
                        </div>
                    </div>
                    <div class="mb-4 row">
                        <label for="text" class="col-sm-3 col-form-label">Password</label>
                        <div class="col-sm-9">
                            <input name="password" class="form-control " type="password" placeholder="Masukkan Password" id="text" aria-label=".form-control-lg example">
                        </div>
                    </div>

                    <div class="mb-4 row">
                        <label for="text" class="col-sm-3 col-form-label">Nama Petugas</label>
                        <div class="col-sm-9">
                            <input name="nama_petugas" class="form-control " type="text" placeholder="Masukkan Nama Petugas" id="text" aria-label=".form-control-lg example">
                        </div>
                    </div>
                    <div class="mb-4 row">
                        <label for="text" class="col-sm-3 col-form-label">Jabatan</label>
                        <div class="col-sm-9">
                            <input name="jabatan" class="form-control " type="text" placeholder="Masukkan Jabatan" id="text" aria-label=".form-control-lg example">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

@endsection