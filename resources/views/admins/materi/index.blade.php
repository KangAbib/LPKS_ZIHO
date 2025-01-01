@extends('layouts.app')

@section('title', 'Daftar Modul Materi')

@section('content')
<div class="containerabc">
    <div class="">
        <div class="row mb-3">
            <div class="col-md-12">
                <a href="{{ route('modul_materi.create') }}" class="btn btn-success">Tambah Modul Materi</a>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-12">
                <form action="{{ route('modul_materi.index') }}" method="GET">
                    <div class="inputs-group">
                        <select name="filter_program_studi" class="form-control">
                            <option value="">Pilih Program Pelatihan</option>
                            @foreach($programStudis as $programStudi)
                                <option value="{{ $programStudi->kode_program_studi }}" {{ request('filter_program_studi') == $programStudi->kode_program_studi ? 'selected' : '' }}>
                                    {{ $programStudi->nama_program_studi }}
                                </option>
                            @endforeach
                        </select>
                        <div class="inputs-group-append">
                            <button type="submit" class="btn btn-primary">Filter</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="custom-card"> <!-- Ganti class menjadi custom-card -->
                    <div class="card-header bg-primary text-white text-center" style="font-size: 1.5rem;">Daftar Modul Materi</div>
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Modul</th>
                                        <th>Judul Materi</th>
                                        <th>Program Pelatihan</th>
                                        <th>File Modul</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($modulMateris as $modul)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $modul->modul_pembelajaran }}</td>
                                            <td>{{ $modul->judul_materi }}</td>
                                            <td>{{ $modul->programStudi->nama_program_studi }}</td>
                                            <td>{{ $modul->file_path }}</td>
                                            <td>
                                                <a href="{{ route('modul_materi.edit', $modul->id_modul) }}"
                                                    class="btn btn-warning btn-sm">Ubah</a>
                                                <form action="{{ route('modul_materi.destroy', $modul->id_modul) }}"
                                                    method="POST" style="display:inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                                </form>
                                                <a href="{{ route('modul_materi.show', $modul->id_modul) }}"
                                                    class="btn btn-primary btn-sm">Lihat</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="pagi">
                        <div class="d-flex justify-content-center">
                            {{ $modulMateris->appends(request()->all())->links('pagination::bootstrap-4') }}
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<style>
/* CSS untuk membuat custom-card memenuhi lebar layar */
.custom-card {
    width: 100%;
    padding-bottom: 20px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    border-radius: 5px;
}

/* Responsif untuk layar kecil */
@media only screen and (max-width: 768px) {
    .custom-card {
        width: 100%;
    }

    .table-responsive {
        overflow-x: auto;
        -webkit-overflow-scrolling: touch; /* Smooth scrolling */
    }
    
    .inputs-group-append, .input-group {
        display: block;
        width: 100%;
    }

    .inputs-group select,
    .inputs-group .input-group-append {
        width: 100%;
        margin-bottom: 10px;
    }

    .table thead th, .table tbody td {
        white-space: nowrap;
    }
    .pagi {
        padding-bottom: 20px;
    }
    .containerabc{
        padding-bottom: 100px;
    }
}
</style>
