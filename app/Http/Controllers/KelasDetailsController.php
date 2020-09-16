<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\kelas;

class KelasDetailsController extends Controller
{
    public function index(){
        $kelas = DB::table('kelas')
            ->join('jurusan', 'kelas.jurusan_id', '=', 'jurusan.id')
            ->Leftjoin('siswa', 'siswa.kelas_id','=','kelas.id')
            ->groupBy('nama_kelas')
            ->select('kelas.*', 'jurusan.nama_jurusan', 'siswa.nama_siswa',DB::raw('count(nama_siswa) as total'))
            ->paginate(4);

        return view('kelas_details', compact('kelas'));
    }

    public function details($id){
        $siswa = DB::table('siswa')->where('kelas_id', $id)->get();
        $kelas = DB::table('kelas')->where('id', $id)->get();
        
        return view('details_kelas', compact('siswa', 'kelas'));
    }
}
