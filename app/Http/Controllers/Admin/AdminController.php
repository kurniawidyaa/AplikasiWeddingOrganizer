<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
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
        Auth::guard('admin')->logout();
        return redirect('/');
    }

    public function index()
    {
        return view('admin.index', [
            'submit' => 'Tambah Data',
            'admin' => Admin::all(),
        ]);
    }

    public function destroy($id)
    {
        Admin::where('id', $id)->delete();
        return response()->json(['status' => 'Data admin berhasil dihapus.']);
        return back();
    }
}
