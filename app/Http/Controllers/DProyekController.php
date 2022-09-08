<?php

namespace App\Http\Controllers;

use App\Models\DProyek;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class DProyekController extends Controller
{
    public function index()
    {
        $dp = dproyek::all();
        return view('dproyek', compact('dp'), ["title" => "Data Proyek"]);
    }
    public function tambahdatadp()
    {
        return view('tambahdatadp', ["title" => "Data Proyek"]);
    }
    public function insertdatadp(Request $request)
    {
        // dd($request->all());
        DProyek::create($request->all());
        Alert::toast('Data Berhasil ditambahkan', 'success');
        return redirect()->route('dproyek', ["title" => "Data Proyek"]);
    }
}
