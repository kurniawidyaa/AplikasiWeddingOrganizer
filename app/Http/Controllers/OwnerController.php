<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\Service;
use App\Models\ServicePromo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class OwnerController extends Controller
{
    public function __invoke(Request $request)
    {
        $request->validate([
            'email' => ['required', 'string', 'email', 'exists:owners,email'],
            'password' => ['required', 'string', 'min:5']
        ], [
            'email exsists' => 'This email is not exsist on owners table'
        ]);

        $creds = $request->only('email', 'password');
        if (Auth::guard('owner')->attempt($creds)) {
            return redirect()->route('owner.home');
        } else {
            Alert::toast('<p style="color:#ffffff">Data yang diinput tidak sesuai!</p>', 'error')
                ->width('24rem')->background('#800000')->padding('0,25rem');
            return redirect()->route('owner.login');
        }
    }

    public function logout()
    {
        Auth::guard('owner')->logout();
        return redirect('/');
    }

    public function index()
    {
        return view('dashboard.index', [
            'submit' => 'Tambah Data',
            'order' => Order::all(),
            'user' => User::count(),
            'promo' => ServicePromo::count(),
            'service' => Service::count()
        ]);
    }
}
