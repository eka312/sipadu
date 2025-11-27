@extends('layouts.main_admin')

@section('title', 'Data Pelapor | SIPADU')

@section('content')


    <div class="container-fluid px-4">

        <div class="d-flex justify-content-between align-items-center mb-3">
            <div>
                <h3 class="fw-bold mb-0">Data Pelapor</h3>
                <small class="text-muted">Kelola data pelapor yang tercatat dalam sistem SIPADU.</small>
            </div>


        </div>


        <div class="card shadow-sm border-0">
            <div class="card-header bg-primary text-white">
                <i class="fas fa-list me-2"></i> Daftar Jenis Kasus
            </div>

            <div class="card-body">
                <table id="datatablesSimple" class="table table-striped table-bordered">
                    <thead class="text-center">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email / NIS / NIP</th>
                            <th>Mapel / Kelas</th>
                            <th>Role</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pelapor as $p)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $p->siswa?->nama_siswa ?? $p->guru?->nama_guru ?? '-' }}</td>
                                <td>{{ $p->siswa?->email ?? $p->guru?->email ?? '-' }} /
                                    {{ $p->siswa?->nis ?? $p->guru?->no_identitas ?? '-' }}
                                </td>
                                <td>
                                    @if($p->siswa)
                                        {{ $p->siswa->kelas->nama_kelas ?? '-' }}
                                    @elseif($p->guru)
                                        {{ $p->guru->mapel->nama_mapel ?? '-' }}
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>{{ $p->siswa ? 'Siswa' : ($p->guru ? 'Guru' : '-') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection