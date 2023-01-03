<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Order;
use App\Models\Service;
use App\Models\ServicePromo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class AdminController extends Controller
{
    public function __invoke(Request $request)
    {
        // validation
        $request->validate([
            'email' => ['required', 'string', 'email', 'exists:admins,email'],
            'password' => ['required', 'string', 'min:5',],
        ], [
            'email exists' => 'This email is not exsist on admins table'
        ]);

        $creds = $request->only('email', 'password');
        if (Auth::guard('admin')->attempt($creds)) {
            return redirect()->route('admin.home');
        } else {
            Alert::toast('<p style="color:#ffffff">Data yang diinput tidak sesuai!</p>', 'error')
                ->width('24rem')->background('#800000')->padding('0,25rem');
            return redirect()->route('admin.login');
        }
    }

    public function logout()
    {
        Auth::logout('admin');
        return redirect('/');
    }

    public function index()
    {
        return view('dashboard.index', [
            'submit' => 'Tambah Data',
            'order' => Order::all(),
            'user' => User::count(),
            'promo' => ServicePromo::count(),
            'service' => Service::count(),

        ]);
    }

    public function edit($id)
    {
        $admin = Admin::where('id', $id)->first();
        return view('admin.edit', [
            'admin' => $admin,
            'submit' => 'Update',
        ]);
    }

    public function destroy($id)
    {
        Admin::where('id', $id)->delete();
        return response()->json(['status' => 'Data admin berhasil dihapus.']);
        return back();
    }
}
