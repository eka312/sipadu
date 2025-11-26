@extends('layouts.main_pelapor')

@section('title', 'Lapor | SIPADU')

@section('content')

<div class="container py-5">
    <div class="card bg-white shadow-sm">
        <div class="card-body">
            <form action="{{ auth('siswa')->check() ? route('lapor.siswa.store') : route('lapor.guru.store') }}"
                method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3 row">
                    <label for="kasus" class="col-sm-2 col-form-label">Jenis Kasus</label>
                    <div class="col-sm-10">
                        <select name="id_kasus" class="form-select" required>
                            <option selected disabled>Pilih jenis kasus</option>
                            @foreach($kasus as $k)
                            <option value="{{ $k->id_kasus }}">{{ $k->jenis_kasus }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
                    <div class="col-sm-10">
                        <textarea name="deskripsi" class="form-control" rows="4" required></textarea>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="bukti" class="col-sm-2 col-form-label">Bukti Pendukung</label>
                    <div class="col-sm-10">
                        <input type="file" name="file_bukti" class="form-control">
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="lokasi" class="col-sm-2 col-form-label">Lokasi Kejadian</label>
                    <div class="col-sm-10">
                        <input type="text" name="lokasi" class="form-control" required>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="waktu" class="col-sm-2 col-form-label">Waktu Kejadian</label>
                    <div class="col-sm-10">
                        <input type="datetime-local" name="waktu_kejadian" class="form-control" required>
                    </div>
                </div>

                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary">Kirim Laporan</button>
                </div>
            </form>

        </div>
    </div>

</div>

@endsection