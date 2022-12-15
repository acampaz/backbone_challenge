<?php

namespace App\Http\Controllers;

use App\Models\ZipCode;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use mysql_xdevapi\Collection;

class MainController extends Controller
{

    public function getZipCode(Request $request){

        $zipCodes = ZipCode::where('zip_code', $request->code)
            ->get();

        $federal_entity = collect(['key' => $zipCodes->first()->fe_key, 'name' => $zipCodes->first()->fe_name,
            'code' => $zipCodes->first()->fe_code]);

        $municipality = collect(['key' => $zipCodes->first()->municipality_key, 'name' => $zipCodes->first()->municipality_name]);

        $settlements = collect();

        foreach ($zipCodes as $zipCode){

            $settlement = ['key' => $zipCode->settlement_key, 'name' => $zipCode->settlement_name,
                'zone_type' => $zipCode->settlement_zone_type,
                'settlement_type' => ['name' => $zipCode->settlement_type_name]];

            $settlements->add($settlement);
        }

        //Response
        return response()->json([
            'zip_code' => $zipCodes->first()->zip_code,
            'locality' => $zipCodes->first()->locality,
            'federal_entity' => $federal_entity,
            'settlements' => $settlements,
            'municipality' => $municipality
        ],200) ;;
    }
}
