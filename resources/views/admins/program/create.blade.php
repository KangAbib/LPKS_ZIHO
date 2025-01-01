@extends('layouts.app')

@section('title', 'Tambah Program Study')

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h4 class="title">Tambah Program Pelatihan</h4>
                    </div>
                    <div class="card-content">
                        <form action="{{ route('program_study.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="kode_program_studi">Kode Program Pelatihan</label>
                                <input type="text" name="kode_program_studi" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="nama_program_studi">Nama Program Pelatihan</label>
                                <input type="text" name="nama_program_studi" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="biaya">Biaya</label>
                                <input type="number" name="biaya" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="lama_waktu">Lama Waktu</label>
                                <input type="text" name="lama_waktu" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-success">Simpan</button>
                            <a href="{{ route('program_study.index') }}" class="btn btn-primary">Kembali</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
