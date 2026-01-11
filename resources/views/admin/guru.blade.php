@extends('layouts.main_admin')

@section('title', 'Data Guru | SIPADU')

@section('content')
<div class="container-fluid px-4">

    <!-- Page Title -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <div>
            <h3 class="fw-bold mb-0">Data Guru</h3>
            <small class="text-muted">Mengelola informasi guru secara lengkap untuk mendukung kelancaran administrasi akademik.</small>
        </div>


        <div class="mb-3 text-center">
            <button type="button" class="btn btn-primary me-1" data-bs-toggle="modal" data-bs-target="#modalTambah"><i class="fas fa-plus"></i>Tambah Guru</button>
            <button type="button" class="btn btn-success me-1" data-bs-toggle="modal" data-bs-target="#importExcel">Upload Excel</button>
        </div>

    </div>

    <!-- Card Table -->
    <div class="card shadow-sm border-0">
        <div class="card-header bg-primary text-white">
            <i class="fas fa-book me-2"></i> Daftar Guru
        </div>

        <div class="card-body">
            <table id="datatablesSimple" class="table table-hover table-striped ">
                <thead class=" text-center">
                    <tr>
                        <th width="5%">No</th>
                        <th>Nama Guru</th>
                        <th>Email</th>
                        <th>No Identitas</th>
                        <th>Status</th>
                        <th width="15%">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($guru as $g)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td>{{ $g->nama_guru }}</td>
                        <td>{{ $g->email }}</td>
                        <td>{{ $g->no_identitas }}</td>
                        <td class="text-center">
                            <span class="badge bg-{{ $g->status == 'aktif' ? 'success' : 'secondary' }}">
                                {{ strtoupper($g->status) }}
                            </span>
                        </td>


                        <td class="text-center">
                            <div class="d-flex justify-content-center gap-2">

                                <!-- Edit -->
                                <button class="btn btn-warning btn-sm"
                                    data-bs-toggle="modal"
                                    data-bs-target="#modalEdit{{ $g->id_guru }}">
                                    <i class="fas fa-edit"></i>
                                </button>

                                <!-- Modal Edit guru -->
                                <div class="modal fade" id="modalEdit{{ $g->id_guru }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-lg">
                                        <div class="modal-content">

                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit Data Guru</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{route('guru.update', $g->id_guru)}}" method="post">
                                                    @csrf
                                                    <div class="mb-4 row">
                                                        <label for="text" class="col-sm-3 col-form-label">Nama Guru</label>
                                                        <div class="col-sm-9">
                                                            <input name="nama_guru" value="{{$g->nama_guru}}"
                                                                class="form-control " type="text"
                                                                placeholder="Masukkan Nama Guru" id="text"
                                                                aria-label=".form-control-lg example">
                                                        </div>
                                                    </div>
                                                    <div class="mb-4 row">
                                                        <label for="text" class="col-sm-3 col-form-label">No
                                                            Identitas</label>
                                                        <div class="col-sm-9">
                                                            <input name="no_identitas" value="{{$g->no_identitas}}"
                                                                class="form-control " type="text"
                                                                placeholder="Masukkan No Identitas" id="text"
                                                                aria-label=".form-control-lg example">
                                                        </div>
                                                    </div>
                                                    <div class="mb-4 row">
                                                        <label for="text" class="col-sm-3 col-form-label">Email</label>
                                                        <div class="col-sm-9">
                                                            <input name="email" value="{{$g->email}}" class="form-control "
                                                                type="email" placeholder="Masukkan Email" id="text"
                                                                aria-label=".form-control-lg example">
                                                        </div>
                                                    </div>
                                                    <div class="mb-4 row">
                                                        <label class="col-sm-3 col-form-label">Password</label>
                                                        <div class="col-sm-9">
                                                            <div class="input-group">
                                                                <input name="password"
                                                                    type="password"
                                                                    class="form-control password-input"
                                                                    placeholder="(kosongkan jika tidak ingin diubah)">

                                                                <button type="button"
                                                                    class="btn btn-outline-secondary toggle-password">
                                                                    <i class="bi bi-eye-slash"></i>
                                                                </button>

                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Batal</button>
                                                        <button type="submit" class="btn btn-success">Simpan</button>
                                                    </div>
                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <form action="{{ route('guru.toggle-status', $g->id_guru) }}" method="POST">
                                    @csrf
                                    @method('PATCH')

                                    @php
                                    $status = strtolower(trim($g->status));
                                    @endphp

                                    @if ($status === 'aktif')
                                    <button type="submit"
                                        class="btn btn-sm btn-success"
                                        title="Aktifkan">
                                        <i class="fas fa-user-check"></i>
                                    </button>

                                    @else

                                    <button type="submit"
                                        class="btn btn-sm btn-secondary"
                                        title="Nonaktifkan">
                                        <i class="fas fa-user-slash"></i>
                                    </button>
                                    @endif
                                </form>



                            </div>




                        </td>

                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted">Belum ada data guru.</td>
                    </tr>
                    @endforelse


                </tbody>
            </table>
        </div>
    </div>

</div>


<!-- modal Tambah  -->
<div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Guru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('guru.store')}}" method="post">
                    @csrf
                    <div class="mb-4 row">
                        <label for="text" class="col-sm-2 col-form-label">Nama Guru</label>
                        <div class="col-sm-10">
                            <input name="nama_guru" class="form-control " type="text" placeholder="Masukkan Nama Guru"
                                id="text" aria-label=".form-control-lg example">
                        </div>
                    </div>
                    <div class="mb-4 row">
                        <label for="text" class="col-sm-2 col-form-label">No Identitas</label>
                        <div class="col-sm-10">
                            <input name="no_identitas" class="form-control " type="text"
                                placeholder="Masukkan No Identitas" id="text" aria-label=".form-control-lg example">
                        </div>
                    </div>
                    <div class="mb-4 row">
                        <label for="text" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input name="email" class="form-control " type="email" placeholder="Masukkan Email"
                                id="text" aria-label=".form-control-lg example">
                        </div>
                    </div>
                    <div class="mb-4 row">
                        <label class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                            <div class="input-group">

                                <input name="password" type="password" placeholder="Masukkan Password" class="form-control password-input">
                                <button type="button" class="btn btn-outline-secondary toggle-password">
                                    <i class="bi bi-eye-slash"></i>
                                </button>
                            </div>
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


<div class="modal fade" id="importExcel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <form action="{{ route('guru.import_excel') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Upload Excel </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <label>File Excel</label>
                    <input type="file" name="file" class="form-control mb-2" required>

                    <small class="text-muted">
                        Format kolom: <b>nama guru, email, no identitas, password</b>
                    </small>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button class="btn btn-success">Upload</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection