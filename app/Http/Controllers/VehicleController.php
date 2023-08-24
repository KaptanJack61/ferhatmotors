<?php

namespace App\Http\Controllers;

use App\Models\VehicleBrand;
use App\Models\VehicleModel;
use App\Models\VehicleType;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function getBrands($id) {

        $vehicle_type = VehicleType::find($id);

        return $vehicle_type->brands;
    }

    public function getModels($id) {

        $vehicle_brand = VehicleBrand::find($id);

        return $vehicle_brand->models;
    }
}
