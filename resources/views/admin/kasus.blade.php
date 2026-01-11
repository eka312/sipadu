@extends('layouts.main_admin')

@section('title', 'Data Jenis Aduan | SIPADU')

@section('content')
<div class="container-fluid px-4">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <div>
            <h3 class="fw-bold mb-0">Data Jenis Aduan</h3>
            <small class="text-muted">Kelola dan atur kategori Aduan untuk mendukung proses penanganan laporan secara tepat.</small>
        </div>


        <div class="mb-3 text-center">
            <button type="button" class="btn btn-primary me-1" data-bs-toggle="modal" data-bs-target="#modalTambah"><i class="fas fa-plus"></i>Tambah Jenis Aduan</button>
            
        </div>
    </div>


    <div class="card shadow-sm border-0">
        <div class="card-header bg-primary text-white">
            <i class="fas fa-list me-2"></i> Daftar Jenis Aduan
        </div>

        <div class="card-body">
            <table id="datatablesSimple"  class="table table-hover table-striped ">
                <thead class=" text-center">
                    <tr>
                        <th width="5%">No</th>
                        <th>Jenis Aduan</th>
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

                            <!-- Modal Edit Aduan -->
                            <div class="modal fade" id="modalEdit{{ $k->id_kasus }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Edit Jenis Aduan</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{route('kasus.update', $k->id_kasus)}}" method="post">
                                                @csrf
                                                @method('PUT')
                                                <div class="mb-4 row">
                                                    <label for="text" class="col-sm-2 col-form-label">Jenis Aduan</label>
                                                    <div class="col-sm-10">
                                                        <input name="jenis_kasus" value="{{$k->jenis_kasus}}" class="form-control " type="text" placeholder="Masukkan Jenis Kasus" id="text" aria-label=".form-control-lg example">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                    <button type="submit" class="btn btn-success">Simpan</button>
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
                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                    <div class="modal-content">

                                        <form action="{{ route('kasus.delete', $k->id_kasus) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <div class="modal-header">
                                                <h5 class="modal-title">Hapus Jenis Aduan</h5>
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
                        <td colspan="5" class="text-center text-muted">Belum ada data Aduan.</td>
                    </tr>


                    @endforelse




                </tbody>
            </table>
        </div>
    </div>

</div>

<!-- Modal Tambah Kasus -->
<div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Jenis Aduan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('kasus.store')}}" method="post">
                    @csrf
                    <div class="mb-4 row">
                        <label for="text" class="col-sm-2 col-form-label">Jenis Aduan</label>
                        <div class="col-sm-10">
                            <input name="jenis_kasus" class="form-control " type="text" placeholder="Masukkan Jenis Aduan" id="text" aria-label=".form-control-lg example">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>





@endsection