<?php

namespace App\Http\Controllers;

use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();
        $google2fa = app('pragmarx.google2fa');
  
        $QR_Image = $google2fa->getQRCodeInline(
            config('app.name'),
            $user->email,
            $user->google2fa_secret
        );

        $data = [
            'QR_Image' => $QR_Image,
            'secret' => $user->google2fa_secret];

        return view('dashboard', $data);
    }

    /**
     *  completeRegistration
     *
     * @return response()
     */
    public function completeRegistration(Request $request)
    {        
        return redirect(RouteServiceProvider::HOME);
    }
}
