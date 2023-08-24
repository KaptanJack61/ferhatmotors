<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advert extends Model
{
    use HasFactory;

    public function type(){
        return $this->belongsTo(VehicleType::class,'vehicle_type_id','id');
    }

    public function brand(){
        return $this->belongsTo(VehicleBrand::class,'vehicle_brand_id','id');
    }

    public function model(){
        return $this->belongsTo(VehicleModel::class,'vehicle_model_id','id');
    }

    public function gear(){
        return $this->belongsTo(Gear::class,'gear_id','id');
    }

    public function fuel(){
        return $this->belongsTo(Fuel::class,'fuel_id','id');
    }

    public function color(){
        return $this->belongsTo(Color::class,'color_id','id');
    }

    public function caseType(){
        return $this->belongsTo(CaseType::class,'case_type_id','id');
    }

    public function saleType(){
        return $this->belongsTo(SaleType::class,'sale_type_id','id');
    }

    public function status(){
        return $this->belongsTo(Status::class,'status_id','id');
    }


    public function Owner(){
        return $this->hasOne(User::class, 'id', 'owner_id');
    }

    public function Creator(){
        return $this->hasOne(User::class, 'id', 'user');
    }

    public function Seller(){
        return $this->hasOne(User::class, 'id', 'seller');
    }

    public function Photos(){
        return $this->hasMany(AdvertPhoto::class, 'advert', 'id');
    }

    public function Note(){
        return $this->hasMany(AdvertNote::class, 'advert', 'id')->orderBy('id', 'desc');
    }

    public function Expense(){
        return $this->hasMany(Expense::class, 'advert', 'id')->orderBy('id','desc');
    }
}
