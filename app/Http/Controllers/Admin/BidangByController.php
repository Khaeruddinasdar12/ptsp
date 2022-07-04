<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Perizinan;
use Auth;
use Carbon\Carbon;
class BidangByController extends Controller
{
	public function index()
	{
		if (Auth::guard('admin')->user()->role != 'bidang') {
			return redirect()->route('error')->with('not_found','Kamu Tidak Memiliki Akses Bidang');
		}
		
		$data = Perizinan::where('status', '0')->whereNull('bidang_by')->paginate(10);
		// return $data;
		return view('admin.bidang.index', ['data' => $data]);
	}

	public function show($no_tiket)
	{
		if (Auth::guard('admin')->user()->role != 'bidang') {
			return redirect()->route('error')->with('not_found','Kamu Tidak Memiliki Akses Bidang');
		}
		
		$data = Perizinan::where('status', '0')->whereNull('bidang_by')->where('no_tiket', $no_tiket)->with('sip')->first();
		if(!$data) {
			abort(404);
		}
		// return $data;
		return view('admin.bidang.show', ['data' => $data]);
	}

	public function tolak(Request $request, $no_tiket)
	{
		// return Carbon::now();
		if (Auth::guard('admin')->user()->role != 'bidang') {
			return redirect()->route('error')->with('not_found','Kamu Tidak Memiliki Akses Bidang');
		}
		
		$data = Perizinan::where('status', '0')->whereNull('bidang_by')->where('no_tiket', $no_tiket)->first();
		if(!$data) {
			return redirect()->route('error')->with('not_found','Terjadi Kesalahan Data!');
		}

		$data->verif_by = Auth::guard('admin')->user()->id;
		$data->status = '2';
		$data->ket = $request->ket;
		$data->updated_at = Carbon::now();
		$data->save();
		// return $data;
		return redirect()->route('perizinan.bidang.index')->with('success','Pengajuan Izin Dengan No Tiket '.$no_tiket.' Telah Ditolak!');
	}

	public function verif(Request $request, $no_tiket)
	{
		// return Carbon::now();
		if (Auth::guard('admin')->user()->role != 'bidang') {
			return redirect()->route('error')->with('not_found','Kamu Tidak Memiliki Akses Bidang');
		}
		
		$data = Perizinan::where('status', '0')->whereNull('bidang_by')->where('no_tiket', $no_tiket)->first();
		if(!$data) {
			return redirect()->route('error')->with('not_found','Terjadi Kesalahan Data!');
		}

		$data->verif_by = null;
		$data->ket = null;
		$data->bidang_by = Auth::guard('admin')->user()->id;
		$data->status = '0';
		$data->updated_at = Carbon::now();
		$data->save();
		// return $data;

		return $arrayName = array(
            'status' => 'success',
            'pesan' => 'Berkas dengan no. tiket '.$no_tiket.' telah diverifikasi! Data berhasil dikirim!'
        );
		return redirect()->route('perizinan.bidang.index')->with('success','Pengajuan Izin Dengan No Tiket '.$no_tiket.' Telah Ditolak!');
	}
}
