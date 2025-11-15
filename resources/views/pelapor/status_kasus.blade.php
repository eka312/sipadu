@extends('layouts.main_pelapor')

@section('content')
<div class="container py-5">
  <div class="row justify-content-center">
    <div class="col-lg-10">

      {{-- Header --}}
      <div class="mb-4 text-center">
        <h1 class="fw-bold text-primary">Status Laporan Kamu</h1>
        <p class="text-muted">Cek perkembangan laporan secara real-time. Semua update dari petugas akan muncul di sini.</p>
      </div>

      {{-- Jika tidak ada laporan --}}
      @if(isset($reports) && count($reports) === 0)
        <div class="alert alert-info">Belum ada laporan. <a href="{{ url('/lapor') }}" class="fw-bold">Kirim laporan sekarang</a>.</div>
      @endif

      {{-- List laporan (jika ada) --}}
      @foreach($reports ?? [] as $report)
      <div class="card mb-4 card-custom-shadow">
        <div class="card-body">
          <div class="d-sm-flex justify-content-between align-items-start">
            <div>
              <h5 class="mb-1 fw-bold">#{{ $report->code ?? 'LP-' . $report->id }} — {{ $report->title ?? ucfirst($report->jenis ?? 'Jenis Kasus') }}</h5>
              <div class="text-muted small">
                Tanggal: {{ $report->created_at->format('d M Y H:i') ?? ($report->date ?? '-') }} · Lokasi: {{ $report->lokasi ?? 'Tidak diisi' }}
              </div>
            </div>

            {{-- Status badge --}}
            <div class="mt-2 mt-sm-0 text-sm-end">
              @php
                $status = strtolower($report->status ?? 'diproses');
                $badgeClass = match($status) {
                  'diproses' => 'bg-warning text-dark',
                  'ditindaklanjuti' => 'bg-info text-white',
                  'dalam penanganan lanjutan' => 'bg-primary text-white',
                  'menunggu respon pelapor' => 'bg-secondary text-white',
                  'selesai' => 'bg-success text-white',
                  default => 'bg-light text-dark'
                };
              @endphp

              <span class="badge {{ $badgeClass }} px-3 py-2 fw-semibold text-uppercase">
                {{ $report->status ?? 'Diproses' }}
              </span>
            </div>
          </div>

          <hr>

          {{-- Ringkasan isi --}}
          <div class="mb-3">
            <h6 class="fw-semibold">Ringkasan Laporan</h6>
            <p class="mb-0 text-muted">{{ Str::limit($report->description ?? 'Tidak ada deskripsi', 300) }}</p>
          </div>

          <div class="row g-3">
            {{-- Timeline --}}
            <div class="col-lg-6">
              <h6 class="fw-semibold">Timeline Penanganan</h6>

              <ul class="timeline list-unstyled mb-0">
                @foreach($report->events ?? [] as $event)
                  <li class="d-flex mb-3">
                    <div style="width:8px;">
                      <div class="rounded-circle" style="width:10px;height:10px;background:#071F5C;margin-top:6px;"></div>
                    </div>
                    <div class="ms-3">
                      <div class="small text-muted">{{ \Carbon\Carbon::parse($event['date'])->format('d M Y H:i') ?? '-' }}</div>
                      <div>{{ $event['note'] ?? $event['title'] ?? '—' }}</div>
                      @if(!empty($event['by']))
                        <div class="text-muted small">oleh: {{ $event['by'] }}</div>
                      @endif
                    </div>
                  </li>
                @endforeach

                @if(empty($report->events))
                  <li class="text-muted small">Belum ada aktivitas pada laporan ini.</li>
                @endif
              </ul>
            </div>

            {{-- Catatan petugas & Lampiran --}}
            <div class="col-lg-6">
              <h6 class="fw-semibold">Catatan Petugas</h6>
              <div class="mb-3">
                <div class="text-muted">{{ $report->note_petugas ?? 'Belum ada catatan dari petugas.' }}</div>
              </div>

              <h6 class="fw-semibold">Lampiran</h6>
              <div class="mb-2">
                @if(!empty($report->attachments))
                  <div class="d-flex flex-wrap gap-2">
                    @foreach($report->attachments as $att)
                      <a href="{{ asset($att['url']) }}" target="_blank" class="btn btn-sm btn-outline-secondary">
                        <i class="fa-regular fa-file-lines me-1"></i> {{ $att['name'] ?? 'Lampiran' }}
                      </a>
                    @endforeach
                  </div>
                @else
                  <div class="text-muted small">Tidak ada lampiran.</div>
                @endif
              </div>

              {{-- Upload tambahan --}}
              <form action="{{ route('report.upload', ['id' => $report->id ?? 0]) }}" method="POST" enctype="multipart/form-data" class="mt-3">
                @csrf
                <label class="form-label small">Tambahkan bukti (opsional)</label>
                <div class="input-group">
                  <input class="form-control form-control-sm" name="file" type="file" id="file-{{ $report->id }}" accept="image/*,video/*,.pdf">
                  <button class="btn btn-sm btn-primary" type="submit">Upload</button>
                </div>
                <div class="mt-2 small text-muted">Foto, video, atau dokumen: jangan mengandung konten sensitif.</div>
              </form>

            </div>
          </div>

          <hr>

          {{-- Action row (contact, copy link, close feedback) --}}
          <div class="d-flex justify-content-between align-items-center">
            <div class="small text-muted">ID Laporan: <span class="fw-semibold">{{ $report->code ?? 'LP-'.$report->id }}</span></div>

            <div class="d-flex gap-2">
              <a href="mailto:{{ config('app.contact_email', 'admin@sekolah.local') }}" class="btn btn-sm btn-outline-primary">
                <i class="fa-regular fa-envelope me-1"></i> Hubungi Petugas
              </a>

              <button class="btn btn-sm btn-outline-secondary" onclick="copyLink('{{ url('/lapor/'.$report->id) }}')">
                <i class="fa-regular fa-copy me-1"></i> Salin Link
              </button>

              @if($report->status !== 'selesai')
                <a href="{{ route('report.cancel', ['id' => $report->id]) }}" class="btn btn-sm btn-danger" onclick="return confirm('Batalkan laporan?')">
                  <i class="fa-solid fa-xmark me-1"></i> Batalkan Laporan
                </a>
              @endif
            </div>
          </div>

        </div>
      </div>
      @endforeach

      {{-- Pagination (opsional) --}}
      <div class="d-flex justify-content-center mt-4">
        {{-- {!! $reports->links() !!} --}}
      </div>

      {{-- Privacy note --}}
      <div class="mt-3 text-center text-muted small">
        Identitas pelapor dijamin aman dan hanya diakses oleh petugas berwenang. Jangan mengunggah konten yang melanggar hukum.
      </div>

    </div>
  </div>
</div>

{{-- Simple JS untuk copy link --}}
@push('scripts')
<script>
  function copyLink(url){
    navigator.clipboard?.writeText(url).then(() => {
      alert('Link laporan disalin ke clipboard.');
    }).catch(()=> {
      prompt('Salin manual link ini:', url);
    });
  }

  // Optional: show file name preview for each uploader
  document.querySelectorAll('input[type="file"]').forEach(input => {
    input.addEventListener('change', e => {
      const file = e.target.files[0];
      if(!file) return;
      const parent = e.target.closest('form');
      let preview = parent.querySelector('.file-preview');
      if(!preview){
        preview = document.createElement('div');
        preview.className = 'file-preview small mt-2 text-muted';
        parent.appendChild(preview);
      }
      preview.textContent = file.name + ' • ' + Math.round(file.size / 1024) + ' KB';
    });
  });
</script>
@endpush

@endsection
