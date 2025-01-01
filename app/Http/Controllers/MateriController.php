<?php

namespace App\Http\Controllers;

use App\Models\Peserta;
use App\Models\ModulMateri;
use App\Models\ProgramStudy;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class MateriController extends Controller
{
    public function index(Request $request)
    {
        $siswa = session('siswa');

        if (!$siswa) {
            return redirect()->route('login')->withErrors('Anda harus login terlebih dahulu.');
        }

        $modul = Peserta::where('id_siswa', $siswa->id)
            ->join('tb_jenis_ujian', 'tb_peserta.id_jenis_ujian', '=', 'tb_jenis_ujian.id_jenis_ujian')
            ->join('tb_program_studi', 'tb_peserta.kode_program_studi', '=', 'tb_program_studi.kode_program_studi')
            ->select('tb_peserta.*', 'tb_program_studi.nama_program_studi', 'tb_jenis_ujian.nama_ujian')
            ->first();

        session(['modul' => $modul]);

        $query = ModulMateri::query();

        // Filter materials based on the program study
        if ($modul) {
            $query->where('kode_program_studi', $modul->kode_program_studi);
        }

        $materis = $query->get();
        $programStudis = ProgramStudy::all();

        return view('user.materi.index', compact('materis', 'programStudis', 'modul'));
    }

    public function show(String $id)
    {
        $materis = ModulMateri::findOrFail($id);
        return view('user.materi.show', compact('materis'));
    }
}
