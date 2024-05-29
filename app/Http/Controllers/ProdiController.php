<?php

namespace App\Http\Controllers;

use App\Models\Prodi;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class ProdiController extends Controller
{
    public function index()
    {
        $data = ['nama' => "intan", 'foto' => 'E020322098.jpeg'];
        $prodi = Prodi::all();
        //dd($prodi);// mencek data
        return view('prodi.index', compact(['data', 'prodi']));
    }
    public function show($id)
    {

    }

    public function tambah()
    {
        $data = ['nama' => "intan", 'foto' => 'E020322098.jpeg'];
        return view('prodi.tambahprodi', compact(['data']));
    }

    public function store(Request $request)
    {
        $validateData = $request->validate(
            [
                'nama_prodi' => 'required|max:255'
            ],
        );
        Prodi::create($validateData);
        return redirect('prodi');
    }

}
