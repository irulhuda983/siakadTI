<?php

namespace App\Http\Controllers;

use App\Models\MataKuliah;
use Illuminate\Http\Request;
use App\Imports\MatkulImport;
use Maatwebsite\Excel\Facades\Excel;

class MataKuliahController extends Controller
{

    public function index()
    {
        $matkul = MataKuliah::simplePaginate(10);
        return view('matkul.index', compact('matkul'));
    }


    public function create()
    {
        return view('matkul.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'kode_mk' => ['required', 'unique:tb_matakuliah'],
            'nama_mk' => ['required'],
            'jenis_mk' => ['required'],
            'sks' => ['required', 'numeric'],
            'semester' => ['required'],
        ]);

        MataKuliah::create([
            'kode_mk' => $request->kode_mk,
            'nama_mk' => $request->nama_mk,
            'jenis_mk' => $request->jenis_mk,
            'sks' => $request->sks,
            'semester' => $request->semester,
        ]);

        return redirect('/matkul')->with('notif', 'Mata Kuliah Baru Berhasil Ditambah');
    }


    public function upload(Request $request)
    {
        $file = $request->file('file');
        Excel::import(new MatkulImport, $file);
        
        return redirect('/matkul')->with('notif', 'Berhasil Upload File!');
    }


    public function edit(MataKuliah $mataKuliah)
    {
        return view('matkul.edit', compact('mataKuliah'));
    }


    public function update(Request $request, MataKuliah $mataKuliah)
    {
        $request->validate([
            'kode_mk' => ['required'],
            'nama_mk' => ['required'],
            'jenis_mk' => ['required'],
            'sks' => ['required', 'numeric'],
            'semester' => ['required'],
        ]);

        MataKuliah::where('id', $mataKuliah->id)
                    ->update([
                        'kode_mk' => $request->kode_mk,
                        'nama_mk' => $request->nama_mk,
                        'jenis_mk' => $request->jenis_mk,
                        'sks' => $request->sks,
                        'semester' => $request->semester,
                    ]);

        return redirect('/matkul')->with('notif', 'Mata Kuliah '.$matakuliah->nama_mk.' Berhasil Diubah');
    }


    public function destroy(MataKuliah $mataKuliah)
    {
        MataKuliah::destroy($mataKuliah->id);
        return redirect('/matkul')->with('notif', 'Mata Kuliah '. $mataKuliah->nama_mk .' Berhasil Dihapus.');
    }
}
