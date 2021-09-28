<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('collectData');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function init()
    {

        $caloricDemand = DB::table('caloric_demand')
                                ->where('userId', '=', Auth::id())
                                ->first();

        if(!$caloricDemand)return redirect('logout');

        $caloricConsumption = DB::table('caloric_consumption')
                                ->where('caloricDemandId', '=', $caloricDemand->caloricDemandId)
                                ->where('date', '=', date("Y-m-d"))
                                ->first();

        if(!$caloricConsumption){
            
            $lastConsumptionDate = date_create((DB::table('caloric_consumption')->where('caloricDemandId', '=', $caloricDemand->caloricDemandId)->latest('date')->first())->date);
            $interval = ((date_diff(date_create('now'),$lastConsumptionDate))->format('%d'));
            for($i = $interval; $i > 0; $i--){
                DB::table('caloric_consumption')->insert([
                'caloricDemandId'   => $caloricDemand->caloricDemandId,
                'date'              => date('Y-m-d', strtotime('+'.$i.' days', strtotime(date_format($lastConsumptionDate, 'c')))),
                ]);
            }

            // DB::table('caloric_consumption')->insert([
            //     'caloricDemandId'   => $caloricDemand->caloricDemandId,
            //     'date'              => date("Y-m-d"),
            // ]);

            return redirect('/');
        }else{

            $meals = DB::table('meal')->where('caloricConsumptionId', '=', $caloricConsumption->caloricConsumptionId)->get();

            $percentes = [
                'protein' => $this->calculatePercentes($caloricConsumption->protein, $caloricDemand->protein).'%',
                'fat' => $this->calculatePercentes($caloricConsumption->fat, $caloricDemand->fat).'%',
                'carbohydrates' => $this->calculatePercentes($caloricConsumption->carbohydrates, $caloricDemand->carbohydrates).'%',
                'calories' => $this->calculatePercentes($caloricConsumption->calories, $caloricDemand->calories).'%',
            ];

            $points = DB::table('caloric_consumption')
                                    ->select('points')
                                    ->where('caloricDemandId', '=', $caloricDemand->caloricDemandId)
                                    ->orderBy('date', 'desc')
                                    ->get();

            return view('dashboard', ['caloricDemand' => $caloricDemand, 'caloricConsumption' => $caloricConsumption, 'percentes' => $percentes, 'points' => $points, 'meals' => $meals]);
        }

        
    }

    public function calculatePercentes($consumption, $demand){

        $percentes = ($consumption/$demand*100);
        if($percentes<10 && $percentes>0) $percentes = '0'.$percentes;
        if($percentes>100) $percentes=100;
        return round($percentes);
    }
}
