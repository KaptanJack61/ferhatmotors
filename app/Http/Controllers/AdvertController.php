<?php

namespace App\Http\Controllers;

use App\Models\Advert;
use App\Models\AdvertNote;
use App\Models\AdvertPhoto;
use App\Models\CaseType;
use App\Models\Color;
use App\Models\Expense;
use App\Models\Fuel;
use App\Models\Gear;
use App\Models\SaleType;
use App\Models\Status;
use App\Models\User;
use App\Models\VehicleBrand;
use App\Models\VehicleModel;
use App\Models\VehicleType;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Auth;

class AdvertController extends Controller
{

    protected $response = ["type" => "warning", "message" => null, "status" => false];
    public function new(){

        $vehicle_types = VehicleType::all();
        $vehicle_brands = VehicleBrand::all();
        $vehicle_models = VehicleModel::all();
        $gears = Gear::all();
        $fuels = Fuel::all();
        $colors = Color::all();
        $case_types = CaseType::all();
        $sale_types = SaleType::all();
        $statuses = Status::all();

        return view('layout.advert.new', [
            'users' => User::all(),
            'vehicleTypes' => $vehicle_types,
            'vehicleBrands' => $vehicle_brands,
            'vehicleModels' => $vehicle_models,
            'gears' => $gears,
            'colors' => $colors,
            'fuels' => $fuels,
            'case_types' => $case_types,
            'sale_types' => $sale_types,
            'statuses' => $statuses

        ]);
    }

    public function save(Request $request){
        if(empty($request->brand) || empty($request->model) || empty($request->km) || empty($request->year) || $request->sales_type == 0|| $request->owner == 0 || empty($request->buy_price)){
            $this->response["message"] = "Yıldız (*) ile işaretlenen alanlar zorunludur.";

        }else{
            $adv = new Advert;
            $adv->vehicle_type_id = trim(ucfirst($request->type));
            $adv->vehicle_brand_id = trim(ucfirst($request->brand));
            $adv->vehicle_model_id = trim(ucfirst($request->model));
            $adv->package = trim(ucfirst($request->package)) ?? null;
            $adv->motor = trim(ucfirst($request->motor)) ?? null;
            $adv->km = trim(ucfirst($request->km)) ?? null;
            $adv->year = trim(ucfirst($request->year)) ?? null;
            $adv->gear_id = $request->gear;
            $adv->fuel_id = $request->fuel;
            $adv->color_id = $request->color;
            $adv->case_type_id = $request->case;
            $adv->sale_type_id = trim(ucfirst($request->sales_type));
            $adv->owner_id = trim(ucfirst($request->owner));
            $adv->sahibinden_url = trim(ucfirst($request->sahibinden)) ?? null;
            $adv->arabam_url = trim(ucfirst($request->arabam)) ?? null;
            $adv->status_id = $request->status;
            $adv->buy_price = getCurrencyToNumber($request->buy_price);
            $adv->sell_price = getCurrencyToNumber($request->sell_price);
            if ($request->buy_date)
                $adv->buy_date = Carbon::parse($request->buy_date)->format('Y-m-d H:i:s');
            if ($request->damage)
                $adv->damage = getCurrencyToNumber($request->damage);
            $adv->profit = $request->profit;

            $adv->description = $request->description;

            if($adv->save()){
                if(!empty($request->photodata)){
                    $photodata = explode(',', $request->photodata);
                    for ($i=0; $i < count($photodata); $i++) {
                        $pic = new AdvertPhoto;
                        $pic->advert = $adv->id;
                        $pic->file = $photodata[$i];
                        $pic->save();
                    }
                }
                $this->response["type"] = "success";
                $this->response["message"] = "İlan oluşturuldu";
                $this->response["link"] = route('advert-detail',$adv->id);
                $this->response["status"] = true;
            }else{
                $this->response["type"] = "error";
                $this->response["message"] = "SYSTEM_ERROR";
            }

        }

        return $this->response;
    }

    public function all(){
        return view('layout.advert.all', [
                'adverts' => Advert::all(),
                'statuses' => Status::all()
            ]);
    }

