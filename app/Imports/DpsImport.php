<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\DpsList;
use Maatwebsite\Excel\Concerns\ToModel;

class DpsImport implements ToModel
{
    /**
    * @param Collection $collection
    */
    public function model(array $row)
    {
        return new DpsList([
            /*
            'title' => $row[0],
            'slug' => str_slug($row[0]),
            'description' => $row[1],
            'price' => $row[2],
            'stock' => $row[3]
            */
            'nkk' => $row[0],
            'nik' => $row[1],
            'nama' => $row[2],
            'tempat_lahir'=> $row[3],
            'tgl_lahir' => $row[4],
            'kawin' => $row[5],
            'jenis_kelamin' => $row[6],
            'alamat' => $row[7],
            'rt' => $row[8],
            'rw' => $row[9],
            'difabel' => $row[10],
            'sumberdata' => $row[11],
            'tps' => $row[12]
        ]);
    }
}
