<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\kelas;
use App\jurusan;
use App\siswa;
use Ramsey\Uuid\Uuid;

class KelasController extends Controller
{
    public function index(){
        $kelas = DB::table('kelas')
            ->join('jurusan', 'kelas.jurusan_id', '=', 'jurusan.id')
            ->select('kelas.*','jurusan.*','kelas.id as kelas')
            ->get();

        // $kelas_total = Siswa::groupBy('kelas_id')->count('nama_siswa');
        $kelas_total = DB::table('kelas')
        ->join('siswa', 'kelas.id', '=', 'siswa.kelas_id')
        ->join('jurusan', 'kelas.jurusan_id', '=', 'jurusan.id')
        ->groupBy('kelas.id')
        ->select('*', DB::raw('count(*) as total'))
        ->get();
        
        $jurusan = Jurusan::all();

        return view('kelas', compact('kelas', 'jurusan', 'kelas_total'));
    }

    public function create(Request $request){
        $kelas = new Kelas;
        $kelas->id = Uuid::Uuid4()->getHex();
        $kelas->nama_kelas = $request->nama_kelas;
        $kelas->jurusan_id = $request->jurusan_id;
        $kelas->tingkatan = $request->tingkatan;
        $kelas->save();

        return redirect('/kelas');
    }

    public function update(Request $request){
        $kelas = DB::table('kelas')->where('id_kelas', $request->id)->update([
            'nama_kelas' => $request->nama_kelas,
            'jurusan_id' => $request->jurusan_id,
            'tingkatan' => $request->tingkatan
        ]);

        return redirect('/kelas');
    }

    public function delete($id){
        $kelas = Kelas::find($id);

        $kelas->delete($id);

        return redirect('/kelas');
    }


    public function detail($id){
        $kelas = DB::table('kelas')->join('siswa', 'kelas.id', '=', 'siswa.kelas_id')->where('kelas_id', $id)->get();


        return view('/kelas_detail', compact('kelas'));
    }
}
