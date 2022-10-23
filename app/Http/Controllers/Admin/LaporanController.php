<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Perizinan;
use Carbon\Carbon;
use PDF;
class LaporanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(Request $request)
    {
        $data =null;
        if($request->cari != '') {
            $data = Perizinan::where('status', '2')
            ->orWhere('status', '1')
            ->where('no_tiket','LIKE','%'.$request->cari.'%')
            ->paginate(20);
            $jml = $data->count();
            return view('admin.laporan', ['data' => $data, 'jml' => $jml]);
        }

        if($request->status == 'gagal') {
            $data = Perizinan::where('status', '2')->paginate(20);
        } elseif ($request->status == 'terbit') {
            $start = $request->start;
            $end = $request->end;
            $data = Perizinan::where('status', '1')
            ->whereBetween('updated_at', [$start, $end])
            ->paginate(20);
        } else {
            $data = Perizinan::where('status', '1')->paginate(20);
            // return redirect()->back()->with('not_found','Kamu Tidak Memiliki Akses Teknis');
        }
        
        $jml = $data->count();
        // return $data;
        return view('admin.laporan', ['data' => $data, 'jml' => $jml]);
    }

    public function pdf(Request $request)
    {
        $data =null;
        if($request->status == 'gagal') {
            $data = Perizinan::where('status', '2')->get();
            $tanggal = 'semua data';
        } elseif ($request->status == 'terbit') {
            $start = $request->start;
            $end = $request->end;
            $tanggal = $start . ' s/d ' . $end;
            $data = Perizinan::where('status', '1')
            ->whereBetween('updated_at', [$start, $end])
            ->get();
        } else {
            return redirect()->back()->with('not_found','Masukkan detail data yang Anda inginkan! (pilih status)');
        }

        $jml = $data->count();
        $data_view = [
            'jenis' => $request->status,
            'tanggal' => $tanggal,
            'jumlah' => $jml,
            'data' => $data
        ];

        $pdf = PDF::loadView('laporan', $data_view);
        return $pdf->download('laporan-'.$request->status.'-'.$tanggal.'.pdf');
    }
}
