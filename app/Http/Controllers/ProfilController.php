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
        // User::where('id', $id)->update([
        //     'nidn' => $request->nidn,
        //     'name' => $request->name,
        //     'jenis_kelamin' => $request->jenis_kelamin,
        //     'email' => $request->email,
        //     'password' => bcrypt(($request->password)),            
        //     'remember_token' => Str::random(60),
        // ]);
        $user = User::find($id);
        $user->nidn = $request->nidn;
        $user->name = $request->name;
        $user->jenis_kelamin = $request->jenis_kelamin;
        $user->email = $request->email;

        if (!empty($request->password) || $request->password != null || $request->password != '') {
            $user->password = $request->password;
        }
        $user->save();
        Alert::toast('Data Berhasil diupdate!', 'success');
        return redirect('profil');
        // return dd($request->id);
    }

    // public function updatedataprofil (Request $request)
    // {
    //     $attr = $request->validate([
    //         'nidn' => ['string','required'],
    //         'name' => ['string','min:3','min:191','required'],
    //         'jenis_kelamin' => ['string','required'],
    //         'email' => ['string','min:3','min:191','required'],
    //         'role' => ['string','min:3','min:191','required'],            
    //         'password' => bcrypt(($request->password)),            
    //         'remember_token' => Str::random(20),
    //     ]);

    //     auth()->user()->update($attr);

    //     return redirect() 
    //     ->route('profil', auth()->user()->id)
    //     ->with('message', 'Profil Sudah di Update');
    // }

}
