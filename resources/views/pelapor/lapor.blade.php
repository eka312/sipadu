@extends('layouts.main_pelapor')

@section('title', 'Lapor | SIPADU')

@section('content')

    <div class="container py-5">
        <div class="card bg-white shadow-sm">
            <div class="card-body">
                <!-- <div class="mb-3 row">
                            <label for="staticname" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" readonly class="form-control-plaintext" id="staticname"
                                    value="nama">
                            </div>
                        </div> -->
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
                    <label for="kasus-terpilih" class="col-sm-2 col-form-label">Terpilih</label>
                    <div class="col-sm-10">
                        <input type="text" readonly class="form-control-plaintext" id="kasus-terpilih"
                            value="Belum dipilih">
                    </div>
                </div>

                
            </div>
        </div>

    </div>

@endsection