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
                        <h3 class="fw-bold mb-0">120</h3>
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
                        <h3 class="fw-bold mb-0">35</h3>
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
                        <h3 class="fw-bold mb-0">18</h3>
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
                        <h3 class="fw-bold mb-0">67</h3>
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
            <div class="card stat-card mb-4  border-0">
                <div class="card-body">
                    <h6 class="fw-bold text-muted mb-3">
                        <i class="fas fa-chart-area me-2 text-primary"></i>
                        Grafik Laporan
                    </h6>
                    <canvas id="myAreaChart" height="220"></canvas>
                </div>
            </div>
        </div>

        <!-- TABEL LAPORAN TERBARU -->
        <div class="col-xl-6">
            <div class="card stat-card mb-4  border-0" >
                <div class="card-body">
                    <h6 class="fw-bold text-muted mb-3">
                        <i class="fas fa-clock me-2 text-primary"></i>
                        Laporan Terbaru
                    </h6>

                    <div class="table-responsive small">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>01</td>
                                    <td>Andi</td>
                                    <td><span class="badge bg-primary-soft text-primary px-3 py-2">Baru</span></td>
                                </tr>
                                <tr>
                                    <td>02</td>
                                    <td>Sinta</td>
                                    <td><span class="badge bg-primary-soft text-primary px-3 py-2">Baru</span></td>
                                </tr>
                                <tr>
                                    <td>03</td>
                                    <td>Rama</td>
                                    <td><span class="badge bg-primary-soft text-primary px-3 py-2">Baru</span></td>
                                </tr>
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
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>11</td>
                                    <td>Dina</td>
                                    <td><span class="badge bg-info-soft text-info px-3 py-2">Proses</span></td>
                                </tr>
                                <tr>
                                    <td>12</td>
                                    <td>Gilang</td>
                                    <td><span class="badge bg-info-soft text-info px-3 py-2">Proses</span></td>
                                </tr>
                                <tr>
                                    <td>13</td>
                                    <td>Naya</td>
                                    <td><span class="badge bg-info-soft text-info px-3 py-2">Proses</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>

    </div>

</div>

@endsection