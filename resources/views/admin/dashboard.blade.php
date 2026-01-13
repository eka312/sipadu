@extends('layouts.main_admin')

@section('title', 'Dashboard | SIPADU')

@section('content')
<div class="container-fluid px-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <div>
            <h3 class="fw-bold mb-0">Dashboard</h3>
            <small class="text-muted">Pantau aktivitas sistem, statistik laporan, dan data terbaru di SIPADU.</small>
        </div>
    </div>


    <div class="row g-3"> <div class="col-12 col-sm-6 col-xl-3">
        <div class="card stat-card h-100 border-0 shadow-sm">
            <div class="card-body d-flex align-items-center justify-content-between p-4">
                <div>
                    <h6 class="text-muted small uppercase mb-2">Jumlah Laporan</h6>
                    <h3 class="fw-bold mb-0">{{ $jumlahLaporan }}</h3>
                </div>
                <div class="icon-wrapper bg-primary-soft">
                    <i class="fas fa-file-alt text-primary fs-4"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 col-sm-6 col-xl-3">
        <div class="card stat-card h-100 border-0 shadow-sm">
            <div class="card-body d-flex align-items-center justify-content-between p-4">
                <div>
                    <h6 class="text-muted small uppercase mb-2">Menunggu Respon</h6>
                    <h3 class="fw-bold mb-0">{{ $menunggu }}</h3>
                </div>
                <div class="icon-wrapper bg-warning-soft">
                    <i class="fas fa-hourglass-half text-warning fs-4"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 col-sm-6 col-xl-3">
        <div class="card stat-card h-100 border-0 shadow-sm">
            <div class="card-body d-flex align-items-center justify-content-between p-4">
                <div>
                    <h6 class="text-muted small uppercase mb-2">Sedang Diproses</h6>
                    <h3 class="fw-bold mb-0">{{ $diproses }}</h3>
                </div>
                <div class="icon-wrapper bg-info-soft">
                    <i class="fas fa-sync-alt text-info fs-4"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 col-sm-6 col-xl-3">
        <div class="card stat-card h-100 border-0 shadow-sm">
            <div class="card-body d-flex align-items-center justify-content-between p-4">
                <div>
                    <h6 class="text-muted small uppercase mb-2">Selesai</h6>
                    <h3 class="fw-bold mb-0">{{ $selesai }}</h3>
                </div>
                <div class="icon-wrapper bg-success-soft">
                    <i class="fas fa-check-circle text-success fs-4"></i>
                </div>
            </div>
        </div>
    </div>

</div>

    <!-- CHART -->
    <div class="my-4">
        <div class="card stat-card border-0">
            <div class="card-body">
                <h6 class="fw-bold text-muted mb-3">
                    <i class="fas fa-chart-area me-2 text-primary"></i>
                    Grafik Laporan
                </h6>

                <div style="height: 280px;">
                    <canvas id="mydata"></canvas>
                </div>
            </div>
        </div>
    </div>

    <div class="row ">

        <div class="col-6">
            <!-- TABEL LAPORAN TERBARU -->
            <div class="card shadow-sm mb-4 border-0">
                <div class="card-header bg-primary text-white">
                    <i class="fas fa-clock me-2 "></i>Laporan Terbaru
                </div>

                <div class="card-body">
                    <table class="table table-striped table-bordered">
                        <thead class=" text-center">
                            <tr>
                                <th>No</th>
                                <th>Jenis Aduan</th>
                                <th>Status</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse($laporanTerbaru as $l)
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

                            @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted">Belum ada Laporan Terbaru.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-6">
            <!-- TABEL SEDANG DIPROSES -->
            <div class="card shadow-sm border-0">
                <div class="card-header bg-primary text-white">
                    <i class="fas fa-sync-alt me-2"></i>Sedang Diproses
                </div>

                <div class="card-body">
                    <table class="table table-striped table-bordered">
                        <thead class=" text-center">
                            <tr>
                                <th>No</th>
                                <th>Jenis Aduan</th>
                                <th>Status</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($laporanDiproses as $l)
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

                            @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted">Belum ada Laporan yang diproses.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

</div>


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const menunggu = JSON.parse(`{!! json_encode($menunggu) !!}`);
    const diproses = JSON.parse(`{!! json_encode($diproses) !!}`);
    const selesai = JSON.parse(`{!! json_encode($selesai) !!}`);


    const ctx = document.getElementById('mydata').getContext('2d');
    const mydata = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Menunggu', 'Diproses', 'Selesai'],
            datasets: [{
                label: 'Jumlah Laporan',
                data: [menunggu, diproses, selesai],
                backgroundColor: [
                    'rgba(108, 117, 125, 0.6)', // secondary
                    'rgba(255, 193, 7, 0.6)', // warning
                    'rgba(25, 135, 84, 0.6)' // success
                ],
                borderColor: [
                    '#6c757d', // secondary
                    '#ffc107', // warning
                    '#198754' // success
                ],
                borderWidth: 2,
                tension: 0.3,
            }],
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                },
                tooltip: {
                    enabled: true
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 1
                    }
                },
                x: {
                    grid: {
                        display: false
                    }
                }
            }
        }
    });
</script>





@endsection