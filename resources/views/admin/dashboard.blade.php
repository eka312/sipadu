@extends('layouts.main_admin')

@section('title', 'Dashboard | SIPADU')

@section('content')
    <div class="container-fluid px-4">
        <div class="row g-3">

            <!-- Jumlah Laporan -->
            <div class="col-xl-3 col-md-6">
                <div class="card stat-card">
                    <div class="card-body d-flex align-items-center justify-content-between">
                        <div>
                            <h6 class="text-muted mb-1">Jumlah Laporan</h6>
                            <h3 class="fw-bold mb-0">{{ $jumlahLaporan }}</h3>
                        </div>
                        <div class="icon-wrapper bg-primary-soft">
                            <i class="fas fa-file-alt text-primary"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Menunggu Respon -->
            <div class="col-xl-3 col-md-6">
                <div class="card stat-card">
                    <div class="card-body d-flex align-items-center justify-content-between">
                        <div>
                            <h6 class="text-muted mb-1">Menunggu Respon</h6>
                            <h3 class="fw-bold mb-0">{{ $menunggu }}</h3>
                        </div>
                        <div class="icon-wrapper bg-warning-soft">
                            <i class="fas fa-hourglass-half text-warning"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sedang Diproses -->
            <div class="col-xl-3 col-md-6">
                <div class="card stat-card">
                    <div class="card-body d-flex align-items-center justify-content-between">
                        <div>
                            <h6 class="text-muted mb-1">Sedang Diproses</h6>
                            <h3 class="fw-bold mb-0">{{  $diproses }}</h3>
                        </div>
                        <div class="icon-wrapper bg-info-soft">
                            <i class="fas fa-sync-alt text-info"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Selesai -->
            <div class="col-xl-3 col-md-6">
                <div class="card stat-card">
                    <div class="card-body d-flex align-items-center justify-content-between">
                        <div>
                            <h6 class="text-muted mb-1">Selesai</h6>
                            <h3 class="fw-bold mb-0">{{ $selesai }}</h3>
                        </div>
                        <div class="icon-wrapper bg-success-soft">
                            <i class="fas fa-check-circle text-success"></i>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="row mt-5">

            <!-- CHART -->
            <div class="col-xl-6">
                <div class="card stat-card mb-4 border-0">
                    <div class="card-body">
                        <h6 class="fw-bold text-muted mb-3">
                            <i class="fas fa-chart-area me-2 text-primary"></i>
                            Grafik Laporan
                        </h6>

                        <div style="height: 260px;">
                            <canvas id="mydata"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <!-- TABEL LAPORAN TERBARU -->
            <div class="col-xl-6">
                <div class="card stat-card mb-4  border-0">
                    <div class="card-body">
                        <h6 class="fw-bold text-muted mb-3">
                            <i class="fas fa-clock me-2 text-primary"></i>
                            Laporan Terbaru
                        </h6>

                        <div class="table-responsive small">
                            <table class="table table-hover align-middle mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th>No</th>
                                        <th>Jenis Kasus</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($laporanTerbaru as $l)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $l->kasus->jenis_kasus ?? '-' }}</td>
                                            <td>
                                                @if($l->status == 'menunggu')
                                                    <span class="badge bg-secondary">{{ $l->status }}</span>
                                                @elseif($l->status == 'diproses')
                                                    <span class="badge bg-warning">{{ $l->status }}</span>
                                                @else
                                                    <span class="badge bg-success">{{ $l->status }}</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>

                <!-- TABEL SEDANG DIPROSES -->
                <div class="card stat-card mb-4  border-0">
                    <div class="card-body">
                        <h6 class="fw-bold text-muted mb-3">
                            <i class="fas fa-sync-alt me-2 text-info"></i>
                            Sedang Diproses
                        </h6>

                        <div class="table-responsive small">
                            <table class="table table-hover align-middle mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th>No</th>
                                        <th>Jenis Kasus</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($laporanDiproses as $l)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $l->kasus->jenis_kasus ?? '-' }}</td>
                                            <td>
                                                @if($l->status == 'menunggu')
                                                    <span class="badge bg-secondary">{{ $l->status }}</span>
                                                @elseif($l->status == 'diproses')
                                                    <span class="badge bg-warning">{{ $l->status }}</span>
                                                @else
                                                    <span class="badge bg-success">{{ $l->status }}</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>

        </div>

    </div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('mydata').getContext('2d');
    const mydata = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Menunggu', 'Diproses', 'Selesai'],
            datasets: [{
                label: 'Jumlah Laporan',
                data: [{{ $menunggu }}, {{ $diproses }}, {{ $selesai }}],
                backgroundColor: [
                    'rgba(255, 193, 7, 0.6)',
                    'rgba(13, 110, 253, 0.6)',
                    'rgba(25, 135, 84, 0.6)'
                ],
                borderColor: ['#ffc107', '#0d6efd', '#198754'],
                borderWidth: 2
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false
        }
    });
</script>



@endsection