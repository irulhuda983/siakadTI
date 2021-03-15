<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Eloquent\Model;

class Kurikulum extends Model
{
    protected $table = 'tb_kurikulum';

    protected $guarded = [];


    public static function khs($nim, $semester)
    {
        $mahasiswa = Mahasiswa::leftjoin('tb_kurikulum', 'tb_mahasiswa.nim', '=', 'tb_kurikulum.nim')
        ->leftjoin('tb_matakuliah', 'tb_kurikulum.kode_mk', '=', 'tb_matakuliah.kode_mk')
        ->select('tb_mahasiswa.*', 'tb_matakuliah.semester', 'tb_kurikulum.periode')
        ->where([
            'tb_mahasiswa.nim' => $nim,
            'semester' => $semester,
            // 'periode' => $periode,
        ])
        ->first();


        $khs = Kurikulum::leftjoin('tb_matakuliah', 'tb_kurikulum.kode_mk', '=', 'tb_matakuliah.kode_mk')
        ->leftjoin('tb_mahasiswa', 'tb_kurikulum.nim', '=', 'tb_mahasiswa.nim')
        ->select('tb_kurikulum.*', 'tb_matakuliah.nama_mk', 'tb_matakuliah.sks', 'tb_matakuliah.semester', 'tb_mahasiswa.nama')
        ->where([
            'tb_kurikulum.nim' => $nim,
            'semester' => $semester,
            // 'periode' => $periode,
        ])
        ->get();
        $totalSks = $total = Kurikulum::leftjoin('tb_matakuliah', 'tb_kurikulum.kode_mk', '=', 'tb_matakuliah.kode_mk')
                        ->select(DB::Raw('sum(sks) as jumlah'))
                        ->where([
                            'nim' => $nim,
                            'semester' => $semester,
                            // 'periode' => $periode,
                        ])
                        ->first();

        $total = Kurikulum::leftjoin('tb_matakuliah', 'tb_kurikulum.kode_mk', '=', 'tb_matakuliah.kode_mk')
            ->select(DB::Raw('sum(tb_kurikulum.nilai_setara * sks) as jumlah'))
            ->where([
                'nim' => $nim,
                'semester' => $semester,
                // 'periode' => $periode,
            ])
            ->first();


        $ipk = Kurikulum::leftjoin('tb_matakuliah', 'tb_kurikulum.kode_mk', '=', 'tb_matakuliah.kode_mk')
        ->select('tb_kurikulum.nilai_setara', 'tb_matakuliah.sks', 'tb_matakuliah.nama_mk')
        ->where('nim', $nim)
        ->get();


        $sks = [];
        $nsks = [];

        foreach ($ipk as $nilai) {
        $sks[] = $nilai->sks;
        $nsks[] = $nilai->nilai_setara * $nilai->sks;
        }

        $jum_sks = array_sum($sks);
        $jum_nsks = array_sum($nsks);
        $ipk_sementara = (int) $jum_nsks / (int) $jum_sks;

        return [
            'mahasiswa' => $mahasiswa,
            'khs' => $khs,
            'totalSks' => $totalSks,
            'total' => $total,
            'ipk' => $ipk,
            'ipk_sementara' => $ipk_sementara,
        ];
    }
}
