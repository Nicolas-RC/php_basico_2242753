<?php

namespace App\Imports;

use App\MediaType;
use Maatwebsite\Excel\Concerns\{ToModel, WithHeadingRow};

class MediaTypeImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new MediaType([
            'Name' => $row["name"],
            'MediaTypeId' => $row["id"]
        ]);
    }
}
