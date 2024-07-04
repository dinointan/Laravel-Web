<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use App\Models\Prodi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

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
        // Proses upload foto
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = $validateData['nim'] . '.' . $file->getClientOriginalExtension();
            $destinationPath = public_path('/dist/img');
            $file->move($destinationPath, $filename);
            $validateData['foto'] = $validateData['nim'] . '.' . $file->getClientOriginalExtension();
        }
        $validateData['password'] = Hash::make($validateData['nim']);
        Mahasiswa::create($validateData);
        flash()->success('Data Berhasil Ditambahkan');
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
            ],
            [
                'nama_required' => 'Nama harus diisi',
                'prodi_id_required' => 'Prodi harus diisi',
                'no_hp_required' => 'No HP harus diisi',
                'alamat_required' => 'Alamat harus diisi',
                'foto.image' => 'Tolong upload file foto',
                'foto.max' => 'ukuran foto maksimal 2'
            ]
        );

        $mahasiswa = Mahasiswa::find($id);
        // Proses upload foto jika ada file foto baru
        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($mahasiswa->foto) {
                Storage::delete('public/dist/img/' . $mahasiswa->foto);
            }
            $ValidateData['foto'] = $request->file('foto')->store('img');
        }
        Mahasiswa::where('nim', $id)->update($ValidateData);
        flash()->success('Data Berhasil Diedit');
        // Simpan foto baru
        //     $file = $request->file('foto');
        //     $filename = $ValidateData['nim'] . '.' . $file->getClientOriginalExtension();
        //     $destinationPath = public_path('/dist/img');
        //     $file->move($destinationPath, $filename);
        //     $ValidateData['foto'] = $filename;
        // }
        return redirect('/mahasiswa');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $mahasiswa =
            Mahasiswa::destroy($id);
        flash()->success("Data Berhasil Dihapus");
        return redirect('/mahasiswa');
    }
}
