<?php

namespace App\Imports;

use App\Models\Kurikulum;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class NilaiImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {

        return new Kurikulum([
            'kode_mk' => trim($row['kode_mk']),
            'nim' => trim($row['nim']), 
            'periode' => trim($row['periode']),
            'nama_kelas' => trim($row['nama_kelas']),
            'nilai_angka' => trim($row['nilai_angka']),
            'nilai_setara' => trim($row['nilai_setara']),
            'nilai_huruf' => trim($row['nilai_huruf']),
            'dosen_pengampu' => trim($row['dosen_pengampu']),
        ]);
    }
}