    public function sold(){
        return view('layout.advert.sold', ['adverts' => Advert::all(), 'statuses' => Status::all()]);
    }

    public function on_sale(){

        return view('layout.advert.onSale', [
            'adverts' => Advert::all(),
            'statuses' => Status::all()
        ]);
    }

    public function change_status(Request $request){

        if($request->id && $request->status){
            $advert = Advert::find($request->id);
            if($advert){
                $advert->status_id = $request->status;
                if (!$advert->status->sold){
                    $advert->sold_price = null;
                    $advert->sold_date = null;
                }

                if($advert->save()){
                    $this->response["type"] = "success";
                    $this->response["message"] = "Durum Güncellendi!";
                    $this->response["status"] = true;
                }else{
                    $this->response["message"] = "Durum güncellenirken bir hata oluştu!";
                }
            }
        }

        return $this->response;
    }

    public function add_note(Request $request){

        if($request->id){
            if(empty($request->note)){
                $this->response["message"] = "Notunuzu girin...";
            }else{
                $advert = Advert::find($request->id);
                if($advert){
                    $note = new AdvertNote;
                    $note->advert = $request->id;
                    $note->user = Auth::user()->id;
                    $note->note = trim(ucfirst($request->note));

                    if($note->save()){
                        $this->response["type"] = "success";
                        $this->response["message"] = "Not eklendi";
                        $this->response["status"] = true;
                    }else{
                        $this->response["message"] = "Not eklenirken bir hata oluştu!";
                    }
                }
            }
        }

        return $this->response;
    }

    public function sell(Request $request){

        if($request->id){
            $advert = Advert::find($request->id);
            $status = Status::where('sold',true)->get();
            if($advert){
                if(empty($request->amount)){
                    $this->response["message"] = "Tutar girin...";
                }else{
                    $advert->sold_price = getCurrencyToNumber($request->amount);
                    $advert->sold_date  = date('Y-m-d');
                    $advert->status_id = $status[0]->id;

                    if($advert->save()){
                        $this->response["type"] = "success";
                        $this->response["message"] = "Araç Satıldı!";
                        $this->response["status"] = true;
                    }else{
                        $this->response["message"] = "Araç satılırken bir hata oluştu!";
                    }
                }
            }
        }

        return $this->response;
    }

    public function detail($id){
        $advert = Advert::find($id);
        $totalExpense = Expense::where('advert_id', $id)->sum('amount');
        $statuses = Status::all();
        if($advert->profit < 100){
            $profit = '%'.$advert->profit;
        }else{
            $profit = '₺'.$advert->profit;
        }
        return view('layout.advert.detail', ['advert' => $advert, 'profit' => $profit, 'totalExpense' => $totalExpense, 'statuses' => $statuses]);
    }

    public function add_expense(Request $request){

        if($request->id){
            $advert = Advert::find($request->id);
            if($advert){
                if(empty($request->type) || empty($request->amount)){
                    $this->response["message"] = "Boş alan bırakmayın!";
                }else{
                    $exp = new Expense;
                    $exp->advert_id = $request->id;
                    $exp->user_id = Auth::user()->id;
                    $exp->type = trim(ucfirst($request->type));
                    $exp->amount = getCurrencyToNumber($request->amount);
                    if($exp->save()){
                        $this->response["type"] = "success";
                        $this->response["message"] = "Harcama eklendi.";
                        $this->response["status"] = true;
                    }else{
                        $this->response["message"] = "Harcama eklenirken bir hata oluştu!";
                    }
                }
            }
        }

        return $this->response;
    }

    public function delete(Request $request){
        if($request->id){
            $find = Advert::find($request->id);
            if($find){
                // AdvertNote modelindeki ilgili satırları sil
                AdvertNote::where('advert', $find->id)->delete();

                // AdvertPhoto modelindeki ilgili satırları sil
                AdvertPhoto::where('advert', $find->id)->delete();

                if($find->delete()){
                    return response(["title" => "Başarılı!", "message" => "İlan başarıyla silindi!", "type" => "success", "status" => true]);
                }else{
                    return response(["title" => "Hata!", "message" => "İlan silinirken bir hata oluştu!", "type" => "error"]);
                }
            }else{
                return response(["title" => "Hata!", "message" => "İlan bulunamadı!", "type" => "error"]);
            }
        }
    }

