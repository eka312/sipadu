@extends('layouts.main_admin')

@section('title', 'Data Siswa | SIPADU')

@section('content')
<div class="container-fluid px-4">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <div>
            <h3 class="fw-bold mb-0">Data Siswa</h3>
            <small class="text-muted">Kelola informasi siswa yang terdaftar dalam sistem SIPADU.</small>
        </div>



        <div class="mb-3 text-center">
            <button type="button" class="btn btn-primary me-1" data-bs-toggle="modal" data-bs-target="#modalSingle">Satu Siswa</button>
            <button type="button" class="btn btn-success me-1" data-bs-toggle="modal" data-bs-target="#importExcel">Upload Excel/CSV</button>
            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalBulk">Input Banyak</button>
        </div>


    </div>


    <div class="card shadow-sm border-0">
        <div class="card-header bg-primary text-white">
            <i class="fas fa-list me-2"></i> Daftar Siswa
        </div>

        <div class="card-body">
            <table id="datatablesSimple" class="table table-striped table-bordered">
                <thead class=" text-center">
                    <tr>
                        <th width="5%">No</th>
                        <th>Nama Siswa</th>
                        <th>Kelas</th>
                        <th>NIS</th>
                        <th>Tanggal Lahir</th>
                        <th width="15%">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($siswa as $s)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td>{{ $s->nama_siswa }}</td>
                        <td>{{ $s->kelas->nama_kelas ?? '-' }}</td>
                        <td>{{ $s->nis }}</td>
                        <td>{{ $s->tanggal_lahir }}</td>

                        <td class="text-center">
                            <!-- Edit  -->
                            <button class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                data-bs-target="#modalEdit{{ $s->id_siswa }}">
                                <i class="fas fa-edit"></i>
                            </button>

                            <!-- Modal Edit siswa -->
                            <div class="modal fade" id="modalEdit{{ $s->id_siswa }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Edit Siswa</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{route('siswa.update', $s->id_siswa)}}" method="post">
                                                @csrf

                                                <div class="mb-3">
                                                    <label class="form-label">Nama Siswa</label>
                                                    <input name="nama_siswa" class="form-control" type="text" value="{{ $s->nama_siswa }}" required>
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label">Kelas</label>
                                                    <select name="id_kelas" class="form-select" required>
                                                        @foreach($kelas as $k)
                                                        <option value="{{ $k->id_kelas }}" {{ $s->id_kelas == $k->id_kelas ? 'selected' : '' }}>
                                                            {{ $k->nama_kelas }}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label">NIS</label>
                                                    <input name="nis" class="form-control" type="text" value="{{ $s->nis }}" required>
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label">Tanggal Lahir</label>
                                                    <input name="tanggal_lahir" class="form-control" type="date" value="{{ $s->tanggal_lahir }}" required>
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label">Password (isi jika ingin ganti)</label>
                                                    <input name="password" class="form-control" type="password">
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                                </div>
                                            </form>

                                        </div>

                                    </div>
                                </div>
                            </div>



                            <!-- Tombol Delete -->
                            <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modalHapus{{ $s->id_siswa }}">
                                <i class="fas fa-trash"></i>
                            </button>

                            <!-- Modal Hapus -->
                            <div class="modal fade" id="modalHapus{{ $s->id_siswa }}" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">

                                        <form action="{{ route('siswa.delete', $s->id_siswa) }}" method="POST">
                                            @csrf
                                            <div class="modal-body">
                                                Yakin mau hapus <strong>{{ $s->nama_siswa }}</strong>? Aksi ini tidak bisa dibatalkan.
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn btn-danger">Hapus</button>
                                            </div>
                                        </form>


                                    </div>
                                </div>
                            </div>

                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted">Belum ada data siswa.</td>
                    </tr>


                    @endforelse




                </tbody>
            </table>
        </div>
    </div>

</div>

<div class="modal fade" id="modalSingle" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <form action="{{ route('siswa.store') }}" method="post">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Satu Siswa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <label>Nama Siswa</label>
                    <input name="nama_siswa" class="form-control mb-2" required>

                    <label>Kelas</label>
                    <select name="id_kelas" class="form-select mb-2" required>
                        @foreach($kelas as $k)
                        <option value="{{ $k->id_kelas }}">{{ $k->nama_kelas }}</option>
                        @endforeach
                    </select>

                    <label>NIS</label>
                    <input name="nis" class="form-control mb-2" required>

                    <label>Tanggal Lahir</label>
                    <input name="tanggal_lahir" type="date" class="form-control mb-2" required>

                    <label>Password</label>
                    <input name="password" type="password" class="form-control" required>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>



<div class="modal fade" id="importExcel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="{{ route('siswa.import_excel') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Upload Excel / CSV</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <label>File Excel / CSV</label>
                    <input type="file" name="file" class="form-control mb-2" required>

                    <small class="text-muted">
                        Format kolom: <b>id_kelas, nama_siswa, nis, tanggal_lahir, password</b>
                    </small>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button class="btn btn-success">Upload</button>
                </div>
            </form>
        </div>
    </div>
</div>




<div class="modal fade" id="modalBulk" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-xl ">
        <div class="modal-content">
            <form action="{{ route('siswa.store_bulk') }}" method="post">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Banyak Siswa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <table class="table" id="bulkTable">
                        <tr>
                            <th>Nama</th>
                            <th>Kelas</th>
                            <th>NIS</th>
                            <th>Tgl Lahir</th>
                            <th>Password</th>
                            <th></th>
                        </tr>
                        <tr>
                            <td><input name="nama_siswa_bulk[]" class="form-control"></td>
                            <td>
                                <select name="id_kelas_bulk[]" class="form-select">
                                    @foreach($kelas as $k)
                                    <option value="{{ $k->id_kelas }}">{{ $k->nama_kelas }}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td><input name="nis_bulk[]" class="form-control"></td>
                            <td><input name="tanggal_lahir_bulk[]" type="date" class="form-control"></td>
                            <td><input name="password_bulk[]" type="password" class="form-control"></td>
                            <td><button type="button" class="btn btn-danger btn-sm removeRow">X</button></td>
                        </tr>
                    </table>

                    <button type="button" class="btn btn-secondary btn-sm" id="addRow">Tambah Baris</button>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button class="btn btn-warning">Simpan Semua</button>
                </div>
            </form>
        </div>
    </div>
</div>







<script src="{{asset('js/scripts.js')}}"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const addRowBtn = document.getElementById("addRow");
        const bulkTable = document.getElementById("bulkTable");

        addRowBtn.addEventListener("click", function() {
            const lastRow = bulkTable.rows[bulkTable.rows.length - 1];
            const newRow = lastRow.cloneNode(true);

            newRow.querySelectorAll("input").forEach(input => input.value = "");
            bulkTable.appendChild(newRow);
        });

        bulkTable.addEventListener("click", function(e) {
            if (e.target && e.target.classList.contains("removeRow")) {
                if (bulkTable.rows.length > 2) {
                    e.target.closest("tr").remove();
                }
            }
        });
    });
</script>







@endsection