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
            'zip_code'=> isset($row['d_codigo']) ? $row['d_codigo'] : 'null',
            'locality'=> isset($row['d_ciudad']) ? $row['d_ciudad'] : 'null',
            'fe_key'=> isset($row['c_estado']) ? $row['c_estado'] : 'null',
            'fe_name'=> isset($row['d_estado']) ? $row['d_estado'] : 'null',
            'fe_code'=> isset($row['c_CP']) ? $row['c_CP'] : 'null',
            'settlement_key'=> isset($row['id_asenta_cpcons']) ? $row['id_asenta_cpcons'] : 'null',
            'settlement_name'=> isset($row['d_asenta']) ? $row['d_asenta'] : 'null',
            'settlement_zone_type'=> isset($row['d_zona']) ? $row['d_zona'] : 'null',
            'settlement_type_name'=> isset($row['d_tipo_asenta']) ? $row['d_tipo_asenta'] : 'null',
            'municipality_key'=> isset($row['c_mnpio']) ? $row['c_mnpio'] : 'null',
            'municipality_name'=> isset($row['d_mnpio']) ? $row['d_mnpio'] : 'null'
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
