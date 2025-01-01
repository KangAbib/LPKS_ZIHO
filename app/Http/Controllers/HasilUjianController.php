<?php

namespace App\Http\Controllers;

use App\Models\Peserta;
use App\Models\JenisUjian;
use App\Models\ProgramStudy;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class HasilUjianController extends Controller
{
    public function index(Request $request)
    {
        $default_program_studi = 'T1';
        $filter_program_studi = $request->input('filter_program_studi', $default_program_studi);
        $filter_tanggal = $request->input('filter_tanggal', null);
        $filter_bulan = $request->input('filter_bulan', null);
        $filter_jenis_ujian = $request->input('filter_jenis_ujian', null);

        // Membuat query dengan relasi yang diperlukan
        $query = Peserta::with(['siswa', 'programStudi', 'jenisUjian']);

        // Filter berdasarkan program studi
        if ($filter_program_studi) {
            $query->where('kode_program_studi', $filter_program_studi);
        }
        // Filter berdasarkan tanggal
        if ($filter_tanggal) {
            $query->whereDate('created_at', $filter_tanggal);
        }
        // Filter berdasarkan bulan
        if ($filter_bulan) {
            $query->whereMonth('created_at', date('m', strtotime($filter_bulan)))
                  ->whereYear('created_at', date('Y', strtotime($filter_bulan)));
        }
        // Filter berdasarkan jenis ujian
        if ($filter_jenis_ujian) {
            $query->where('id_jenis_ujian', $filter_jenis_ujian);
        }

        // Urutkan berdasarkan tanggal terbaru (ujian terbaru di bagian atas)
        $query->orderBy('created_at', 'desc');

        // Ambil data hasil ujian dengan pagination
        $hasilUjian = $query->paginate(50);
        $programStudis = ProgramStudy::all();
        $jenisUjians = JenisUjian::all();

        // Kembalikan ke view dengan variabel yang dibutuhkan
        return view('admins.hasil_ujian', compact('hasilUjian', 'programStudis', 'jenisUjians', 'filter_program_studi', 'filter_tanggal', 'filter_bulan', 'filter_jenis_ujian'));
    }
}