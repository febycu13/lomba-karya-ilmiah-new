<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

date_default_timezone_set('Asia/Jakarta');

class UserController extends Controller
{
    public function index()
    {
        return View('register');
    }
    //Input Account
    public function store(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email:dns'],
            'telp' => ['required', 'min:9'],
            'schools' => ['required'],
            'name_schools' => ['required'],
            'address_schools' => ['required'],
            'password' => [
                'required',
                'confirmed',
                Password::min(8)
                    ->mixedCase()
                    ->symbols()
            ]
        ], [
            'telp.min' => 'Nomor Telephone Minimal 9 Angka!!',
            'password.min' => 'Password Minimal 8 Angka!!',
            'password.mixed' => 'Password harus memiliki 1 huruf kapital!!',
            'password.symbols' => 'Password harus memiliki 1 spesial karakter!!',
            'password.confirmed' => 'Password tidak sama!!'
        ]);

        $credentials['password'] = Hash::make($credentials['password']);
        $credentials['created_at'] = date('Y-m-d H:i:s');
        $credentials['updated_at'] = date('Y-m-d H:i:s');

        User::insert($credentials);

        return redirect()->route('register')->with(['success' => 'Pendaftaran Akun Lomba Karya Ilmiah Berhasil!']);
    }

    public function update(Request $request): RedirectResponse
    {
        User::where('email', '=', $request->email)->update([
            'email_verified_at' => date('Y-m-d H:i:s')
        ]);

        return redirect()->route('login')->with(['success' => 'Aktivasi Akun Berhasil!']);
    }
}
