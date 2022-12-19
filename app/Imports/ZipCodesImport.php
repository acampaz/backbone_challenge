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
            'zip_code'=> $this->quit_tildes($row['d_codigo'] ?? null),
            'locality'=> $this->quit_tildes($row['d_ciudad'] ?? null),
            'fe_key'=> $this->quit_tildes($row['c_estado'] ?? null),
            'fe_name'=> $this->quit_tildes($row['d_estado'] ?? null),
            'fe_code'=> $this->quit_tildes($row['c_CP'] ?? null),
            'settlement_key'=> $this->quit_tildes($row['id_asenta_cpcons'] ?? null),
            'settlement_name'=> $this->quit_tildes($row['d_asenta'] ?? null),
            'settlement_zone_type'=> $this->quit_tildes($row['d_zona'] ?? null),
            'settlement_type_name'=> $this->quit_tildes($row['d_tipo_asenta'] ?? null),
            'municipality_key'=> $this->quit_tildes($row['c_mnpio'] ?? null),
            'municipality_name'=> $this->quit_tildes($row['d_mnpio'] ?? null)
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

    function quit_tildes($cadena){

        if ($cadena != null) {
            //Here we replace the letters
            $cadena = str_replace(array('á', 'à', 'ä', 'â', 'ª', 'Á', 'À', 'Â', 'Ä'), array('a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A'), $cadena);

            $cadena = str_replace(array('é', 'è', 'ë', 'ê', 'É', 'È', 'Ê', 'Ë'), array('e', 'e', 'e', 'e', 'E', 'E', 'E', 'E'), $cadena);

            $cadena = str_replace(array('í', 'ì', 'ï', 'î', 'Í', 'Ì', 'Ï', 'Î'), array('i', 'i', 'i', 'i', 'I', 'I', 'I', 'I'), $cadena);

            $cadena = str_replace(array('ó', 'ò', 'ö', 'ô', 'Ó', 'Ò', 'Ö', 'Ô'), array('o', 'o', 'o', 'o', 'O', 'O', 'O', 'O'), $cadena);

            $cadena = str_replace(array('ú', 'ù', 'ü', 'û', 'Ú', 'Ù', 'Û', 'Ü'), array('u', 'u', 'u', 'u', 'U', 'U', 'U', 'U'), $cadena);

            $cadena = str_replace(array('ñ', 'Ñ', 'ç', 'Ç'), array('n', 'N', 'c', 'C'), $cadena);

            return $cadena;
        }else {
            return null;
        }
    }
}
