<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\matpel;
use Ramsey\Uuid\Uuid;

class MatpelController extends Controller
{
    public function index(){
        $matpel = Matpel::all();
    
        return view('matpel', compact('matpel'));
    }

    public function create(Request $request){
        $matpel = new Matpel;
        $matpel->id_matpel = Uuid::Uuid4()->getHex();
        $matpel->nama_matpel = $request->nama_matpel;
        $matpel->kode_matpel = $request->kode_matpel;
        $matpel->save();
        
        return redirect('/matpel');
    }

    public function update(Request $request){
        
        $matpel = DB::table('mata_pelajaran')->where('id_matpel', $request->id)->update([
            'kode_matpel'=>$request->kode_matpel,
            'nama_matpel'=>$request->nama_matpel
        ]);

        return redirect('/matpel');
    }

    public function delete($id,Request $request){
        $matpel = DB::table('mata_pelajaran')
        ->where('id_matpel', $id)
        ->delete();

        return redirect('/matpel');
    }
}
