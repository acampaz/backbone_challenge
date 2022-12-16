<?php

namespace App\Imports;

use App\Models\ZipCode;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ZipCodesImport implements ToModel, WithHeadingRow, WithBatchInserts, WithChunkReading
{
    use Importable;

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new ZipCode([
            //Maping the data to import
            'zip_code'=> $row['d_codigo'] ?? 'null',
            'locality'=> $row['d_ciudad'] ?? 'null',
            'fe_key'=> $row['c_estado'] ?? 'null',
            'fe_name'=> $row['d_estado'] ?? 'null',
            'fe_code'=> $row['c_CP'] ?? 'null',
            'settlement_key'=> $row['id_asenta_cpcons'] ?? 'null',
            'settlement_name'=> $row['d_asenta'] ?? 'null',
            'settlement_zone_type'=> $row['d_zona'] ?? 'null',
            'settlement_type_name'=> $row['d_tipo_asenta'] ?? 'null',
            'municipality_key'=> $row['c_mnpio'] ?? 'null',
            'municipality_name'=> $row['d_mnpio'] ?? 'null'
        ]);
    }

    public function batchSize(): int
    {
        return 10000;
    }
    public function chunkSize(): int
    {
        return 1000;
    }
}
