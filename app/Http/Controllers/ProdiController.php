<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class ProdiController extends Controller
{
    public function index()
    {
        $data = ['nama' => "intan", 'foto' => 'E020322098.jpeg'];
        $prodi = DB::table('prodi')->get();
        return view('prodi', compact(['data', 'prodi']));
    }
    public function show($id)
    {

    }
}
