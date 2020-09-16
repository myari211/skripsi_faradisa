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
            ->paginate(4);

        return view('kelas_details', compact('kelas'));
    }
}
