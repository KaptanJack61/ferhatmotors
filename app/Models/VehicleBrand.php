<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleBrand extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function models(){
        return $this->hasMany(VehicleModel::class);
    }
    public function type(){
        return $this->belongsTo(VehicleType::class,'vehicle_type_id','id');
    }
}
