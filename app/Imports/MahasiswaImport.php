<?php

namespace App\Imports;

use App\Models\Mahasiswa;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class MahasiswaImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {

        return new Mahasiswa([
            'nim' => trim($row['nim']),
            'nama' => trim($row['nama']), 
            'jenis_kelamin' => trim($row['jenis_kelamin']),
            'jurusan' => trim($row['jurusan']),
            'angkatan' => trim($row['angkatan']),
        ]);
    }
}
