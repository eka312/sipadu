@extends('layouts.main_admin')

@section('title', 'Data Laporan | SIPADU')

@section('content')
<div class="container-fluid px-4">

    <!-- Page Title --> 
    <div class="d-flex justify-content-between align-items-center mb-3">
        <div>
            <h3 class="fw-bold mb-0">Data Laporan</h3>
            <small class="text-muted">Kelola laporan yang tersedia di dalam sistem SIPADU.</small>
        </div>
    </div>

    <!-- Card Table --> 
    <div class="card shadow-sm border-0">
        <div class="card-header bg-primary text-white">
            <i class="fas fa-book me-2"></i> Daftar Laporan
        </div>

        <div class="card-body">
            <table id="datatablesSimple" class="table table-striped table-bordered">
                <thead class="table-primary text-center">
                    <tr>
                        <th width="5%">No</th>
                        <th>Nama Pelapor</th>
                        <th>Jenis Kasus</th>
                        <th>Petugas</th>
                        <th>File Bukti</th>
                        <th>Deskripsi</th>
                        <th>Lokasi</th>
                        <th>Waktu Kejadian</th>
                        <th>Status</th>
                        <th width="15%">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($laporan as $l)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td>{{ $l->pelapor->siswa?->nama_siswa ?? $l->pelapor->guru?->nama_guru ?? '-' }}</td>
                        <td>{{ $l->kasus->jenis_kasus ?? '-' }}</td>
                        <td>{{ $l->user->nama_petugas ?? '-' }}</td>
                        <td>
                            @if($l->file_bukti)
                            <button class="btn btn-info btn-sm text-white"
                                data-bs-toggle="modal"
                                data-bs-target="#modalBukti{{ $l->id_laporan }}">
                                Lihat
                            </button>
                            @else
                            -
                            @endif
                        </td>
                        <td>{{ $l->deskripsi }}</td>
                        <td>{{ $l->lokasi }}</td>
                        <td>{{ $l->tanggal_waktu }}</td>
                        <td>
                            @if($l->status == 'menunggu')
                            <span class="badge bg-secondary">{{ $l->status }}</span>
                            @elseif($l->status == 'diproses')
                            <span class="badge bg-warning">{{ $l->status }}</span>
                            @else
                            <span class="badge bg-success">{{ $l->status }}</span>
                            @endif
                        </td>
                        <td class="text-center">
                            <!-- Tombol Edit -->
                            <button class="btn btn-warning btn-sm m-1" data-bs-toggle="modal"
                                data-bs-target="#modalEdit{{ $l->id_laporan }}">
                                <i class="fas fa-edit"></i>
                            </button>

                            <!-- Modal Edit laporan -->
                            <div class="modal fade" id="modalEdit{{ $l->id_laporan }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Edit Jenis Kasus</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{route('laporan.update', $l->id_laporan)}}" method="post">
                                                @csrf
                                                @method('PUT')
                                                <div class="mb-4 row">
                                                    <label for="status" class="col-sm-2 col-form-label">Status</label>
                                                    <div class="col-sm-10">
                                                        <select name="status" class="form-select" id="status">
                                                            <option value="menunggu" {{ $l->status == 'menunggu' ? 'selected' : '' }}>Menunggu</option>
                                                            <option value="diproses" {{ $l->status == 'diproses' ? 'selected' : '' }}>Diproses</option>
                                                            <option value="selesai" {{ $l->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                                                        </select>
                                                    </div>
                                                </div>


                                                <div class="mb-4 row">
                                                    <label for="status" class="col-sm-2 col-form-label">Nama Petugas</label>
                                                    <div class="col-sm-10">
                                                        <select name="id_user" class="form-select" aria-label="Default select example">
                                                            @foreach ($petugas as $p)
                                                            <option @if($p->id_user==$l->id_user) selected @endif value="{{$p->id_user}}">{{$p->nama_petugas}}</option>
                                                            @endforeach
                                                        </select>
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

                            <!-- Modal Preview Bukti -->
                            <div class="modal fade" id="modalBukti{{ $l->id_laporan }}" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-lg modal-dialog-centered">
                                    <div class="modal-content">

                                        <div class="modal-header">
                                            <h5 class="modal-title">Bukti Laporan</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>

                                        <div class="modal-body text-center">

                                            @php
                                            $ext = pathinfo($l->file_bukti, PATHINFO_EXTENSION);
                                            @endphp

                                            @if(in_array($ext, ['jpg','jpeg','png']))
                                            <img src="{{ asset('storage/' . $l->file_bukti) }}" class="img-fluid rounded">

                                            @elseif($ext === 'pdf')
                                            <iframe src="{{ asset('storage/' . $l->file_bukti) }}"
                                                width="100%" height="500px">
                                            </iframe>

                                            @else
                                            <p class="text-danger">File tidak dapat ditampilkan.</p>
                                            @endif

                                        </div>

                                        <div class="modal-footer">
                                            <button class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="10" class="text-center text-muted">Belum ada data laporan.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>

</div>
@endsection