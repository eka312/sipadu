@extends('layouts.main_admin')

@section('title', 'Data Jenis Kasus | SIPADU')

@section('content')
    <div class="container-fluid px-4">

        <div class="d-flex justify-content-between align-items-center mb-3">
            <div>
                <h3 class="fw-bold mb-0">Data Jenis Kasus</h3>
                <small class="text-muted">Kelola jenis kasus yang digunakan dalam sistem SIPADU.</small>
            </div>

            <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addMapelModal">
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
                                    <!-- Edit Trigger -->
                                    <button class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#modalEdit{{ $k->id_kasus }}">
                                        <i class="fas fa-edit"></i>
                                    </button>

                                    <!-- Delete -->
                                    <form action="/guru/{{ $k->id_kasus }}" method="POST" class="d-inline">
                                        @csrf @method('DELETE')
                                        <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus guru ini?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
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
@endsection