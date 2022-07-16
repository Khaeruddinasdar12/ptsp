<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Perizinan;
use App\Models\Sip;
use Auth;
use Mail;
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

		$no_rekomendasi = strtoupper(substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, 6));
		$sip->no_rekomendasi = 'Rek-'.$no_rekomendasi;
		$sip->save();
		$data->save();
		// return $data;

		return $arrayName = array(
			'status' => 'success',
			'pesan' => 'Berkas dengan no. tiket '.$no_tiket.' telah diverifikasi!'
		);
	}

	public function tolak(Request $request, $no_tiket)
	{
		// return Carbon::now();
		$validasi = $this->validate($request, [
            'ket'     => 'required|string',
        ]);

		if (Auth::guard('admin')->user()->role != 'teknis') {
			return redirect()->route('error')->with('not_found','Kamu Tidak Memiliki Akses Teknis');
		}
		
		$data = Perizinan::with('user')->where('status', '0')->whereNotNull('bidang_by')->whereNull('teknis_by')->where('no_tiket', $no_tiket)->first();
		// return $data;
		if(!$data) {
			return redirect()->route('error')->with('not_found','Terjadi Kesalahan Data!');
		}

		$data->verif_by = Auth::guard('admin')->user()->id;
		$data->status = '2';
		$data->ket = $request->ket;
		$data->updated_at = Carbon::now();
		$data->save();
		// return $data;
		$email = $data->user->email;
		$judul= "Notifikasi penolakan ". config('app.name');
		$data_send = array(
			'no_tiket' => $no_tiket,
			'name' => $data->user->name,
			'status' => 'TIDAK DISETUJUI',
			'pesan' => 'Silakan Melakukan Perbaikan Berkas Pada Aplikasi',
			'keterangan' => $request->ket,
			'class' => 'danger',
		);
		Mail::send('email', $data_send, function($mail) use($email, $judul) {
			$mail->to($email, 'no-reply')
			->subject($judul);
			$mail->from('ptsp@gmail.com', config('app.name'));        
		});
		if (Mail::failures()) {
			return $arrayName = array('status' => 'error' , 'pesan' => 'Gagal menigirim email' );
		}
		return redirect()->route('perizinan.teknis.index')->with('success','Pengajuan Izin Dengan No Tiket '.$no_tiket.' Telah Ditolak!');
	}
}
