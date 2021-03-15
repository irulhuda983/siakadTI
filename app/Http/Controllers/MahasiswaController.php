<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use App\Imports\MahasiswaImport;
use Maatwebsite\Excel\Facades\Excel;

class MahasiswaController extends Controller
{

    public function index()
    {
        $mahasiswa = Mahasiswa::simplePaginate(10);
        return view('mahasiswa.index', compact('mahasiswa'));
    }


    public function create()
    {
        return view('mahasiswa.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'nim' => ['required', 'numeric', 'unique:tb_mahasiswa'],
            'nama' => ['required'],
            'jenis_kelamin' => ['required'],
            'angkatan' => ['required']
        ]);

        Mahasiswa::create([
            'nim' => $request->nim,
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'jurusan' => $request->jurusan,
            'angkatan' => $request->angkatan,
        ]);

        return redirect('/mahasiswa')->with('notif', 'Mahasiswa Berhasil Ditambah');
    }

    public function upload(Request $request)
    {
        $file = $request->file('file');
        Excel::import(new MahasiswaImport, $file);
        
        return redirect('/mahasiswa')->with('notif', 'Berhasil Upload File!');
    }


    public function edit(Mahasiswa $mahasiswa)
    {
        return view('mahasiswa.edit', compact('mahasiswa'));
    }


    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        $request->validate([
            'nim' => ['required', 'numeric'],
            'nama' => ['required'],
            'jenis_kelamin' => ['required'],
            'angkatan' => ['required']
        ]);

        Mahasiswa::where('id', $mahasiswa->id)
                ->update([
                    'nim' => $request->nim,
                    'nama' => $request->nama,
                    'jenis_kelamin' => $request->jenis_kelamin,
                    'jurusan' => $request->jurusan,
                    'angkatan' => $request->angkatan,
                ]);

        return redirect('/mahasiswa')->with('notif', 'Mahasiswa Berhasil Diubah');
    }

    public function destroy(Mahasiswa $mahasiswa)
    {
        Mahasiswa::destroy($mahasiswa->id);

        return redirect('/mahasiswa')->with('notif', 'Mahasiswa Berhasil Dihapus.');
    }
}
