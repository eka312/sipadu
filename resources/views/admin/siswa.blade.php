@extends('layouts.main_admin')

@section('title', 'Data Siswa | SIPADU')

@section('content')
<div class="container-fluid px-4">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <div>
            <h3 class="fw-bold mb-0">Data Siswa</h3>
            <small class="text-muted">Kelola informasi siswa yang terdaftar dalam sistem SIPADU.</small>
        </div>



        <div class="mb-3 text-center">
            <button type="button" class="btn btn-primary me-1" data-bs-toggle="modal" data-bs-target="#modalTambah"><i class="fas fa-plus"></i>Tambah Siswa</button>
            <button type="button" class="btn btn-success me-1" data-bs-toggle="modal" data-bs-target="#importExcel">Upload Excel</button>
        </div>


    </div>


    <div class="card shadow-sm border-0">
        <div class="card-header bg-primary text-white">
            <i class="fas fa-list me-2"></i> Daftar Siswa
        </div>

        <div class="card-body">
            <table id="datatablesSimple" class="table table-hover table-striped ">
                <thead class="text-center">
                    <tr>
                        <th width="5%">No</th>
                        <th>Nama Siswa</th>
                        <th>Kelas</th>
                        <th>NIS</th>
                        <th>Tanggal Lahir</th>
                        <th>Status</th>
                        <th width="15%">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($siswa as $s)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td>{{ $s->nama_siswa }}</td>
                        <td>{{ $s->kelas }}</td>
                        <td>{{ $s->nis }}</td>
                        <td>{{ \Carbon\Carbon::parse($s->tanggal_lahir)->format('d-m-Y') }}</td>
                        <td class="text-center">
                            <span class="badge bg-{{ $s->status == 'aktif' ? 'success' : 'secondary' }}">
                                {{ strtoupper($s->status) }}
                            </span>
                        </td>


                        <td class="text-center">
                            <div class="d-flex justify-content-center gap-2">
                                <!-- Edit  -->
                                <button class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#modalEdit{{ $s->id_siswa }}">
                                    <i class="fas fa-edit"></i>
                                </button>

                                <!-- Modal Edit siswa -->
                                <div class="modal fade" id="modalEdit{{ $s->id_siswa }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit Siswa</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">


                                                <form action="{{route('siswa.update', $s->id_siswa)}}" method="post">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="modal-body">
                                                        <div class="mb-4 row">
                                                            <label for="text" class="col-sm-2 col-form-label">Nama Siswa</label>
                                                            <div class="col-sm-10">
                                                                <input name="nama_siswa" value="{{ $s->nama_siswa }}" class="form-control " type="text" placeholder="Masukkan Nama Siswa"
                                                                    id="text" aria-label=".form-control-lg example" required>
                                                            </div>
                                                        </div>

                                                        <div class="mb-4 row">
                                                            <label for="text" class="col-sm-2 col-form-label">Kelas</label>
                                                            <div class="col-sm-10">
                                                                <input type="text"
                                                                    name="kelas"
                                                                    value="{{ $s->kelas }}"
                                                                    class="form-control"
                                                                    placeholder="Contoh: X RPL 1"
                                                                    required>
                                                            </div>
                                                        </div>

                                                        <div class="mb-4 row">
                                                            <label for="text" class="col-sm-2 col-form-label">NIS</label>
                                                            <div class="col-sm-10">
                                                                <input name="nis" value="{{ $s->nis }}" class="form-control " type="text" placeholder="Masukkan NIS"
                                                                    id="text" aria-label=".form-control-lg example" required>
                                                            </div>
                                                        </div>

                                                        <div class="mb-4 row">
                                                            <label for="text" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                                                            <div class="col-sm-10">
                                                                <input name="tanggal_lahir" value="{{ $s->tanggal_lahir }}" type="date" class="form-control " id="text" aria-label=".form-control-lg example" required>
                                                            </div>
                                                        </div>

                                                        <div class="mb-4 row">
                                                            <label for="text" class="col-sm-2 col-form-label">Password</label>
                                                            <div class="col-sm-10">
                                                                <div class="input-group">
                                                                    <input name="password" type="password" placeholder="(kosongkan jika tidak ingin diubah)" class="form-control password-input">
                                                                    <button type="button" class="btn btn-outline-secondary toggle-password">
                                                                        <i class="bi bi-eye-slash"></i>
                                                                    </button>

                                                                </div>
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



                                <form action="{{ route('siswa.toggle-status', $s->id_siswa) }}" method="POST">
                                    @csrf
                                    @method('PATCH')

                                    @php
                                    $status = strtolower(trim($s->status));
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
                        <td colspan="5" class="text-center text-muted">Belum ada data siswa.</td>
                    </tr>


                    @endforelse




                </tbody>
            </table>
        </div>
    </div>

</div>

<div class="modal fade" id="modalTambah" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <form action="{{ route('siswa.store') }}" method="post">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Satu Siswa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <div class="mb-4 row">
                        <label for="text" class="col-sm-2 col-form-label">Nama Siswa</label>
                        <div class="col-sm-10">
                            <input name="nama_siswa" class="form-control " type="text" placeholder="Masukkan Nama Siswa"
                                id="text" aria-label=".form-control-lg example" required>
                        </div>
                    </div>

                    <div class="mb-4 row">
                        <label for="text" class="col-sm-2 col-form-label">Kelas</label>
                        <div class="col-sm-10">
                            <input type="text"
                                name="kelas"
                                class="form-control"
                                placeholder="Contoh: XI RPL 2"
                                required>
                        </div>
                    </div>

                    <div class="mb-4 row">
                        <label for="text" class="col-sm-2 col-form-label">NIS</label>
                        <div class="col-sm-10">
                            <input name="nis" class="form-control " type="text" placeholder="Masukkan NIS"
                                id="text" aria-label=".form-control-lg example" required>
                        </div>
                    </div>

                    <div class="mb-4 row">
                        <label for="text" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                        <div class="col-sm-10">
                            <input name="tanggal_lahir" type="date" class="form-control " id="text" aria-label=".form-control-lg example" required>
                        </div>
                    </div>

                    <div class="mb-4 row">
                        <label for="text" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <input name="password" type="password" placeholder="Masukkan Password" class="form-control password-input">
                                <button type="button" class="btn btn-outline-secondary toggle-password">
                                    <i class="bi bi-eye-slash"></i>
                                </button>

                            </div>
                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <button class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button class="btn btn-success">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>



<div class="modal fade" id="importExcel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <form action="{{ route('siswa.import_excel') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Upload Excel </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <label>File Excel</label>
                    <input type="file" name="file" class="form-control mb-2" required>

                    <small class="text-muted">
                        Format kolom: <b>nama siswa, kelas, nis, tanggal lahir, password</b>
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