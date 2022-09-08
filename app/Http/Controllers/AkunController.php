<?php

namespace App\Http\Controllers;

use App\Helpers\ApiFormatters;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Akun;
use Exception;
use RealRashid\SweetAlert\Facades\Alert;
use PhpParser\Node\Stmt\Catch_;
use PhpParser\Node\Stmt\TryCatch;

class AkunController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Akun::all();
        return view('akun', compact('data'), ["title" => "Data Akun"]);
    }

    public function tambahakun()
    {
        return view('tambahdataakun', ["title" => "Data Akun"]);
    }

    public function insertakun(Request $request)
    {

        Akun::create($request->all());
        Alert::toast('Data Berhasil ditambahkan', 'success');
        return redirect()->route('akun', ["title" => "Data Akun"]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Akun::all();

        if ($data) {
            return ApiFormatters::createApi(200, 'Success', $data);
        } else {
            return ApiFormatters::createApi(400, 'Failed');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'kode_akun' => 'required',
                'nama_perkiraan' => 'required',
                'nama_group' => 'required',
            ], [
                'kode_akun.required' => 'Isi kode akun dengan benar.',
                'nama_perkiraan.required' => 'Isi nama perkiraan dengan benar.',
                'nama_group.required' => 'Isi nama group dengan benar.'
            ]);
            $akun = Akun::create([
                'kode_akun' => $request->kode_akun,
                'nama_perkiraan' => $request->nama_perkiraan,
                'nama_group' => $request->nama_group
            ]);

            $data = Akun::where('id', '=', $akun->id)->get();

            if ($data) {
                return ApiFormatters::createApi(200, 'Success', $data);
            } else {
                return ApiFormatters::createApi(400, 'Failed');
            }
        } catch (Exception $error) {
            return ApiFormatters::createApi(400, 'Failed');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
