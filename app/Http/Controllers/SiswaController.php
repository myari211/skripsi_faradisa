<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\siswa;
use App\kelas;
use Ramsey\Uuid\Uuid;

class SiswaController extends Controller
{
    public function index(){
        $siswa = DB::table('siswa')->join('kelas', 'siswa.kelas_id','=','kelas.id')->select('siswa.*', 'kelas.nama_kelas')->get();
        $kelas = Kelas::all();

        return view('siswa', compact('siswa', 'kelas'));
    }

    public function create(Request $request){
        $siswa = new Siswa;

        $siswa->id = Uuid::Uuid4()->getHex();
        $siswa->nama_siswa = $request->nama_siswa;
        $siswa->nomor_induk = $request->nomor_induk;
        $siswa->email = $request->email;
        $siswa->jenis_kelamin = $request->jenis_kelamin;
        $siswa->kelas_id = $request->kelas_id;
        $siswa->save();

        return redirect('/siswa');
    }

    public function update($id, Request $request){
        $siswa = Siswa::find($id);
        $siswa->nama_siswa = $request->nama_siswa;
        $siswa->nomor_induk = $request->nomor_induk;
        $siswa->email = $request->email;
        $siswa->jenis_kelamin = $request->jenis_kelamin;
        $siswa->kelas_id = $request->kelas_id;
        $siswa->save();

        return redirect('/siswa');
    }

    public function delete($id){
        $siswa = Siswa::find($id);

        $siswa->delete($id);

        return redirect('/siswa');
    }
}
