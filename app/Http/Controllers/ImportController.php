<?php

namespace App\Http\Controllers;

use App\Imports\ZipCodesImport;
use Illuminate\Support\Facades\Log;

class ImportController extends Controller
{
    //Here we import the Excel data
    public function import()
    {
        try {
            //Here we select the file to import
           $res =  (new ZipCodesImport)->import('CPdescarga.xls');
             Log::info('File imported successfully!');
             return 'File imported successfully!';

        } catch (\Exception $e) {
            Log::error($e);
            return $e;
        }
    }
}
