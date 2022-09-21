<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\Akun;
use App\Models\Bbbadm;
use App\Exports\BbadmExport;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;



class BbbadmController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $bb = Bbbadm::where('nama_perkiraan', 'LIKE', '%' . $request->search . '%')->simplePaginate(15);
        } else {
            $bb = Bbbadm::with('akun')->simplePaginate(15);
        }

        $total_debit = Bbbadm::sum('debit');
        $total_kredit = Bbbadm::sum('kredit');
        return view('bbbadm', compact('bb','total_debit','total_kredit'), ["title" => "Buku Besar Biaya Adm & Umum"]);
    }


    public function tambahdatabbbadm()
    {
        $ak = akun::all();
        return view('tambahdatabbbadm', compact('ak'), ["title" => "Buku Besar Biaya Adm & Umum"]);
    }

    public function insertdatabbbadm(Request $request)
    {
        $kredit = $request->kredit;
        $debit = $request->debit;

        $balance_baru = Bbbadm::latest()->first();
        if ($balance_baru != null) {
            $balance = $balance_baru->balance + $debit - $kredit;
        } else {
            $balance = $kredit - $debit;
        }

        $bbbadm = Bbbadm::create([
            'tanggal' => $request->tanggal,
            'nama_perkiraan' => $request->nama_perkiraan,
            'reff' => $request->reff,
            'kode_akun' => $request->kode_akun,
            'debit' => $request->debit,
            'kredit' => $request->kredit,
            'balance' => $balance,

        ]);
        Alert::toast('Data Berhasil ditambahkan', 'success');
        return redirect()->route('bbbadm');
    }

    public function tampilkandatabbbadm($id)
    {
        $bb = Bbbadm::find($id);
        $ak = akun::all();

        return view('tampilkandatabbbadm', compact('bb', 'ak'), ["title" => "Buku Besar Biaya Adm & Umum"]);
    }

    public function updatedatabbbadm(Request $request, $id)
    {
        $bb = Bbbadm::find($id);
        $ak = akun::all();
        $bb->update($request->all());

        Alert::toast('Data Berhasil diupdate!', 'success');
        return redirect()->route('bbbadm');
    }

    public function delete($id)
    {
        $bb = Bbbadm::find($id);
        $ak = akun::all();
        $bb->delete();
        return redirect()->route('bbbadm');
    }

    public function expoortpdf()
    {
        $bb = Bbbadm::all();
        $pdf = PDF::loadview('bbbadm-pdf', compact('bb'));

        return $pdf->stream('bb.pdf');
    }

    public function cetakkkform()
    {
        return view('bbbadm-form', ["title" => "Buku Besar Biaya Adm & Umum"]);
    }

    public function cetakkkpdf(Request $request)
    {

        $bb = Bbbadm::where('tanggal', '>=', date('Y-m-d', strtotime($request->tgl_mulai)))
            ->where('tanggal', '<=', date('Y-m-d', strtotime($request->tgl_selesai)))
            ->get();
        // dd($bm);
        $pdf = PDF::loadview('bbbadm-pdf', compact('bb'), ["title" => "Buku Besar Biaya Adm & Umum"]);

        return $pdf->stream('bb.pdf');
    }

    public function expoortexcel()
    {
        return Excel::download(new BbadmExport, 'DataBukuBesarAdm&Umum.xlsx');
    }

    public function periode(Request $request)
    {
        $tgl_mulai = date('Y-m-d', strtotime($request->tgl_mulai));
        $tgl_akhir = date('Y-m-d', strtotime($request->tgl_selesai));
        $bb = Bbbadm::whereBetween('tanggal', [$tgl_mulai, $tgl_akhir])->get();
        $ak = akun::all();

        return view('bbbadm', compact('bb', 'ak'), ["title" => "Buku Besar Biaya Adm & Umum"]);
    }

    
}
