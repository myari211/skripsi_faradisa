<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\kelas;
use App\guru;
use App\guru_kelas;

class RelasiKelasGuruController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    public function index() {
        $guru = Guru::get();
        $kelas = Kelas::all();


        return view('relasi_kelas_guru', compact('guru', 'kelas'));
    } 
    
    public function create(Request $request){
        $relasi = new Guru_kelas;
        $relasi->guru_id = $request->kode_guru;
        $relasi->kelas_id = $request->kode_kelas;

        $relasi->save();

        return redirect('/guru_kelas');
    }
}
