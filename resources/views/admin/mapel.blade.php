@extends('layouts.main_admin')

@section('title', 'Data Mapel | SIPADU')

@section('content')
    <div class="container-fluid px-4">

        {{-- Page Title --}}
        <div class="d-flex justify-content-between align-items-center mb-3">
            <div>
                <h3 class="fw-bold mb-0">Data Mata Pelajaran</h3>
                <small class="text-muted">Kelola daftar mata pelajaran yang tersedia.</small>
            </div>

            <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addMapelModal">
                <i class="fas fa-plus"></i> Tambah Mapel
            </button>
        </div>

        {{-- Card Table --}}
        <div class="card shadow-sm border-0">
            <div class="card-header bg-primary text-white">
                <i class="fas fa-book me-2"></i> Daftar Mata Pelajaran
            </div>

            <div class="card-body">
                <table id="datatablesSimple" class="table table-striped table-bordered">
                    <thead class="text-center">
                        <tr>
                            <th>No</th>
                            <th>Nama Mapel</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($mapel as $item)
                            <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                                <td>{{$item->nama_mapel}}</td>
                                <td>
                                    <a class="btn btn-warning btn-sm" href="/guru/{{$item->id_mapel}}"
                                        role="button"><i class="fas fa-edit me-2"></i>ubah</a>
                                    <a class="btn btn-danger btn-sm" href="/guru/{{$item->id_mapel}}"
                                        onclick="return confirm('apakah anda yakin ingin menghapus data ini?');"
                                        role="button"><i class="fas fa-trash me-2"></i>Hapus</a>
                                </td>
                            </tr>
                        @endforeach
                        <!-- <tr>
                            <td>Matematika</td>
                            <td>Pelajaran berhitung dan logika angka.</td>
                            <td><span class="badge bg-success">Aktif</span></td>
                            <td>Bu Siti</td>
                        </tr>

                        <tr>
                            <td>Bahasa Indonesia</td>
                            <td>Mempelajari tata bahasa dan literasi.</td>
                            <td><span class="badge bg-success">Aktif</span></td>
                            <td>Pak Rahmat</td>
                        </tr>

                        <tr>
                            <td>Bahasa Inggris</td>
                            <td>Bahasa internasional.</td>
                            <td><span class="badge bg-warning">Ditinjau</span></td>
                            <td>Bu Emma</td>
                        </tr> -->

                    </tbody>
                </table>
            </div>
        </div>

    </div>

    {{-- Modal Tambah Mapel --}}
    <div class="modal fade" id="addMapelModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title">Tambah Mapel</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <div class="mb-3">
                        <label class="fw-semibold">Nama Mapel</label>
                        <input type="text" class="form-control" placeholder="Masukkan nama mapel...">
                    </div>

                    <div class="mb-3">
                        <label class="fw-semibold">Keterangan</label>
                        <textarea class="form-control" rows="3" placeholder="Tambahkan keterangan..."></textarea>
                    </div>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button class="btn btn-primary">Simpan</button>
                </div>

            </div>
        </div>
    </div>

@endsection