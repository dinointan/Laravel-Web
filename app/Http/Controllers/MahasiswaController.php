<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Prodi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = ['nama' => 'Intan', 'foto' => 'E020322098.jpeg'];
        $mahasiswa = Mahasiswa::get();
        return view('mahasiswa.index', compact(['data', 'mahasiswa']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $data = ['nama' => 'Intan', 'foto' => 'E020322098.jpeg'];
        $prodi = Prodi::all();
        return view('mahasiswa.create', compact(['data', 'prodi']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate(
            [
                'nim' => 'required|unique:mahasiswa|max:255',
                'nama' => '',
                'prodi_id' => '',
                'no_hp' => '',
                'alamat' => '',
            ],
            [
                'nim.required' => 'NIM harus diisi',
                'nim.unique' => 'NIM sudah ada',
                'nim.max' => 'NIM maksimal 255 karakter',
            ]
        );
        // if ($request->hasFile('foto')) {
        //     $file = $request->file('foto');
        //     $filename = $validateData['nim'] . '.' . $file->getClientOriginalExtension();
        //     $file->storeAs('public/dist/img', $filename);
        // }
        $validateData['foto'] = $validateData['nim'] . '.jpeg';
        $validateData['password'] = Hash::make($validateData['nim']);
        Mahasiswa::create($validateData);
        return redirect('/mahasiswa');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = ['nama' => 'Intan', 'foto' => 'E020322098.jpeg'];
        $mahasiswa = Mahasiswa::find($id);
        $prodi = Prodi::all();
        return view('mahasiswa.edit', compact(['data', 'mahasiswa', 'prodi']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $ValidateData = $request->validate(
            [
                'nim' => 'required|max:255',
                'nama' => '',
                'prodi_id' => '',
                'no_hp' => '',
                'alamat' => '',
            ],
            [
                'nim.required' => 'NIM harus diisi',
                'nim.unique' => 'NIM sudah ada',
                'nim.max' => 'NIM maksimal 255 karakter',
            ]
        );
        $ValidateData['foto'] = $ValidateData['nim'] . '.jpeg';
        $ValidateData['password'] = Hash::make($ValidateData['nim']);
        Mahasiswa::where('nim', $id)->update($ValidateData);
        return redirect('/mahasiswa');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Mahasiswa::destroy($id);
        return redirect('/mahasiswa');
    }
}
