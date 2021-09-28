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

class MealController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('addMeal');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function addMeal(Request $request)
    {
         $request->validate([
            'name'              => 'required|max:253',
            'calories'          => 'required|numeric|min:0',
            'protein'           => 'required|numeric|min:0',
            'fat'               => 'required|numeric|min:0',
            'carbohydrates'     => 'required|numeric|min:0'
        ]);


        $caloricConsumption = $this->getCurrentConsumption();

        $mealId = DB::table('meal')->insertGetId([
            'caloricConsumptionId'  => $caloricConsumption->caloricConsumptionId,
            'name'                  => $request->name,
            'calories'              => $request->calories,
            'protein'               => $request->protein,
            'fat'                   => $request->fat,
            'carbohydrates'         => $request->carbohydrates,
        ],'mealId');

        $this->addConsumption($caloricConsumption, $request);

        if($request->saved){
            DB::table('saved_meals')->insert([
                'userId'  => Auth::id(),
                'mealId'  => $mealId,
            ]);
        }

        return redirect('/');

    }

    function getCurrentConsumption(){
        return  DB::table('caloric_consumption')
                    ->where('caloricDemandId', '=', (DB::table('caloric_demand')->where('userId', '=', Auth::id())->first())->caloricDemandId)
                    ->where('date', '=', date("Y-m-d"))
                    ->first();
    }

    function addConsumption($caloricConsumption, $request){

        DB::table('caloric_consumption')
        ->where('caloricConsumptionId', $caloricConsumption->caloricConsumptionId)
        ->update([
            'calories'      => $caloricConsumption->calories + $request->calories,
            'protein'       => $caloricConsumption->protein + $request->protein,
            'fat'           => $caloricConsumption->fat + $request->fat,
            'carbohydrates' => $caloricConsumption->carbohydrates + $request->carbohydrates,
        ]);

        $caloricDemand = DB::table('caloric_demand')->where('caloricDemandId', $caloricConsumption->caloricDemandId)->first();

        $points = (((($request->calories + $caloricConsumption->calories)/$caloricDemand->calories) 
                + (($request->protein + $caloricConsumption->protein)/$caloricDemand->protein)
                + (($request->fat + $caloricConsumption->fat)/$caloricDemand->fat)
                + (($request->carbohydrates + $caloricConsumption->carbohydrates)/$caloricDemand->carbohydrates))/4)*100;

        if($points>100)$points=100;

        $affected = DB::table('caloric_consumption')->where('caloricConsumptionId', $caloricConsumption->caloricConsumptionId)->update(['points' => $points]);
    }

    public function savedMeals(){

        $savedMeals = DB::table('saved_meals')->where('userId', '=', Auth::id())->get();

        for($i = 0; $i<count($savedMeals);$i++){
            $meals[$i] = DB::table('meal')->where('mealId', '=', $savedMeals[$i]->mealId)->get();
        }

        return view('savedMeals', ['meals' => $meals]);
    }

    function addSavedConsumption(Request $request){

        $mealId = $request->meal;

        $meal = DB::table('meal')->where('mealId', '=', $mealId)->first();

        $caloricConsumption = $this->getCurrentConsumption();

        $this->addConsumption($caloricConsumption, $meal);

        $mealId = DB::table('meal')->insertGetId([
            'caloricConsumptionId'  => $caloricConsumption->caloricConsumptionId,
            'name'                  => $meal->name,
            'calories'              => $meal->calories,
            'protein'               => $meal->protein,
            'fat'                   => $meal->fat,
            'carbohydrates'         => $meal->carbohydrates,
        ],'mealId');

        return redirect('/');
    }

    function removeSavedMeal(Request $request){

        $mealId = $request->meal;

        DB::table('saved_meals')->where('mealId', $mealId)->delete();

        return redirect('/');
    }

}