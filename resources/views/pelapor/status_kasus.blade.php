@extends('layouts.main_pelapor')

@section('content')
<div class="container py-5">
  <div class="row">
    <div class="col-12">

      <!-- Header  -->
      <div class="mb-4">

        <h1 class="fw-bold text-primary">Status Laporan</h1>
        <p class="text-muted">
          Selamat datang, <strong>{{ $nama }}.</strong><br>
          Cek perkembangan laporan secara real-time. Semua update dari petugas akan muncul di sini.
        </p>
      </div>

      <!-- List laporan (jika ada)  -->
      @if(!empty($laporan) && $laporan->count() > 0)


      <div class="card shadow-sm border-0">
        <div class="card-header bg-primary text-white">
          <i class="fas fa-list me-2"></i> Daftar Laporan Anda
        </div>

        <div class="card-body">
          <table id="datatablesSimple">
            <thead class="table text-center">
              <tr>
                <th>No</th>
                <th>Jenis Aduan</th>
                <th>Lokasi</th>
                <th>Tanggal & Waktu</th>
                <th>Deskripsi</th>
                <th>File Bukti</th>
                <th>Status</th>
                <th>Aksi</th>
              </tr>

            </thead>

            <tbody>
              @forelse ($laporan as $l)
              <tr>
                <td class="text-center">{{ $loop->iteration }}</td>
                <td>{{ $l->kasus->jenis_kasus ?? '-' }}</td>
                <td>{{ $l->lokasi }}</td>
                <td>{{ $l->tanggal_waktu }}</td>
                <td>{{ Str::limit($l->deskripsi, 40) }}</td>
                <td>
                  @if($l->file_bukti)
                  <button class="btn btn-info btn-sm text-white"
                    data-bs-toggle="modal"
                    data-bs-target="#modalBukti{{ $l->id_laporan }}">
                    Lihat
                  </button>
                  @else
                  <span class="text-muted">-</span>
                  @endif
                </td>

                <td>
                  <span class="badge 
                    @if($l->status == 'menunggu') bg-warning 
                    @elseif($l->status == 'diproses') bg-info
                    @else bg-success @endif">
                    {{ $l->status }}
                  </span>
                </td>
                <td class="text-center">
                  @if($l->status === 'menunggu')
                  <button class="btn btn-warning btn-sm"
                    data-bs-toggle="modal"
                    data-bs-target="#modalEdit{{ $l->id_laporan }}">
                    <i class="fas fa-edit"></i>
                  </button>
                  @else
                  <button class="btn btn-secondary btn-sm" disabled>
                    <i class="fas fa-lock"></i>
                  </button>
                  @endif

                  <!-- modal edit -->
                  @if($l->status === 'menunggu')
                  <div class="modal fade" id="modalEdit{{ $l->id_laporan }}" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                      <div class="modal-content">

                        <div class="modal-header">
                          <h5 class="modal-title">Edit Laporan</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>

                        <form action="{{ route('lapor.update', $l->id_laporan) }}" method="POST" enctype="multipart/form-data">
                          @csrf
                          @method('PUT')

                          <div class="modal-body">

                         

                            <!-- Lokasi -->
                            <div class="mb-3 row">
                              <label class="col-sm-2 col-form-label">Lokasi Kejadian</label>
                              <div class="col-sm-10">
                                <input type="text" name="lokasi" class="form-control" value="{{ $l->lokasi }}" required>
                              </div>

                            </div>

                            

                            <!-- Deskripsi -->
                            <div class="mb-3 row">
                              <label class="col-sm-2 col-form-label">Deskripsi</label>
                              <div class="col-sm-10">
                                <textarea name="deskripsi" class="form-control" rows="4" required>{{ $l->deskripsi }}</textarea>
                              </div>

                            </div>

                            <!-- File Bukti -->
                            <div class="mb-3 row">
                              <label class="col-sm-2 col-form-label">File Bukti</label>
                              <div class="col-sm-10">
                                <input type="file" name="file_bukti" class="form-control">
                                @if($l->file_bukti)
                                <small class="text-muted">kosongkan jika tidak ingin mengganti file</small>
                                @endif
                              </div>

                            </div>

                          </div>

                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-success"  >Simpan Perubahan</button>
                          </div>

                        </form>

                      </div>
                    </div>
                  </div>
                  @endif

                  <!-- Modal Preview Bukti -->
                  <div class="modal fade" id="modalBukti{{ $l->id_laporan }}" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
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
              @endforeach
            </tbody>
          </table>
        </div>

      </div>
      @else
      <p class="text-center text-muted">Belum ada laporan nih. Semangat ya! </p>
      @endif




      <div class="mt-3 text-center text-muted small">
        Identitas pelapor dijamin aman dan hanya diakses oleh petugas berwenang. Jangan mengunggah konten yang melanggar hukum.
      </div>

    </div>
  </div>
</div>



@endsection