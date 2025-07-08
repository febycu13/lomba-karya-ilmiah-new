<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Makalah;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Session;

class MakalahController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $data_user = DB::table('users')->where('id', $user->id)->first();
        $data_makalah = DB::table('makalah')->get();

        Session::flash('name', $data_user->name);
        Session::flash('id', $data_user->id);
        return view('dashboard.makalah', [
            'data_makalah' => $data_makalah
        ]);
    }

    public function delete(Makalah $makalah)
    {
        Makalah::destroy($makalah->id);

        return redirect(config('app.url') . '/makalah')->with('success', 'Makalah Berhasil Dihapus!');
    }
}
