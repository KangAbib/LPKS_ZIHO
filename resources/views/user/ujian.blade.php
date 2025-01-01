@extends('layouts.app_user')

@section('title', 'Ujian')

@section('content')
    <div class="row mb-3">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-success text-white d-flex justify-content-between">
                    <span>{{ \Carbon\Carbon::now()->format('d F Y | H:i:s') }}</span>
                    <h4 class="card-title">Daftar Ujian</h4>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Pelatihan</th>
                                    <th class="d-none d-sm-table-cell">Tanggal</th>
                                    <th>Durasi</th>
                                    <th>Sesi</th>
                                    <th>Status</th>
                                    <th>Info</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($exams as $exam)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $exam->nama_program_studi }}</td>
                                    <td class="d-none d-sm-table-cell">{{ $exam->tanggal_ujian }}</td>
                                    <td>{{ $exam->durasi_ujian }} Menit</td>
                                    <td>{{ $exam->nama_ujian }}</td>
                                    <td>
                                        @if ($exam->status_ujian == 0)
                                            <a href="{{ route('ujian.show', ['kode_program_studi' => $exam->kode_program_studi, 'id_jenis_ujian' => $exam->id_jenis_ujian]) }}" class="btn btn-success btn-ujian">Mulai Ujian</a>
                                        @else
                                            <span class="badge badge-secondary">Ujian Selesai</span>
                                        @endif
                                    </td>
                                    <td>
                                        <!-- Gunakan ID unik untuk setiap modal -->
                                        <i class="fas fa-info-circle text-info" data-toggle="modal" data-target="#infoModal{{ $exam->id_peserta }}"></i>
                                    </td>
                                </tr>

                                <!-- Modal -->
                                <div class="modal fade" id="infoModal{{ $exam->id_peserta }}" tabindex="-1" role="dialog" aria-labelledby="infoModalLabel{{ $exam->id_peserta }}" aria-hidden="true" style="text-align: left;font-family: Poppins ">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="infoModalLabel{{ $exam->id_peserta }}">Detail Ujian</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p><strong>Nama:</strong> {{ session('siswa')->name }}</p>
                                                <p><strong>Pelatihan:</strong> {{ $exam->nama_program_studi }}</p>
                                                <p><strong>Tanggal:</strong> {{ $exam->tanggal_ujian }}</p>
                                                <p><strong>Durasi:</strong> {{ $exam->durasi_ujian }} Menit</p>
                                                <p><strong>Sesi:</strong> {{ $exam->nama_ujian }}</p>

                                                <!-- Logika untuk menampilkan nilai hanya jika ujian selesai -->
                                                @if($exam->status_ujian == 1)
                                                    <p><strong>Nilai:</strong> {{ $exam->skor ?? 'Belum ada nilai' }}</p>
                                                @else
                                                    <p><strong>Nilai:</strong> Belum ada nilai, ujian belum selesai</p>
                                                @endif
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
