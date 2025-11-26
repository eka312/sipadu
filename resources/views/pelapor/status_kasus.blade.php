@extends('layouts.main_pelapor')

@section('content')
<div class="container py-5">
  <div class="row">
    <div class="col-12">

      <!-- Header  -->
      <div class="mb-4">
        <h1 class="fw-bold text-primary">Status Laporan Kamu</h1>
        <p class="text-muted">Cek perkembangan laporan secara real-time. Semua update dari petugas akan muncul di sini.</p>
      </div>

      <!-- List laporan (jika ada)  -->
      @if(!empty($laporan) && $laporan->count() > 0)


      <div class="card shadow-sm border-0">
        <div class="card-header bg-primary text-white">
          <i class="fas fa-list me-2"></i> Daftar Laporan Anda
        </div>

        <div class="card-body">
          <table id="datatablesSimple"  >
            <thead class="table text-center">
              <tr>
                <th>No</th>
                <th>Jenis Kasus</th>
                <th>Lokasi</th>
                <th>Tanggal</th>
                <th>Status</th>

              </tr>
            </thead>

            <tbody>
              @forelse ($laporan as $l)
              <tr>
                <td class="text-center">{{ $loop->iteration }}</td>
                <td>{{ $l->kasus->jenis_kasus ?? '-' }}</td>
                <td>{{ $l->lokasi }}</td>
                <td>{{ $l->tanggal_waktu }}</td>
                <td>
                  <span class="badge 
                    @if($l->status == 'menunggu') bg-warning 
                    @elseif($l->status == 'diproses') bg-info
                    @else bg-success @endif">
                    {{ $l->status }}
                  </span>
                </td>

              </tr>
              @endforeach
            </tbody>
          </table>
        </div>

      </div>
      @else
      <p class="text-center text-muted">Belum ada laporan nih. Semangat ya! 💪</p>
      @endif




      <div class="mt-3 text-center text-muted small">
        Identitas pelapor dijamin aman dan hanya diakses oleh petugas berwenang. Jangan mengunggah konten yang melanggar hukum.
      </div>

    </div>
  </div>
</div>



@endsection