<?php

namespace App\Http\Controllers;

use App\Models\ZipCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class MainController extends Controller
{
    /**
     * This is the main function to get the data from a given zip code
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getZipCode(Request $request)
    {
        try {
            //Variables
            $settlements = collect();

            //Validating the zipcode
            Validator::make(
                ['code' => $request->code],
                ['code' => 'required|numeric|integer|min:1000'],
            )->validate();

            //Getting the data from DB.
            $zipCodes = ZipCode::where('zip_code', $request->code)
                ->get();

            $federal_entity = collect([
                'key' => $zipCodes->first()->fe_key,
                'name' => strtoupper($zipCodes->first()->fe_name),
                'code' => $zipCodes->first()->fe_code
            ]);

            $municipality = collect([
                'key' => $zipCodes->first()->municipality_key,
                'name' => strtoupper($zipCodes->first()->municipality_name)
            ]);

            foreach ($zipCodes as $zipCode) {
                $settlement = ['key' => $zipCode->settlement_key,
                    'name' => strtoupper($zipCode->settlement_name),
                    'zone_type' => strtoupper($zipCode->settlement_zone_type),
                    'settlement_type' => ['name' => $zipCode->settlement_type_name
                    ]];
                $settlements->add($settlement);
            }

            //Response the data mapped and serialized to JSON.
            return response()->json([
                'zip_code' => $zipCodes->first()->zip_code,
                'locality' => strtoupper($zipCodes->first()->locality),
                'federal_entity' => $federal_entity,
                'settlements' => $settlements,
                'municipality' => $municipality
            ],200) ;

        } catch (\Exception $exception) {
            return response()->json([
                'Error Message' => $exception->getMessage()
            ],500) ;
        }
    }
}
