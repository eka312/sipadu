@extends('layouts.main_admin')

@section('title', 'Data Jenis Kasus | SIPADU')

@section('content')
<div class="container-fluid px-4">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <div>
            <h3 class="fw-bold mb-0">Data Jenis Kasus</h3>
            <small class="text-muted">Kelola jenis kasus yang digunakan dalam sistem SIPADU.</small>
        </div>

        <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalTambah">
            <i class="fas fa-plus"></i> Tambah Jenis Kasus
        </button>
    </div>


    <div class="card shadow-sm border-0">
        <div class="card-header bg-primary text-white">
            <i class="fas fa-list me-2"></i> Daftar Jenis Kasus
        </div>

        <div class="card-body">
            <table id="datatablesSimple" class="table table-striped table-bordered">
                <thead class="table-primary text-center">
                    <tr>
                        <th width="5%">No</th>
                        <th>Jenis Kasus</th>
                        <th width="15%">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($kasus as $k)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td>{{ $k->jenis_kasus }}</td>

                        <td class="text-center">
                            <!-- Edit  -->
                            <button class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                data-bs-target="#modalEdit{{ $k->id_kasus }}">
                                <i class="fas fa-edit"></i>
                            </button>

                            <!-- Modal Edit Kasus -->
                            <div class="modal fade" id="modalEdit{{ $k->id_kasus }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Edit Jenis Kasus</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{route('kasus.update', $k->id_kasus)}}" method="post">
                                                @csrf
                                                <div class="mb-4 row">
                                                    <label for="text" class="col-sm-2 col-form-label">Jenis Kasus</label>
                                                    <div class="col-sm-10">
                                                        <input name="jenis_kasus" value="{{$k->jenis_kasus}}" class="form-control " type="text" placeholder="Masukkan Jenis Kasus" id="text" aria-label=".form-control-lg example">
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
                            <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modalHapus{{ $k->id_kasus }}">
                                <i class="fas fa-trash"></i>
                            </button>

                            <!-- Modal Hapus -->
                            <div class="modal fade" id="modalHapus{{ $k->id_kasus }}" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">

                                        <form action="{{ route('kasus.delete', $k->id_kasus) }}" method="POST">
                                            @csrf
                                            <div class="modal-header">
                                                <h5 class="modal-title">Hapus Kasus</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>

                                            <div class="modal-body">
                                                Yakin mau hapus <strong>{{ $k->jenis_kasus }}</strong>?
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
                        <td colspan="5" class="text-center text-muted">Belum ada data Kasus.</td>
                    </tr>


                    @endforelse




                </tbody>
            </table>
        </div>
    </div>

</div>

<!-- Modal Tambah Kasus -->
<div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Jenis Kasus</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('kasus.store')}}" method="post">
                    @csrf
                    <div class="mb-4 row">
                        <label for="text" class="col-sm-2 col-form-label">Jenis Kasus</label>
                        <div class="col-sm-10">
                            <input name="jenis_kasus" class="form-control " type="text" placeholder="Masukkan Jenis Kasus" id="text" aria-label=".form-control-lg example">
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