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

class EditUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('changePass');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function changePass(Request $request)
    {
        $request->validate([
            'password'          => 'required|confirmed|min:6',
        ]);

        if (Hash::check($request->currentPassword, Auth::user()->password)) {
            DB::table('users')
              ->where('id', Auth::id())
              ->update(['password' => Hash::make($request->password)]);

            return redirect('logout');
        }else{
            return redirect('changePass');
        }
            
    }

}
