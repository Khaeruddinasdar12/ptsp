<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;
use App\Models\Perizinan;
use PDF;
class KadisController extends Controller
{
    public function index()
	{
		if (Auth::guard('admin')->user()->role != 'kadis') {
			return redirect()->route('error')->with('not_found','Kamu Tidak Memiliki Akses Teknis');
		}
		
		$data = Perizinan::where('status', '0')->whereNotNull('bidang_by')->whereNotNull('teknis_by')->whereNull('kadis_by')->paginate(10);
		// return $data;
		return view('admin.kadis.index', ['data' => $data]);
	}

	public function show($no_tiket)
	{
		if (Auth::guard('admin')->user()->role != 'kadis') {
			return redirect()->route('error')->with('not_found','Kamu Tidak Memiliki Akses Kadis');
		}
		
		$data = Perizinan::where('status', '0')->whereNotNull('bidang_by')->whereNotNull('teknis_by')->whereNull('kadis_by')->where('no_tiket', $no_tiket)->with('sip')->first();
		if(!$data) {
			abort(404);
		}
		// return $data;
		return view('admin.kadis.show', ['data' => $data]);
	}

	public function verif(Request $request, $no_tiket) // menerbitkan sertifikat
	{
		// return Carbon::now();
		if (Auth::guard('admin')->user()->role != 'kadis') {
			return $arrayName = array(
				'status' => 'error',
				'pesan' => 'Kamu Tidak Memiliki Akses Kadis'
			);
		}
	
		$data = Perizinan::where('status', '0')->whereNotNull('bidang_by')->whereNotNull('teknis_by')->whereNull('kadis_by')->where('no_tiket', $no_tiket)->first();
		
		if(!$data) {
			return $arrayName = array(
				'status' => 'error',
				'pesan' => 'Terjadi Kesalahan Data'
			);
		}
		$no_surat = substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, 6);
		$data->no_surat = 'Sur-'.$no_surat;
		$data->status = '1';
		$data->verif_by = Auth::guard('admin')->user()->id;
		$data->ket = null;
		$data->kadis_by = Auth::guard('admin')->user()->id;
		$data->updated_at = Carbon::now();
		$data->save();
		// return $data;

		return $arrayName = array(
			'status' => 'success',
			'pesan' => 'Sertifikat dengan no. tiket '.$no_tiket.' telah diterbitkan!'
		);
	}

	public function sertifikat()
	{
		// ini_set('max_execution_time', 300);
		$data = [
            'nama' => 'Khaeruddin Asdar'
        ];
           
        $pdf = PDF::loadView('sertifikat', $data);
     
        return $pdf->stream();
	}
}
