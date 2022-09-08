<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\Bks;
use App\Models\Akun;
use App\Models\DProyek;
use App\Exports\BksExport;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;

class BksController extends Controller
{
    public function index()
    {
        $bk = Bks::with('akun', 'dproyek')->simplePaginate(15);
        return view('bks', compact('bk'), ["title" => "Buku Kas Harian"]);
    }

    public function tambahdatabks()
    {
        $ak = akun::all();
        $np = akun::all();
        $ng = akun::all();
        $kp = dproyek::all();
        return view('tambahdatabks', compact('ak', 'kp', 'np', 'ng'), ["title" => "Buku Kas Harian"]);
    }

    public function insertdatabks(Request $request)
    {
        $kredit = $request->kredit;
        $debit = $request->debit;

        $balance_baru = Bks::latest()->first();
        if ($balance_baru != null) {
            $balance = $balance_baru->balance + $debit - $kredit;
        } else {
            $balance = $kredit - $debit;
        }
        $bk = Bks::create([
            'tanggal' => $request->tanggal,
            'perkiraan' => $request->perkiraan,
            'reff' => $request->reff,
            'kode_akun' => $request->kode_akun,
            'debit' => $request->debit,
            'kredit' => $request->kredit,
            'balance' => $balance,
            'kode_proyek' => $request->kode_proyek,
            'nama_perkiraan' => $request->nama_perkiraan,
            'nama_group' => $request->nama_group,
        ]);
        // dd($pp);   
        Alert::toast('Data Berhasil ditambahkan', 'success');

        return redirect()->route('bks');
    }

    public function tampilkandatabks($id)
    {
        $bk = Bks::find($id);
        $ak = akun::all();
        $np = akun::all();
        $ng = akun::all();
        $kp = dproyek::all();
        // dd($bk);
        return view('tampilkandatabks', compact('bk', 'ak', 'kp', 'np', 'ng'), ["title" => "Buku Kas Harian"]);
    }

    public function updatedatabks(Request $request, $id)
    {
        $bk = Bks::find($id);
        $ak = akun::all();
        $np = akun::all();
        $ng = akun::all();
        $kp = dproyek::all();
        $bk->update($request->all());
        Alert::toast('Data Berhasil diupdate!', 'success');
        return redirect()->route('bks');
    }

    public function delete($id)
    {
        $bk = Bks::find($id);
        $ak = akun::all();
        $np = akun::all();
        $ng = akun::all();
        $kp = dproyek::all();
        $bk->delete();
        return redirect()->route('bks');
    }

    public function exporrtpdf()
    {
        $bk = Bks::all();

        // view()->share('pp', $pp);
        $pdf = PDF::loadview('bks-pdf', compact('bk'));

        return $pdf->stream('bk.pdf');
    }


    public function cetakkform()
    {
        return view('bks-form', ["title" => "Buku Kas Harian"]);
    }

    public function cetakkpdf(Request $request)
    {

        $bk = Bks::where('tanggal', '>=', date('Y-m-d', strtotime($request->tgl_mulai)))
            ->where('tanggal', '<=', date('Y-m-d', strtotime($request->tgl_selesai)))
            ->get();
        // dd($bm);
        $pdf = PDF::loadview('bks-pdf', compact('bk'), ["title" => "Buku Kas Harian"]);

        return $pdf->stream('bk.pdf');
    }

    public function exporrtexcel()
    {
        return Excel::download(new BksExport, 'DataBukuKasHarian.xlsx');
    }

    public function periodee(Request $request)
    {
        $tgl_mulai = date('Y-m-d', strtotime($request->tgl_mulai));
        $tgl_akhir = date('Y-m-d', strtotime($request->tgl_selesai));
        $bk = Bks::whereBetween('tanggal', [$tgl_mulai, $tgl_akhir])->get();
        $ak = akun::all();
        $kp = dproyek::all();

        return view('bks', compact('bk', 'ak', 'kp'), ["title" => "Buku Kas Harian"]);
    }

    // public function cari(Request $request, $id)
    // {
    //     if ($request->has('id')) {
    //         $cari = $request->id;
    //         $data = DB::table('bks')->select('id', 'perkiraan')->where('perkiraan', 'LIKE', '%$cari%')->get();
    //         return response()->json($data);
    //     }
    // }

    // public function autocomplate(Request $request){
    //     if($request->has('bks')){
    //         return Bks::where('nama_perkiraan','like','%'.$request->input('bks').'%')->get();
    //     }
    // }

    // public function create(){
    //     return view('bks');
    // }


    // public function indexxx()
    // {
    //     return view('bks');
    // }

    // public function autocomplete(Request $request)
    // {
    //     $data = Bks::select("kode_akun")
    //             ->where("kode_akun","LIKE","%{$request->query}%")
    //             ->get();

    //     return response()->json($data);
    // }

    // public function bkss ($id)
    // {
    //     $bk = Bks::where('id',$id)->first();

    //     return response()->json([
    //         'data'=>$bk
    //     ]);
    // }

}
