<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\kelas;
use App\guru;
use App\relasi_kelas_guru;

class RelasiKelasGuruController extends Controller
{
    public function index() {
        $guru = Guru::all();
        $kelas = Kelas::all();

        $relasi_kelas = DB::table('relasi_kelas_guru')
            ->join('guru', 'relasi_kelas_guru.kode_guru', '=', 'guru.id')
            ->join('kelas', 'relasi_kelas_guru.kode_kelas', '=', 'kelas.id')
            ->join('mata_pelajaran', 'guru.matpel_id', '=','mata_pelajaran.id')
            ->select('relasi_kelas_guru.*', 'kelas.*', 'guru.*')
            ->where(function($query) {
                $query->where('kode_kelas', 'kelas.id')
            })
            ->groupBy('nama_guru')
            ->get();

            return view('relasi_kelas_guru', compact('relasi_kelas', 'kelas', 'guru'));
    } 
    
    public function create(Request $request){
        $relasi = new Relasi_kelas_guru;
        $relasi->kode_guru = $request->kode_guru;
        $relasi->kode_kelas = $request->kode_kelas;

        $relasi->save();

        return redirect('/guru_kelas');
    }
}
