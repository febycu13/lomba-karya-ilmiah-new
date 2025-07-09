<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
  public function index()
  {
    return view('login');
  }

  public function auth(Request $request)
  {

    // dd($request->all());

    $credentials = $request->validate([
      'email' => ['required', 'email:dns'],
      'password' => ['required']
    ]);

    if (Auth::attempt($credentials)) {

      $request->session()->regenerate();

      return redirect()->intended(config('app.url') . '/dashboard');

    }

    return back()->with('failed', 'Email atau Password Salah!!');

  }

  public function logout(Request $request)
  {
    Auth::logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    return redirect(config('app.url') . '/login')->with('success', 'Anda Berhasil Keluar!');
  }

  public function dashboard()
  {
    $user = Auth::user();
    $dataSubtheme = DB::table('makalah')
      ->select('sub_theme', DB::raw('count(id) as total'))
      ->groupby('sub_theme')
      ->get();

    return view('dashboard.index', [
      'data_user' => $user,
      'data_subtheme' => $dataSubtheme,
      'json_subtheme' => json_encode($dataSubtheme)
    ]);
  }
}
