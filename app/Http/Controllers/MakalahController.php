<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Makalah;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use File;

class MakalahController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $data_makalah = DB::table('makalah')->get();

        return view('dashboard.makalah', [
            'data_makalah' => $data_makalah,
            'data_user' => $user
        ]);
    }

    public function delete(Makalah $makalah)
    {
        Makalah::destroy($makalah->id);
        File::delete('storage/makalah/' . $makalah->file_makalah);

        return redirect(config('app.url') . '/makalah')->with('success', 'Makalah Berhasil Dihapus!');
    }

    public function indexPendaftaran()
    {
        $user = Auth::user();
        $dataProvince = DB::table('province')->get();
        $dataSubtheme = DB::table('subtheme')->get();

        return view('dashboard.pend-makalah', [
            'data_user' => $user,
            'dataProvince' => $dataProvince,
            'dataSubtheme' => $dataSubtheme
        ]);
    }

    public function store(Request $request, Makalah $makalah)
    {
        $MaxID = DB::table('makalah')->max('id_makalah');
        $credentials = $request->validate([
            'title' => ['required', 'unique:makalah', 'min:10'],
            'sub_theme' => ['required'],
            'code_school' => ['required'],
            'school' => ['required'],
            'name_participant' => ['required'],
            'name_teacher' => ['required'],
            'address_school' => ['required'],
            'province' => ['required'],
            'men' => ['required', 'numeric'],
            'women' => ['required', 'numeric'],
            'telephone' => ['required', 'numeric', 'min:9'],
            'email' => ['required', 'unique:makalah', 'email:dns'],
            'file_makalah' => ['required', 'max:25600', 'mimes:pdf']
        ], [
            'file_makalah.max' => 'Maksimum File PDF Sebesar 25MB!!',
            'telephone.min' => 'Nomor Telephone Minimal 9 Angka!!',
            'title.min' => 'Judul Makalah Minimal 10 Karakter!!',
            'title.unique' => 'Judul Makalah Sudah Terdaftar!!',
            'file_makalah.mimes' => 'File Makalah harus Berbentuk PDF!!'
        ]);

        $credentials['id_makalah'] = $MaxID + 1;
        $file = $request->file('file_makalah');
        $tujuan_upload = 'storage/makalah';
        $ext = $file->getClientOriginalExtension();
        $namaFile = $credentials['id_makalah'] . '_' . str_replace(' ', '', substr($credentials['sub_theme'], 0, 20)) . '_' . str_replace(' ', '', substr($credentials['title'], 0, 30)) . '.' . $ext;
        $file->move($tujuan_upload, $namaFile);
        $credentials['file_makalah'] = $namaFile;
        $credentials['created_at'] = date("Y/m/d H:i:s");
        $credentials['updated_at'] = date("Y/m/d H:i:s");

        Makalah::insert($credentials);

        return redirect(config('app.url') . '/pend-makalah')->with('success', 'Pendaftaran Makalah Berhasil!');
    }
}
