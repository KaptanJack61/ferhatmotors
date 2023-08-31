<?php

namespace App\Http\Controllers;

use App\Models\VehicleBrand;
use App\Models\VehicleModel;
use App\Models\VehicleType;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function getBrands(Request $request) {

        $vehicle_type = VehicleType::find($request->id);

        return $vehicle_type->brands;
    }

    public function getModels(Request $request) {

        $vehicle_brand = VehicleBrand::find($request->id);

        return $vehicle_brand->models;
    }
}
