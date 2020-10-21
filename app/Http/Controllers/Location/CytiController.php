<?php

namespace App\Http\Controllers\Location;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\City;

class CytiController extends Controller
{
    public function index($id)
    {
        $city = City::where("region_id", $id)->get();
        return response()->json( $city);
    }

    public function getFullLocation($id)
    {
        $city = City::select("cities.name as city", "regions.name as region" ,"countries.name as country")
            ->join("regions" , 'cities.region_id', "=" , "regions.id")
            ->join("countries" , 'regions.country_id', "=" , "countries.id")
            ->where("cities.id", $id)
            ->get();
        return response()->json( $city);
    }
}
