<?php

namespace App\Http\Controllers;

use App\Models\Advert;
use App\Models\Expense;
use App\Models\User;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function revenue(){
        $month = Advert::where('sold_price', '!=', null)->whereMonth('sold_date', now()->month)->whereYear('sold_date', now()->year)->get();
        $year  = Advert::where('sold_price', '!=', null)->whereYear('sold_date', now()->year)->get();
        $all   = Advert::where('sold_price', '!=', null)->get();

        $monthprice = $month->sum('sold_price');
        $yearprice = $year->sum('sold_price');
        $allprice = $all->sum('sold_price');

        return view('layout.report.revenue', ['month' => $month, 'year' => $year, 'all' => $all, 'monthprice' => $monthprice, 'yearprice' => $yearprice, 'allprice' => $allprice, 'users' => User::all()]);
    }

    public function expense(){
        $month = Expense::whereMonth('created_at', now()->month)->whereYear('created_at', now()->year)->get();
        $year  = Expense::whereYear('created_at', now()->year)->get();
        $all   = Expense::all();

        $monthprice = $month->sum('amount');
        $yearprice = $year->sum('amount');
        $allprice = $all->sum('amount');

        return view('layout.report.expense', ['month' => $month, 'year' => $year, 'all' => $all, 'monthprice' => $monthprice, 'yearprice' => $yearprice, 'allprice' => $allprice, 'users' => User::all(), 'adverts' => Advert::all()]);
    }

    public function get_user_report(Request $request){

        if($request->id){
            $user = User::find($request->id);
            if($user){

                $adv = Advert::query();
                $adv->join('vehicle_brands','vehicle_brands.id','=','adverts.vehicle_brand_id');
                $adv->join('vehicle_models','vehicle_models.id','=', 'adverts.vehicle_model_id');
                $adv->where('adverts.owner_id',$user->id);
                $adv->select(
                    'adverts.sold_price',
                    'adverts.sold_date',
                    'adverts.id as advert',
                    'vehicle_brands.name as brand',
                    'vehicle_models.name as model',
                );

                //$adv = Advert::where('owner_id',$user->id)->where('sold_price', '!=', null)->get();
                $userprice = $adv->sum('sold_price');

                return response(['useradvert' => $adv->get(), 'userprice' => currency_format($userprice)]);
            }
        }

    }
    public function get_user_expense_report(Request $request){
        if($request->id){
            $user = User::find($request->id);
            if($user){

                $expense = Expense::query();
                $expense->join('adverts','adverts.id','=','expense.advert_id');
                $expense->join('vehicle_brands','vehicle_brands.id','=','adverts.vehicle_brand_id');
                $expense->join('vehicle_models','vehicle_models.id','=', 'adverts.vehicle_model_id');
                $expense->where('expense.user_id',$user->id);
                $expense->select(
                    'expense.*',
                    'adverts.id as advert',
                    'vehicle_brands.name as brand',
                    'vehicle_models.name as model',
                );

                $userprice = $expense->sum('amount');

                return response(['expense' => $expense->get(), 'userprice' => currency_format($userprice)]);
            }
        }
    }

    public function get_car_expense_report(Request $request){
        if($request->id){
            $advert = Advert::find($request->id);
            if($advert){

                $expense = Expense::query();
                $expense->join('adverts','adverts.id','=','expense.advert_id');
                $expense->join('vehicle_brands','vehicle_brands.id','=','adverts.vehicle_brand_id');
                $expense->join('vehicle_models','vehicle_models.id','=', 'adverts.vehicle_model_id');
                $expense->where('expense.advert_id',$advert->id);
                $expense->select(
                    'expense.*',
                    'adverts.id as advert',
                    'vehicle_brands.name as brand',
                    'vehicle_models.name as model',
                );


                //$expense = Expense::where('advert_id', $advert->id)->with('Advert')->get();
                $carprice = $expense->sum('amount');

                return response(['expense' => $expense->get(), 'carprice' => currency_format($carprice)]);
            }
        }
    }
}
