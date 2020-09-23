<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;

use App\hambatan;

class HambatanController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){

        $hambatan = Hambatan::all();

        return view('hambatan', compact('hambatan'));
    }
}
