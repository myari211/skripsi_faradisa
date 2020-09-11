<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\kelas;
use App\jurusan;
use Ramsey\Uuid\Uuid;

class KelasController extends Controller
{
    public function index(){
        $kelas = DB::table('kelas')->join('jurusan', 'kelas.jurusan_id', '=', 'jurusan.id')->get();
        $jurusan = Jurusan::all();

        return view('kelas', compact('kelas', 'jurusan'));
    }

    public function add(Request $request){
        $kelas = new Kelas;
        $kelas->id_kelas = Uuid::Uuid4()->getHex();
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

    public function delete(Request $request){
        $kelas = DB::table('kelas')->where('id_kelas', $request->id)->delete();

        return redirect('/kelas');
    }
}
