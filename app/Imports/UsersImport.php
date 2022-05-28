<?php

namespace App\Imports;

use App\Models\GiangVien;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UsersImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new GiangVien([
            'user_id' => $row['user_id'],
            'name'     => $row['name'],
            'email'    => $row['email'],
            'password' => \Hash::make($row['password']),
            'connho'  => $row['connho'] == 'Có' ? 1 : 0,
            'ngaysinh' => date('Y-m-d', strtotime($row['ngaysinh'])),
            'diachi'   => $row['diachi'],
            'sodienthoai' => $row['sodienthoai'],
            'avatar'   => $row['avatar'],
            'bomon_id' => $row['bomon_id'],
            'role_id'  => $row['role_id'] == 'admin' ? 1 : ($row['role_id'] == 'thukykhoa' ? 2 : 3)
        ]);
    }
}
