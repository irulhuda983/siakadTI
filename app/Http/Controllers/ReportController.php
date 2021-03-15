<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Mahasiswa;
use App\Models\Kurikulum;
use App\Exports\KhsExport;
use Maatwebsite\Excel\Facades\Excel;
use PDF;


class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nim = Kurikulum::join('tb_mahasiswa', 'tb_kurikulum.nim', '=', 'tb_mahasiswa.nim')
                        ->select('tb_kurikulum.nim', 'tb_mahasiswa.nama')->distinct()->get();
        // $nim = Kurikulum::select('nim')->distinct()->get();
        $semester = Kurikulum::leftjoin('tb_matakuliah', 'tb_kurikulum.kode_mk', '=', 'tb_matakuliah.kode_mk')
                            ->select('tb_matakuliah.semester')
                            ->distinct()
                            ->orderBy('tb_matakuliah.semester', 'ASC')
                            ->get();
        // $periode = Kurikulum::select('periode')->distinct()->get();
        return view('report.index', compact('nim', 'semester'));
    }

    public function exportKhs(Request $request) 
    {
        // return Excel::download(new KhsExport($request->nim, $request->semester, $request->periode), 'khs.xlsx');
        return Excel::download(new KhsExport($request->nim, $request->semester), 'khs.xlsx');
    }


    public function PdfKhs(Request $request)
    {
        $data = Kurikulum::khs($request->nim, $request->semester);

        $khs = $data['khs'];
        $total = $data['total'];
        $totalSks = $data['totalSks'];
        $mahasiswa = $data['mahasiswa'];
        $ipk_sementara = $data['ipk_sementara'];
 
        $pdf = PDF::loadview('pdf.khs', compact('khs', 'total', 'totalSks', 'mahasiswa', 'ipk_sementara'))->setPaper('a4', 'landscape');
        return $pdf->download('khs-mahasiswa.pdf');
    }


    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }


    public function tampilNilai(Request $request)
    {
        $request->validate([
            'nim' => ['required'],
            'semester' => ['required']
        ]);

        $data = Kurikulum::khs($request->nim, $request->semester);

        $khs = $data['khs'];
        $total = $data['total'];
        $totalSks = $data['totalSks'];
        $mahasiswa = $data['mahasiswa'];
        $ipk_sementara = $data['ipk_sementara'];

        if($khs->isEmpty()){
            return redirect('/report')->with('notif', 'KHS Mahasiswa Pada Semester Terpilih Belum Tersedia.');
        }else{
            return view('report.khs', compact('khs', 'total', 'totalSks', 'mahasiswa', 'ipk_sementara'));
        }

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
