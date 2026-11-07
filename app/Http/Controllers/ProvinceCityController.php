<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\province_cities;

class ProvinceCityController extends Controller
{
    public function city(Request $request){
        $city = province_cities::where('parent', $request->id)->get();
        return response()->json($city);
    }
}
