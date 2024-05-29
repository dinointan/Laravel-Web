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
        $mahasiswa->NIM = $request->NIM;
        $mahasiswa->Nama = $request->Nama;
        $mahasiswa->Nomor_HP = $request->Nomor_HP;
        $mahasiswa->ID_Prodi = $request->ID_Prodi;
        $mahasiswa->Alamat = $request->Alamat;
        $mahasiswa->Password = bcrypt($request->NIM);

        if ($request->Foto) {
            $file = $request->file('Foto');
            $path = $request->NIM;
            $extension = '.' . $file->getClientOriginalExtension();
            $photoUrl = $path . $extension;
            $file->move('dist/img/', $photoUrl);

            $mahasiswa->Foto = $photoUrl;
        }

        $mahasiswa->save();

        return redirect('mahasiswa');

    }
}
