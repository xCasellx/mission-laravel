<?php

namespace App\Http\Controllers\Location;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Region;

class RegionController extends Controller
{
    public function index($id)
    {
        $region = Region::where("country_id", $id)->get();
        return response()->json($region);
    }
}
