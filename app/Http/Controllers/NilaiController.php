<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kurikulum;
use App\Models\Mahasiswa;
use App\Models\MataKuliah;
use App\Imports\NilaiImport;
use Maatwebsite\Excel\Facades\Excel;

class NilaiController extends Controller
{

    public function index()
    {
        $nilai = Kurikulum::join('tb_mahasiswa', 'tb_kurikulum.nim', '=', 'tb_mahasiswa.nim')
                            ->join('tb_matakuliah', 'tb_kurikulum.kode_mk', '=', 'tb_matakuliah.kode_mk')
                            ->select('tb_kurikulum.*', 'tb_mahasiswa.nama', 'tb_matakuliah.nama_mk')
                            ->paginate(10);
        return view('nilai.index', compact('nilai'));
    }


    public function create()
    {
        $mahasiswa = Mahasiswa::all();
        $matkul = MataKuliah::all();
        return view('nilai.create', compact('mahasiswa', 'matkul'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'periode' => ['required', 'numeric'],
            'dosen' => ['required'],
            'nilai_angka' => ['required'],
            'nilai_setara' => ['required'],
            'nilai_huruf' => ['required']
        ]);


        Kurikulum::create([
            'nim' => $request->nim,
            'kode_mk' => $request->kode_mk,
            'nama_kelas' => $request->nama_kelas,
            'periode' => $request->periode,
            'nilai_angka' => $request->nilai_angka,
            'nilai_setara' => $request->nilai_setara,
            'nilai_huruf' => $request->nilai_huruf,
            'dosen_pengampu' => $request->dosen,
        ]);

        return redirect('/nilai')->with('notif', 'Nilai Berhasil Disimpan');
    }

    public function upload(Request $request)
    {
        $file = $request->file('file');
        Excel::import(new NilaiImport, $file);
        
        return redirect('/nilai')->with('notif', 'Berhasil Upload File!');
    }

    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
