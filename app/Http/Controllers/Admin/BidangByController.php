<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Perizinan;
use App\Models\Sipreason;
use Auth;
use App\Models\Admin;
use App\Models\Sip;
use Carbon\Carbon;
use Mail;
use File;
use Storage;
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

	public function reason(Request $request, $id)
	{
		if (Auth::guard('admin')->user()->role != 'bidang') {
			return redirect()->route('error')->with('not_found','Kamu Tidak Memiliki Akses Bidang');
		}
		$data = Sipreason::where('sip_id', $id)->first();
		if($data) {
			Sipreason::where('sip_id', $id)->update(array($request->nama => $request->pesan));
		} else {
			Sipreason::create(array([
				'sip_id' => $id,
				$request->nama => $request->pesan
			]));
		}
		return redirect()->back()->with('success','Alasan ditambahkan!');
	}

	public function show($no_tiket)
	{
		if (Auth::guard('admin')->user()->role != 'bidang') {
			return redirect()->route('error')->with('not_found','Kamu Tidak Memiliki Akses Bidang');
		}
		
		$data = Perizinan::where('status', '0')->whereNull('bidang_by')->where('no_tiket', $no_tiket)->first();
		
		if(!$data) {
			abort(404);
		}

		// return $data->sip->reason;
		
		if($data->jenis_izin == 'sik') {
			return view('admin.bidang.sik-show', ['data' => $data]);
		} elseif($data->jenis_izin == 'sip') {
			return view('admin.bidang.sip-show', ['data' => $data]);
		}
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

	public function tolak(Request $request, $no_tiket)
	{
		// return Carbon::now();
		if (Auth::guard('admin')->user()->role != 'bidang') {
			return redirect()->route('error')->with('not_found','Kamu Tidak Memiliki Akses Bidang');
		}
		
		$data = Perizinan::with('user')->where('status', '0')->whereNull('bidang_by')->where('no_tiket', $no_tiket)->first();
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

		return redirect()->route('perizinan.bidang.index')->with('success','Pengajuan Izin Dengan No Tiket '.$no_tiket.' Telah Ditolak!');
	}

	public function email(Request $request, $id) //post tolak alumni
	{
		$validasi = $this->validate($request, [
			'pesan'     => 'required|string',
		]);

		$data = User::findOrFail($id);
        // $data->is_active = 'tolak';
		$data->komentar = $request->pesan;
		$data->save();

		$email = $data->email;
		$judul= "Notifikasi penolakan ". config('app.name');
		$data_send = array(
			'name' => $data->name,
			'status' => 'TIDAK DISETUJUI',
			'pesan' => 'Silakan lakukan pendaftaran kembali pada aplikasi',
			'keterangan' => $data->komentar,
			'class' => 'danger',
		);
		Mail::send('email', $data_send, function($mail) use($email, $judul) {
			$mail->to($email, 'no-reply')
			->subject($judul);
			$mail->from('ikadipa.id@gmail.com', config('app.name'));        
		});
		if (Mail::failures()) {
			return $arrayName = array('status' => 'error' , 'pesan' => 'Gagal menigirim email' );
		}

		return redirect()->back()->with('success', 'Data ini telah ditolak');
	}


}
