<?php

namespace App\Imports;

use App\Models\MataKuliah;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class MatkulImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {

        return new MataKuliah([
            'kode_mk' => trim($row['kode_mk']),
            'nama_mk' => trim($row['nama_mk']),
            'kode_dosen' => 'dsn-105',
            'jenis_mk' => trim($row['jenis_mk']),
            'sks' => trim($row['sks']),
            'semester' => trim($row['semester']),
        ]);
    }
}
