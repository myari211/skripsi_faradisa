<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\guru;
use App\matpel;
use Ramsey\Uuid\Uuid;

class GuruController extends Controller
{
    public function index(){
        $matpel= Matpel::all();

        $guru = DB::table('guru')
        ->join('mata_pelajaran', function ($join) {
            $join->on('guru.matpel_id','=','mata_pelajaran.id');
        })->select('guru.*', 'kode_matpel', 'nama_matpel')->get();

        return view('guru', compact('guru', 'matpel'));
    }

    public function create(Request $request){
        $guru = new Guru;

        $guru->id = Uuid::Uuid4()->getHex();
        $guru->nip = $request->nip;
        $guru->nama_guru = $request->nama_guru;
        $guru->email = $request->email;
        $guru->matpel_id = $request->matpel;
        
        $guru->save();

        return redirect('/guru');
    }

    public function update($id, Request $request){
        $guru = Guru::find($id);
        
        $guru->nip = $request->nip;
        $guru->nama_guru = $request->nama_guru;
        $guru->email = $request->email;
        $guru->matpel_id = $request->matpel;

        $guru->save();

        return redirect('/guru');
    }

    public function delete($id){
        $guru = Guru::find($id);

        $guru->delete($id);

        return redirect('/guru');
    }
}
