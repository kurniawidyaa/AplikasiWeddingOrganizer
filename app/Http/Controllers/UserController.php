<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    public function index()
    {
        return view('user.index', [
            'submit' => 'Tambah Data',
            'user' => User::all(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:5',],
            'confirmPassword' => ['required', 'string', 'min:5', 'same:password']
        ]);

        $attr['name'] = $request->name;
        $attr['email'] = $request->email;
        $attr['phone'] = $request->phone;
        $attr['address'] = $request->address;
        $attr['password'] = Hash::make($request->password);
        $attr['email_verified_at'] = Carbon::now($request->email_verified_at);

        $save = User::create($attr);

        if ($save) {
            Alert::toast('<p style="color:#ffffff">Register berhasil!</p>', 'success')
                ->width('24rem')->background('#800000')->padding('0,25rem');
        } else {
            Alert::toast('<p style="color:#ffffff">Register gagal!</p>', 'error')
                ->width('24rem')->background('#851c1c')->padding('0,25rem');
        }
        return redirect('user.home');
    }

    public function edit($id)
    {
        $user = User::where('id', $id)->first();
        return view('user.edit', [
            'submit' => 'Update',
            'user' => $user,
        ]);
    }

    public function check(Request $request)
    {
        $request->validate([
            'email' => ['required', 'string', 'email', 'exists:users,email'],
            'password' => ['required', 'string', 'min:5',],
        ], [
            'email exists' => 'This email is not exsist on users table'
        ]);

        $creds = $request->only('email', 'password');
        if (Auth::guard('web')->attempt($creds)) {
            return redirect()->route('/');
        } else {
            Alert::toast('<p style="color:#ffffff">Data yang diinput tidak sesuai!</p>', 'error')
                ->width('24rem')->background('#800000')->padding('0,25rem');
            return redirect()->route('user.login');
        }
    }

    public function logout()
    {
        Auth::guard('web')->logout();
        return redirect('/');
    }

    public function destroy($id)
    {
        User::where('id', $id)->delete();
        return response()->json(['status' => 'Data customer berhasil dihapus.']);
        return back();
    }
}
