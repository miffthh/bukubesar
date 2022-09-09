<?php

namespace App\Http\Controllers;

use App\Exports\BmarketingExport;
use PDF;
use App\Models\Akun;
use App\Models\BMarketing;
use Illuminate\Http\Request;
use App\Exports\PproyekExport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;


class BmarketingController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $bm = BMarketing::where('kode_akun', 'LIKE', '%' . $request->search . '%')->simplePaginate(15);
        } else {
            $bm = BMarketing::with('akun')->simplePaginate(15);
        }

        return view('bmarketing', compact('bm'), ["title" => "Biaya Marketing"]);
    }
    public function tambahdatabm()
    {
        $ak = akun::all();
        return view('tambahdatabm', compact('ak'), ["title" => "Biaya Marketing"]);
    }
    public function insertdatabm(Request $request)
    {
        BMarketing::create([
            'tanggal' => $request->tanggal,
            'kode_akun' => $request->kode_akun,
            'transaksi' => $request->transaksi,
            'marketing_proyek' => $request->marketing_proyek,
            'biaya' => $request->biaya,
        ]);
        Alert::toast('Data Berhasil ditambahkan', 'success');
        return redirect()->route('bmarketing');
    }

    public function tampilkandatabm($id)
    {
        $bm = BMarketing::find($id);
        $ak = akun::all();
        return view('tampilkandatabm', compact('bm', 'ak'), ["title" => "Biaya Marketing"]);
    }

    public function updatedatabm(Request $request, $id)
    {
        $bm = BMarketing::find($id);
        $ak = akun::all();
        $bm->update($request->all());
        Alert::toast('Data Berhasil diupdate!', 'success');
        return redirect()->route('bmarketing');
    }

    public function delete($id)
    {
        $bm = BMarketing::find($id);
        $ak = akun::all();
        $bm->delete();
        return redirect()->route('bmarketing');
    }

    public function exporttpdf()
    {
        $bm = BMarketing::all();
        $pdf = PDF::loadview('bmarketing-pdf', compact('bm'));

        return $pdf->stream('bm.pdf');
    }

    public function cetakform()
    {
        return view('bmarketing-form', ["title" => "Biaya Marketing"]);
    }

    public function cetakpdf(Request $request)
    {

        $bm = BMarketing::where('tanggal', '>=', date('Y-m-d', strtotime($request->tgl_mulai)))
            ->where('tanggal', '<=', date('Y-m-d', strtotime($request->tgl_selesai)))
            ->get();
        $pdf = PDF::loadview('bmarketing-pdf', compact('bm'), ["title" => "Biaya Marketing"]);

        return $pdf->stream('bm.pdf');
    }

    public function exporttexcel()
    {
        return Excel::download(new BmarketingExport, 'DataBiayaMarketing.xlsx');
    }

    public function periodeee(Request $request)
    {
        $tgl_mulai = date('Y-m-d', strtotime($request->tgl_mulai));
        $tgl_selesai = date('Y-m-d', strtotime($request->tgl_selesai));
        $bm = BMarketing::whereBetween('tanggal', [$tgl_mulai, $tgl_selesai])->get();
        $ak = akun::all();

        return view('bmarketing', compact('bm', 'ak'));
    }
}
