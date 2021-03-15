<?php

namespace App\Http\Controllers;

use App\Models\Kurikulum;
use Illuminate\Http\Request;

class KurikulumController extends Controller
{

    public function index()
    {
        $matkul = Kurikulum::all();
        return view('kurikulum.index', compact('matkul'));
    }


    public function create()
    {
        return view('kurikulum.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'kode_mk' => ['required'],
            'nama_mk' => ['required'],
            'sks' => ['required', 'numeric'],
            'semester' => ['required'],
            'tahun_kurikulum' => ['required', 'numeric']
        ]);

        Kurikulum::create([
            'kode_mk' => $request->kode_mk,
            'nama_mk' => $request->nama_mk,
            'sks' => $request->sks,
            'semester' => $request->semester,
            'tahun_kurikulum' => $request->tahun_kurikulum,
        ]);

        return redirect('/matkul')->with('notif', 'Mata Kuliah Baru Berhasil Ditambah');
    }


    public function show(Kurikulum $kurikulum)
    {
        //
    }


    public function edit(Kurikulum $kurikulum)
    {
        return view('kurikulum.edit', compact('kurikulum'));
    }


    public function update(Request $request, Kurikulum $kurikulum)
    {
        $request->validate([
            'kode_mk' => ['required'],
            'nama_mk' => ['required'],
            'sks' => ['required', 'numeric'],
            'semester' => ['required'],
            'tahun_kurikulum' => ['required', 'numeric']
        ]);

        Kurikulum::where('id', $kurikulum->id)
                ->update([
                    'kode_mk' => $request->kode_mk,
                    'nama_mk' => $request->nama_mk,
                    'sks' => $request->sks,
                    'semester' => $request->semester,
                    'tahun_kurikulum' => $request->tahun_kurikulum,
                ]);

        return redirect('/matkul')->with('notif', 'Mata Kuliah '. $kurikulum->nama_mk .' Berhasil Diubah');
    }


    public function destroy(Kurikulum $kurikulum)
    {
        Kurikulum::destroy($kurikulum->id);
        return redirect('/matkul')->with('notif', 'Mata Kuliah '. $kurikulum->nama_mk .' Berhasil Dihapus.');
    }
}
