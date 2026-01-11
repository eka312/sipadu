<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Cetak Data Laporan</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            margin: 30px;
            color: #000;
        }

        h3 {
            text-align: center;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .subtitle {
            text-align: center;
            font-size: 11px;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 6px;
            vertical-align: middle;
        }

        th {
            background-color: #f2f2f2;
            text-align: center;
        }

        td {
            text-align: left;
        }

        .no-print {
            margin-bottom: 20px;
        }

        @media print {
            .no-print {
                display: none !important;
            }

            body {
                margin: 15mm;
            }
        }
    </style>
</head>

<body>

    <!-- Tombol Aksi (tidak ikut tercetak) -->
    <div class="no-print d-flex justify-content-between">
        <a href="{{ route('laporan.index', request()->query()) }}" class="btn btn-secondary btn-sm">
            ⬅ Kembali
        </a>

        <button onclick="window.print()" class="btn btn-success btn-sm">
            🖨 Print
        </button>
    </div>

    <!-- Header Laporan -->
    <h3>LAPORAN ADUAN SIPADU</h3>
    <div class="subtitle">
        Sistem Informasi Pengaduan Sekolah
    </div>

    <!-- Tabel Laporan -->
    <table>
        <thead>
            <tr>
                <th width="5%">No</th>
                <th>Pelapor</th>
                <th>Jenis Aduan</th>
                <th>Lokasi</th>
                <th width="12%">Tanggal</th>
                <th width="12%">Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($laporan as $l)
            <tr>
                <td class="text-center">{{ $loop->iteration }}</td>
                <td>
                    {{ $l->siswa?->nama_siswa 
                        ?? $l->guru?->nama_guru 
                        ?? '-' }}
                </td>
                <td>{{ $l->kasus->jenis_kasus ?? '-' }}</td>
                <td>{{ $l->lokasi }}</td>
                <td class="text-center">
                    {{ \Carbon\Carbon::parse($l->tanggal_waktu)->format('d-m-Y') }}
                </td>
                <td class="text-center">
                    {{ ucfirst($l->status) }}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
