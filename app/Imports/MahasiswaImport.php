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
        return Mahasiswa::updateOrCreate(['nim' => $row['nim']],[
            'nama_mhs' => $row['nama'],
            'angkatan' => $row['angkatan'],
            'status_mhs' => $row['status']
        ]);
    }
}
