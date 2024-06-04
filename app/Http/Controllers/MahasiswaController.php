<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Image;

class MahasiswaController extends Controller
{
    public function index()
    {
        $data = ['nama' => "intan", 'foto' => 'E020322098.jpeg'];
        $mahasiswa = DB::table('mahasiswa')->get();
        return view('mahasiswa.index', compact(['data', 'mahasiswa']));
    }
    public function show($id)
    {

    }

    public function tambah()
    {
        $data = ['nama' => "intan", 'foto' => 'E020322098.jpeg'];
        $dataprodi = DB::table('prodi')->get();
        return view('mahasiswa.tambahmahasiswa', compact(['data', 'dataprodi']));
    }

    public function store(Request $request)
    {
        $mahasiswa = new Mahasiswa();
        $mahasiswa->nim = $request->nim;
        $mahasiswa->nama = $request->nama;
        $mahasiswa->no_hp = $request->no_hp;
        $mahasiswa->prodi_id = $request->prodi_id;
        $mahasiswa->alamat = $request->alamat;
        $mahasiswa->password = bcrypt($request->nim);

        if ($request->foto) {
            $file = $request->file('foto');
            $path = $request->nim;
            $extension = '.' . $file->getClientOriginalExtension();
            $photoUrl = $path . $extension;
            $file->move('dist/img/', $photoUrl);

            $mahasiswa->foto = $photoUrl;
        }

        $mahasiswa->save();

        return redirect('mahasiswa');

    }
}
