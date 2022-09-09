<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\Akun;
use App\Models\Dproyek;
use App\Models\pproyek;
use Illuminate\Http\Request;
use App\Exports\PproyekExport;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;


class PproyekController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $pp = pproyek::where('kode_akun', 'LIKE', '%' . $request->search . '%')->simplePaginate(15);
        } else {
            $pp = pproyek::with('akun', 'dproyek')->simplePaginate(15);
        }


        return view('pproyek', compact('pp'), ["title" => "Perolehan Proyek"]);
    }
    public function tambahdatapproyek()
    {
        $ak = akun::all();
        $kp = dproyek::all();
        return view('tambahdatapproyek', compact('ak', 'kp'), ["title" => "Perolehan Proyek"]);
    }
    public function insertdatapproyek(Request $request)
    {
        $pp = pproyek::create([

            'tanggal' => $request->tanggal,
            'kode_akun' => $request->kode_akun,
            'transaksi' => $request->transaksi,
            'kode_proyek' => $request->kode_proyek,
            'biaya_proyek' => $request->biaya_proyek,
        ]);
        Alert::toast('Data Berhasil ditambahkan', 'success');
        return redirect()->route('pproyek');
    }

    public function tampilkandatapproyek($id)
    {
        $pp = pproyek::find($id);
        $ak = akun::all();
        $kp = dproyek::all();
        // $pp=pproyek::where('kode_perolehan',$kode_perolehan)->first();
        // dd($pp);        
        return view('tampilkandatapproyek', compact('pp', 'ak', 'kp'), ["title" => "Perolehan Proyek"]);
    }

    public function updatedatapproyek(Request $request, $id)
    {
        $pp = pproyek::find($id);
        $ak = akun::all();
        $kp = dproyek::all();
        $pp->update($request->all());
        Alert::toast('Data Berhasil diupdate!', 'success');
        return redirect()->route('pproyek');
    }

    public function delete($id)
    {
        $pp = pproyek::find($id);
        $ak = akun::all();
        $kp = dproyek::all();
        $pp->delete();
        return redirect()->route('pproyek');
    }


    public function exportpdf()
    {
        $pp = pproyek::all();

        $pdf = PDF::loadview('pproyek-pdf', compact('pp'));

        return $pdf->stream('pp.pdf');
    }

    public function cetakkkkform()
    {
        return view('pproyek-form', ["title" => "Perolehan Proyek"]);
    }

    public function cetakkkkpdf(Request $request)
    {

        $pp = pproyek::where('tanggal', '>=', date('Y-m-d', strtotime($request->tgl_mulai)))
            ->where('tanggal', '<=', date('Y-m-d', strtotime($request->tgl_selesai)))
            ->get();
        $pdf = PDF::loadview('pproyek-pdf', compact('pp'), ["title" => "Perolehan Proyek"]);

        return $pdf->stream('pp.pdf');
    }

    public function exportexcel()
    {
        return Excel::download(new PproyekExport, 'DataPerolehanProyek.xlsx');
    }

    public function periodes(Request $request)
    {
        $tgl_mulai = date('Y-m-d', strtotime($request->tgl_mulai));
        $tgl_selesai = date('Y-m-d', strtotime($request->tgl_selesai));
        $pp = pproyek::whereBetween('tanggal', [$tgl_mulai, $tgl_selesai])->get();
        $ak = akun::all();
        $kp = dproyek::all();

        return view('pproyek', compact('pp', 'ak', 'kp'));
    }
}
