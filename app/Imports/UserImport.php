<?php

namespace App\Imports;

use App\User;
use App\Role;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Hash;

class UserImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $data = new User([
            'name' => $row['username'],
            'nim' => $row['nim'],
            'email' => $row['email'],
            'password' => Hash::make($row['password']),
        ]);
        $data->save();
        $role = Role::select('id')->where('name','Mahasiswa')->first();
        $data->roles()->attach($role);
        return $data;
    }
}