    public function edit($id){

        $vehicle_types = VehicleType::all();
        $vehicle_brands = VehicleBrand::all();
        $vehicle_models = VehicleModel::all();
        $gears = Gear::all();
        $fuels = Fuel::all();
        $colors = Color::all();
        $case_types = CaseType::all();
        $sale_types = SaleType::all();
        $statuses = Status::all();

        return view('layout.advert.edit', [
            'users' => User::all(),
            'vehicleTypes' => $vehicle_types,
            'vehicleBrands' => $vehicle_brands,
            'vehicleModels' => $vehicle_models,
            'gears' => $gears,
            'colors' => $colors,
            'fuels' => $fuels,
            'case_types' => $case_types,
            'sale_types' => $sale_types,
            'statuses' => $statuses,
            'advert' => Advert::find($id),
            'photos' => AdvertPhoto::where('advert', $id)->get()
        ]);

    }


    public function update(Request $request){

        if(empty($request->brand) || empty($request->model) || empty($request->km) || empty($request->year) ||  empty($request->buy_price)){
            $this->response["message"] = "Yıldız (*) ile işaretlenen alanlar zorunludur.";
        }else{
            $adv = Advert::find($request->id);

            $adv->vehicle_type_id = 1;
            $adv->vehicle_brand_id = trim(ucfirst($request->brand));
            $adv->vehicle_model_id = trim(ucfirst($request->model));
            $adv->package = trim(ucfirst($request->package));
            $adv->motor = trim(ucfirst($request->motor));
            $adv->km = trim(ucfirst($request->km));
            $adv->year = trim(ucfirst($request->year));
            $adv->gear_id = trim(ucfirst($request->gear));
            $adv->fuel_id = trim(ucfirst($request->fuel));
            $adv->color_id = trim(ucfirst($request->color));
            $adv->case_type_id = trim(ucfirst($request->case));
            $adv->sahibinden_url = trim(ucfirst($request->sahibinden));
            $adv->arabam_url = trim(ucfirst($request->arabam));
            $adv->status_id = $request->status;
            $adv->buy_price = getCurrencyToNumber($request->buy_price);
            $adv->sell_price = getCurrencyToNumber($request->sell_price);
            if ($request->buy_date)
                $adv->buy_date = Carbon::parse($request->buy_date)->format('Y-m-d H:i:s');
            $adv->damage = getCurrencyToNumber($request->damage);

            $adv->description = $request->description;

            if($adv->save()){
                if(!empty($request->photodata)){
                    $photodata = explode(',', $request->photodata);
                    for ($i=0; $i < count($photodata); $i++) {
                        $pic = new AdvertPhoto;
                        $pic->advert = $adv->id;
                        $pic->file = $photodata[$i];
                        $pic->save();
                    }
                }
                $this->response["type"] = "success";
                $this->response["message"] = "İlan güncellendi";
                $this->response["id"] = $adv->id;
                $this->response["status"] = true;
                $this->response["link"] = route('advert-detail',$adv->id);
            }else{
                $this->response["type"] = "error";
                $this->response["message"] = "SYSTEM_ERROR";
            }
        }

        return $this->response;
    }

    public function delete_photo(Request $request){
        if($request->id){
            $find = AdvertPhoto::find($request->id);
            if($find){

                if($find->delete()){
                    return response(["title" => "Başarılı!", "message" => "Fotoğraf başarıyla silindi!", "type" => "success", "status" => true]);
                }else{
                    return response(["title" => "Hata!", "message" => "Fotoğraf silinirken bir hata oluştu!", "type" => "error"]);
                }
            }else{
                return response(["title" => "Hata!", "message" => "Fotoğraf bulunamadı!", "type" => "error"]);
            }
        }
    }
}
