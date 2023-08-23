<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleModel extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function brand(){
        return $this->belongsTo(VehicleBrand::class,'vehicle_brand_id','id');
    }
}
