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

class CalculationsController extends Controller
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
    public function collectData(Request $request)
    {
        $request->validate([
            'age'           => 'required|numeric|min:5|max:99',
            'weight'        => 'required|numeric|min:20|max:200',
            'height'        => 'required|numeric|min:50|max:250',
            'activityLevel' => 'required|numeric|min:1|max:4',
            'aim'           => 'required|numeric|min:1|max:4'
        ]);

        DB::table('users_data')->insert([
            'userId'        => Auth::id(),
            'age'           => $request->age,
            'sex'           => Auth::user()->sex,
            'weight'        => $request->weight,
            'height'        => $request->height,
            'activityLevel' => $request->activityLevel,
            'aim'           => $request->aim,
        ]);

        $this->calculate($request);

        DB::table('users')->where('id', Auth::id())->update(['isActive' => 1]);

        return redirect('/');
    }

    public function calculate(Request $request){

        $calories = 0;

        if( (Auth::user()->sex) == 'M'){
            $calories = 66 + (13.7 * $request->weight) + (5 * $request->height) - (6.8 * $request->age);
        }else if( (Auth::user()->sex) == 'K'){
            $calories = 655 + (9.6 * $request->weight) + (1.8 * $request->height) - (4.7 * $request->age);
        };

        $calories = $calories * $request->activityLevel;
        $protein = 0;
        $fat = 0;
        $carbohydrates = 0;

        switch ($request->aim) {
            case 1:
                $protein = $request->weight * 2;
                $fat = (0.2 * $calories)/9;
                break;
            case 2:
                $protein = $request->weight * 2.1;
                $fat = (0.225 * $calories)/9;
                break;
            case 3:
                $protein = $request->weight * 2.2;
                $fat = (0.25 * $calories)/9;
                break;
        };
        $carbohydrates = ($calories - ($protein*4) - ($fat*9))/4;

        DB::table('caloric_demand')->insert([
            'userId'        => Auth::id(),
            'calories'      => $calories,
            'protein'       => $protein,
            'fat'           => $fat,
            'carbohydrates' => $carbohydrates,
        ]);

    }
}
