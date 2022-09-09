<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Profil;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class ProfilController extends Controller
{

    public function index()
    {
        $profil = Profil::all();
        $user = User::all();
        return view('profil', compact('profil'), ["title" => "Profil"]);
    }


    public function updatedataprofil(Request $request, $id)

    {
        $user = User::find($id);
        $user->nidn = $request->nidn;
        $user->name = $request->name;
        $user->jenis_kelamin = $request->jenis_kelamin;
        $user->email = $request->email;

        if (!empty($request->password) || $request->password != null || $request->password != '') {
            $user->password = bcrypt($request->password);
        }
        $user->save();
        Alert::toast('Data Berhasil diupdate!', 'success');
        return redirect('profil');
    }
}
