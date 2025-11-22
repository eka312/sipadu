@extends('layouts.main_admin')

@section('title', 'Data Guru | SIPADU')

@section('content')
    <div class="container-fluid px-4">

        {{-- Page Title --}}
        <div class="d-flex justify-content-between align-items-center mb-3">
            <div>
                <h3 class="fw-bold mb-0">Data Guru</h3>
                <small class="text-muted">Kelola data guru yang terdaftar dalam sistem SIPADU.</small>
            </div>

            <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addMapelModal">
                <i class="fas fa-plus"></i> Tambah Guru
            </button>
        </div>

        {{-- Card Table --}}
        <div class="card shadow-sm border-0">
            <div class="card-header bg-primary text-white">
                <i class="fas fa-book me-2"></i> Daftar Guru
            </div>

            <div class="card-body">
                <table id="datatablesSimple" class="table table-striped table-bordered">
                    <thead class="table-primary text-center">
                        <tr>
                            <th width="5%">No</th>
                            <th>Nama Guru</th>
                            <th>Mapel</th>
                            <th>Email</th>
                            <th>No Identitas</th>
                            <th width="15%">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($guru as $g)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td>{{ $g->nama_guru }}</td>
                                    <td>{{ $g->mapel->nama_mapel ?? '-' }}</td>
                                    <td>{{ $g->email }}</td>
                                    <td>{{ $g->no_identitas }}</td>

                                    <td class="text-center">
                                        <!-- Edit Trigger -->
                                        <button class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#modalEdit{{ $g->id_guru }}">
                                            <i class="fas fa-edit"></i>
                                        </button>

                                        <!-- Delete -->
                                        <form action="/guru/{{ $g->id_guru }}" method="POST" class="d-inline">
                                            @csrf @method('DELETE')
                                            <button class="btn btn-danger btn-sm"
                                                onclick="return confirm('Yakin hapus guru ini?')">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
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

@endsection