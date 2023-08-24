<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleType extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function brands(){
        return $this->hasMany(VehicleBrand::class,'vehicle_type_id','id');
    }
}
