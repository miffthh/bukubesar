<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
// use Illuminate\Routing\Controller;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;



class UserController extends Controller
{

    public function index()
    {
        $user = User::all();
        return view('user', compact('user'), ["title" => "Data User"]);
    }

    public function tambahuser()
    {
        return view('tambahuser', ["title" => "Data User"]);
    }

    public function tambahdatauser(Request $request)
    {
        user::create([
            'nidn' => $request->nidn,
            'name' => $request->name,
            'jenis_kelamin' => $request->jenis_kelamin,
            'email' => $request->email,
            'password' => bcrypt(($request->password)),
            'role' => $request->role,
            'remember_token' => Str::random(60),
        ]);
        Alert::toast('Data Berhasil ditambahkan', 'success');
        return redirect('user');
    }
    public function tampilkandatauser($id)
    {
        $user = User::find($id);

        return view('tampilkandatauser', compact('user'), ["title" => "Data User"]);
    }

    public function updatedatauser(Request $request, $id)

    {
        User::where('id', $id)->update([
            'nidn' => $request->nidn,
            'name' => $request->name,
            'jenis_kelamin' => $request->jenis_kelamin,
            'email' => $request->email,
            'password' => bcrypt(($request->password)),
            'role' => $request->role,
            'remember_token' => Str::random(60),
        ]);
        Alert::toast('Data Berhasil diupdate!', 'success');
        return redirect('user', ["title" => "Data User"]);
    }

    public function updatedataprofil(Request $request, $id)

    {
        User::where('id', $id)->update([
            'nidn' => $request->nidn,
            'name' => $request->name,
            'jenis_kelamin' => $request->jenis_kelamin,
            'email' => $request->email,
            'password' => bcrypt(($request->password)),
            'role' => $request->role,
            'remember_token' => Str::random(60),
        ]);
        return redirect('profil', ["title" => "Data User"]);
    }
    //     public function updateprofil (Request $request)
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

    // {
    //     $user = User::find($id);        
    //     $user->update($request->all());
    //     return redirect()->route('user')->with('succsess','Data Berhasil di Update');                      
    // }
    // try {            
    //         pproyek::where('kode_perolehan', $kode_perolehan)->update([
    //             'kode_perolehan' => $request->kode_perolehan,
    //             'tanggal' => $request->tanggal,
    //             'kode_akun' => $request->kode_akun,
    //             'transaksi' => $request->transaksi,
    //             'kode_proyek' => $request->kode_proyek,
    //             'biaya_proyek' => $request->biaya_proyek,                
    //         ]);
    //     } catch (\Throwable $th) {
    //         dd($th);        

    // public function insertuser(Request $request)
    // {
    //     user::create($request->all());
    //     // dd($request->all());
    //     return redirect('user');
    // }

    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('user');
    }
}
