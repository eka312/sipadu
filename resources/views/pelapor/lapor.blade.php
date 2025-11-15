@extends('layouts.main_pelapor')

@section('title', 'Lapor | SIPADU')

@section('content')

<div class="container py-5">
    <div class="card bg-white shadow-sm">
        <div class="card-body">
            <div class="mb-3 row">
                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                    <select class="form-select" id="nama" aria-label="nama">
                        <option selected disabled>Pilih Nama Anda</option>
                        <option value="1">Bullying</option>
                        <option value="2">Kekerasan</option>
                        <option value="3">Pelanggaran Tata Tertib</option>
                    </select>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="kasus" class="col-sm-2 col-form-label">Jenis Kasus</label>
                <div class="col-sm-10">
                    <select class="form-select" id="kasus" aria-label="Pilih jenis kasus">
                        <option selected disabled>Pilih jenis kasus</option>
                        <option value="1">Bullying</option>
                        <option value="2">Kekerasan</option>
                        <option value="3">Pelanggaran Tata Tertib</option>
                    </select>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
                <div class="col-sm-10">
                    <textarea class="form-control" id="deskripsi" rows="4" placeholder="Jelaskan secara rinci laporan Anda"></textarea>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="bukti" class="col-sm-2 col-form-label">Bukti Pendukung</label>
                <div class="col-sm-10">
                    <input class="form-control" type="file" id="bukti">
                </div>
            </div>

            <div class="mb-3 row">
                <label for="lokasi" class="col-sm-2 col-form-label">Lokasi Kejadian</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="lokasi" placeholder="Masukkan lokasi kejadian">
                </div>
            </div>

            
            <div class="mb-3 row">
                <label for="waktu" class="col-sm-2 col-form-label">Waktu Kejadian</label>
                <div class="col-sm-10">
                    <input type="datetime-local" class="form-control" id="waktu">
                </div>
            </div>

            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">Kirim Laporan</button>
            </div>


        </div>
    </div>

</div>

@endsection