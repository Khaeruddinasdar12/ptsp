<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Perizinan;
use App\Models\Sip;
use Auth;
use Carbon\Carbon;
class TeknisByController extends Controller
{
	public function index()
	{
		if (Auth::guard('admin')->user()->role != 'teknis') {
			return redirect()->route('error')->with('not_found','Kamu Tidak Memiliki Akses Teknis');
		}
		
		$data = Perizinan::where('status', '0')->whereNotNull('bidang_by')->whereNull('teknis_by')->paginate(10);
		// return $data;
		return view('admin.teknis.index', ['data' => $data]);
	}

	public function show($no_tiket)
	{
		if (Auth::guard('admin')->user()->role != 'teknis') {
			return redirect()->route('error')->with('not_found','Kamu Tidak Memiliki Akses Teknis');
		}
		
		$data = Perizinan::where('status', '0')->whereNotNull('bidang_by')->whereNull('teknis_by')->where('no_tiket', $no_tiket)->with('sip')->first();
		if(!$data) {
			abort(404);
		}
		// return $data;
		return view('admin.teknis.show', ['data' => $data]);
	}

	public function tolak(Request $request, $no_tiket)
	{
		// return Carbon::now();
		if (Auth::guard('admin')->user()->role != 'teknis') {
			return redirect()->route('error')->with('not_found','Kamu Tidak Memiliki Akses Teknis');
		}
		
		$data = Perizinan::where('status', '0')->whereNotNull('bidang_by')->whereNull('teknis_by')->where('no_tiket', $no_tiket)->first();
		if(!$data) {
			return redirect()->route('error')->with('not_found','Terjadi Kesalahan Data!');
		}

		$data->verif_by = Auth::guard('admin')->user()->id;
		$data->status = '2';
		$data->ket = $request->ket;
		$data->updated_at = Carbon::now();
		$data->save();
		// return $data;
		return redirect()->route('perizinan.teknis.index')->with('success','Pengajuan Izin Dengan No Tiket '.$no_tiket.' Telah Ditolak!');
	}

	public function verif(Request $request, $no_tiket)
	{
		// return Carbon::now();
		if (Auth::guard('admin')->user()->role != 'teknis') {
			return $arrayName = array(
				'status' => 'error',
				'pesan' => 'Kamu Tidak Memiliki Akses Teknis'
			);
		}
		
		$data = Perizinan::where('status', '0')->whereNotNull('bidang_by')->whereNull('teknis_by')->where('no_tiket', $no_tiket)->first();
		if(!$data) {
			return $arrayName = array(
				'status' => 'error',
				'pesan' => 'Terjadi Kesalahan Data'
			);
		}
		$sip = Sip::where('perizinan_id', $data->id)->first();
		$data->verif_by = Auth::guard('admin')->user()->id;
		$data->ket = null;
		$data->teknis_by = Auth::guard('admin')->user()->id;
		$data->updated_at = Carbon::now();

		$no_rekomendasi = substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, 6);
		$sip->no_rekomendasi = 'Rek-'.$no_rekomendasi;
		$sip->save();
		$data->save();
		// return $data;

		return $arrayName = array(
			'status' => 'success',
			'pesan' => 'Berkas dengan no. tiket '.$no_tiket.' telah diverifikasi!'
		);
	}
}
