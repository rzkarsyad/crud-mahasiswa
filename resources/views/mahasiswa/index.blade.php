@extends('layouts.app')

@section('content')
    <div class="container-xl">
        <div class="row">
            <div class="col-12 col-lg-auto mt-3 mt-lg-0">
                <!-- Page title -->
                <div class="page-header d-print-none">
                    <h2 class="page-title">
                        Mahasiswa
                    </h2>
                </div>
            </div>
            <div class="col-lg-auto ms-lg-auto mt-3">
                <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-report">
                    + Tambah Mahasiswa
                </a>
            </div>
        </div>
    </div>

    <div class="page-body">
        <div class="container-xl">

            <div class="card">
                <div class="table-responsive">
                    <table class="table" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>NIM</th>
                                <th>Tanggal Lahir</th>
                                <th>Jurusan</th>
                                <th>Kelas</th>
                                <th>Angkatan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($mahasiswa as $m)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $m->nama }}</td>
                                    <td>{{ $m->nim }}</td>
                                    <td>{{ $m->tgl_lahir }}</td>
                                    <td>{{ $m->jurusan->nama_jurusan }}</td>
                                    <td>{{ $m->kelas->nama_kelas }}</td>
                                    <td>{{ $m->angkatan }}</td>
                                    <td>
                                        <a href="" class="btn btn-warning" data-bs-toggle="modal"
                                            data-bs-target="#modal-edit"><i class="ti ti-pencil"></i>
                                        </a>

                                        <a href="{{ $m->id }}" class="btn btn-danger showModal"
                                            data-bs-toggle="modal" data-bs-target="#modal-small"
                                            data-id="{{ $m->id }}" data-nama="{{ $m->nama }}">
                                            <i class="ti ti-trash"></i>
                                        </a>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @if ($mahasiswa->hasPages())
                    <div class="card-footer pb-0">
                        {{ $mahasiswa->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>

    <div class="modal modal-blur fade" id="modal-report" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Mahasiswa Baru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('mahasiswa/store') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Nama</label>
                            <input type="text" class="form-control" name="nama" placeholder="Masukan nama lengkap">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">NIM</label>
                            <input type="number" class="form-control" name="nim" placeholder="Masukan NIM">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Tanggal Lahir</label>
                            <input type="date" class="form-control" name="tgl_lahir">
                        </div>

                        <div class="row">

                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label class="form-label">Jurusan</label>
                                    <select name="jurusan" id="jurusan" class="form-select">
                                        <option value="" selected>Pilih jurusan</option>
                                        @foreach ($jurusan as $kode => $nama_jurusan)
                                            <option value="{{ $kode }}">{{ $nama_jurusan }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label class="form-label">Kelas</label>
                                    <select name="kelas" id="kelas" class="form-select">

                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label class="form-label">Angkatan</label>
                                    <select name="angkatan" id="angkatan" class="form-select" name="year">
                                        @for ($year = date('Y'); $year > date('Y') - 100; $year--)
                                            <option value="{{ $year }}">
                                                {{ $year }}
                                            </option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                                Batal
                            </a>
                            <button type="submit" class="btn btn-primary ms-auto" data-bs-dismiss="modal">
                                <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <line x1="12" y1="5" x2="12" y2="19" />
                                    <line x1="5" y1="12" x2="19" y2="12" />
                                </svg>
                                Tambah Baru
                            </button>
                        </div>
                </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal modal-blur fade" id="modal-edit" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Sunting Data Mahasiswa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('mahasiswa/store') }}" method="post">
                        @csrf
                        <input type="text" class="form-control" name="id">
                        <div class="mb-3">
                            <label class="form-label">Nama</label>
                            <input type="text" class="form-control" name="nama" placeholder="Masukan nama lengkap">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">NIM</label>
                            <input type="number" class="form-control" name="nim" placeholder="Masukan NIM">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Tanggal Lahir</label>
                            <input type="date" class="form-control" name="tgl_lahir">
                        </div>

                        <div class="row">

                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label class="form-label">Jurusan</label>
                                    <select name="jurusan" id="jurusan" class="form-select">
                                        <option value="" selected>Pilih jurusan</option>
                                        @foreach ($jurusan as $kode => $nama_jurusan)
                                            <option value="{{ $kode }}">{{ $nama_jurusan }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label class="form-label">Kelas</label>
                                    <select name="kelas" id="kelas" class="form-select">

                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label class="form-label">Angkatan</label>
                                    <select name="angkatan" id="angkatan" class="form-select" name="year">
                                        @for ($year = date('Y'); $year > date('Y') - 100; $year--)
                                            <option value="{{ $year }}">
                                                {{ $year }}
                                            </option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                                Batal
                            </a>
                            <button type="submit" class="btn btn-primary ms-auto" data-bs-dismiss="modal">
                                <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <line x1="12" y1="5" x2="12" y2="19" />
                                    <line x1="5" y1="12" x2="19" y2="12" />
                                </svg>
                                Tambah Baru
                            </button>
                        </div>
                </div>
                </form>
            </div>
        </div>
    </div>


    <div class="modal modal-blur fade" id="modal-small" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="modal-title">Apakah Anda yakin?</div>
                    <div id="detail-user">
                        Data mahasiswa dengan nama
                        <b id="nama"></b>
                        akan dihapus.
                    </div>
                </div>
                <div class="modal-footer">
                    <form action="mahasiswa/hapus/{{ $m->id }}" method="get">
                        <button type="button" class="btn btn-link link-secondary me-auto"
                            data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-danger" data-bs-dismiss="modal">Ya, hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('custom_scripts')
    <script>
        // when jurusan dropdown changes
        $('#jurusan').change(function() {

            var kode_jurusan = $(this).val();

            if (kode_jurusan) {

                $.ajax({
                    type: "GET",
                    url: "{{ url('getKelas') }}?kode_jurusan=" + kode_jurusan,
                    success: function(res) {

                        if (res) {

                            $("#kelas").empty();
                            $("#kelas").append('<option>Pilih Kelas</option>');
                            $.each(res, function(key, value) {
                                $("#kelas").append('<option value="' + key + '">' + value +
                                    '</option>');
                            });

                        } else {

                            $("#kelas").empty();
                        }
                    }
                });
            } else {

                $("#kelas").empty();
            }
        });


        $(document).ready(function() {
            $('.showModal').click(function() {
                var data_id = $(this).data("id")
                var data_nama = $(this).data("nama")
                $.ajax({
                    url: "{{ url('mahasiswa/show') }}",
                    method: "GET",
                    data: {
                        data_id: data_id,
                        data_nama: data_nama
                    },
                    success: function(data) {
                        $('#nama').text(data_nama);
                    }
                })
            })
        })
    </script>
@endsection
