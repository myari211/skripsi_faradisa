<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\jurusan;
use Ramsey\Uuid\Uuid;

class JurusanController extends Controller
{
    public function index(){
        $jurusan = Jurusan::all();

        return view('jurusan', compact('jurusan'));
    }

    public function create(Request $request){
        $jurusan = new Jurusan;
        $jurusan->id = Uuid::uuid4()->getHex();
        $jurusan->kode_jurusan = $request->kode_jurusan;
        $jurusan->nama_jurusan = $request->nama_jurusan;

        $jurusan->save();

        return redirect('/jurusan');
    }

    public function update($id, Request $request){
        $jurusan = Jurusan::find($id);
        $jurusan->kode_jurusan = $request->kode_jurusan;
        $jurusan->nama_jurusan = $request->nama_jurusan;
        $jurusan->save();

        return redirect('/jurusan');
    }

    public function delete($id){
        $jurusan = Jurusan::find($id);
        $jurusan->delete();

        return redirect('/jurusan');
    }
}
