<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Perizinan;
use App\Models\Sip;
use App\Models\Sik;
use App\Models\Sipreason;
use App\Models\Sikreason;
use QueryException;
use Exception;
use App\Models\Admin;
use Auth;
use Mail;
use Carbon\Carbon;
use QrCode;
use Storage;
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
		if($data->jenis_izin == 'sik') {
			return view('admin.teknis.sik-show', ['data' => $data]);
		} elseif($data->jenis_izin == 'sip') {
			return view('admin.teknis.sip-show', ['data' => $data]);
		}
		return view('admin.teknis.show', ['data' => $data]);
	}

	public function reason(Request $request, $id, $jenis)
	{
		try {
			if (Auth::guard('admin')->user()->role != 'teknis') {
				return $arrayName = array(
					'status' => 'error',
					'pesan' => 'Kamu Tidak Memiliki Akses Teknis'
				);
			}
			if($request->pesan == '1') {
				return $arrayName = array(
					'status' => 'error',
					'pesan' => 'Pesan tak dapat diproses!'
				);
			}
			if($jenis == 'sip') { // JIKA SIP
				$data = Sipreason::where('sip_id', $id)->first();
				if($data) {
					$data->update(array($request->key => $request->pesan));
				} else {
					$data = new Sipreason;
					$data['sip_id'] = $id;
					$data[$request->key] = $request->pesan;
					$data->save();
				}
			} elseif($jenis == 'sik') { // JIKA SIK
				$data = Sikreason::where('sik_id', $id)->first();
				if($data) {
					$data->update(array($request->key => $request->pesan));
				} else {
					$data = new Sikreason;
					$data['sik_id'] = $id;
					$data[$request->key] = $request->pesan;
					$data->save();
				}
			}
			
			return $arrayName = array(
				'status' => 'success',
				'pesan' => 'Alasan ditambahkan!'
			);
		} catch(Exception $e){
			return $arrayName = array(
				'status' => 'error',
				'pesan' => $e->getMessage()
			);
		}catch(QueryException $e){
			return $arrayName = array(
				'status' => 'error',
				'pesan' => $e->getMessage()
			);
		}
	}

	public function ceklis(Request $request, $id)
	{
		try {
			if (Auth::guard('admin')->user()->role != 'teknis') {
				return $arrayName = array(
					'status' => 'error',
					'pesan' => 'Kamu Tidak Memiliki Akses Teknis'
				);
			}

			if($request->izin == 'sip') {
				$data = Sipreason::where('sip_id', $id)->first();
				if($data) {
					$data->update(array($request->key => 1));
				} else {
					$data = new Sipreason;
					$data['sip_id'] = $id;
					$data[$request->key] = 1;
					$data->save();
				}
			} elseif($request->izin == 'sik') {
				$data = Sikreason::where('sik_id', $id)->first();
				if($data) {
					$data->update(array($request->key => 1));
				} else {
					$data = new Sikreason;
					$data['sik_id'] = $id;
					$data[$request->key] = 1;
					$data->save();
				}
			}
			return $arrayName = array(
				'status' => 'success',
				'pesan' => $request->head. ' diterima!'
			);	
			
		} catch(Exception $e){
			return $arrayName = array(
				'status' => 'error',
				'pesan' => $e->getMessage()
			);
		}catch(QueryException $e){
			return $arrayName = array(
				'status' => 'error',
				'pesan' => $e->getMessage()
			);
		}
	}

	public function tolak(Request $request, $no_tiket)
	{
		try{
			if (Auth::guard('admin')->user()->role != 'teknis') {
				return $arrayName = array(
					'status' => 'error',
					'pesan' => 'Kamu Tidak Memiliki Akses Teknis'
				);
			}

			$data = Perizinan::with('user')->where('status', '0')->whereNotNull('bidang_by')->whereNull('teknis_by')->where('no_tiket', $no_tiket)->first();
		// return $data;
			if(!$data) {
				return $arrayName = array(
					'status' => 'error',
					'pesan' => 'Terjadi Kesalahan Data!'
				);
			}

			$err =array(
				'status' => 'warning',
				'pesan' => 'Mohon periksa setiap baris!'
			);

			if($data->jenis_izin == 'sik') { //JIKA SIK
				
				if(!$data->sik->reason) {
					return $err;
				}

				$dt = Sikreason::where('sik_id', $data->sik->id)->first();
				if($dt->nama == '' || $dt->tempat_lahir == '' || $dt->tanggal_lahir == '' || $dt->no_str == '' || $dt->awal_str == '' || $dt->akhir_str == '' || $dt->alamat == '' || $dt->nama_praktek == '' || $dt->jalan == '' || $dt->kelurahan == '' || $dt->ktp == '' || $dt->foto == '' || $dt->str == '' || $dt->ijazah == '' || $dt->rekomendasi_org == '' || $dt->surat_keterangan == '') {
					return $err;
				}
				if ($dt->surat_keluasan == '') {
					return $err;
				}
				if ($dt->berkas_pendukung == '') {
					return $err;
				}
			} 

			$data->verif_by = Auth::guard('admin')->user()->id;
			$data->status = '2'; //tolak
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

			return $arrayName = array(
				'status' => 'success',
				'pesan' => 'Pengajuan Izin Dengan No Tiket '.$no_tiket.' Telah Ditolak!'
			);
		} catch(Exception $e){
			return $arrayName = array(
				'status' => 'error',
				'pesan' => $e->getMessage()
			);
		}catch(QueryException $e){
			return $arrayName = array(
				'status' => 'error',
				'pesan' => $e->getMessage()
			);
		}
	}

	public function verif(Request $request, $no_tiket)
	{
		try {
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
			$err =array(
				'status' => 'warning',
				'pesan' => 'Mohon centang setiap baris!'
			);

			if($data->jenis_izin == 'sik') {
				if(!$data->sik->reason) {
					return $err;
				}
				$dt = Sikreason::where('sik_id', $data->sik->id)->first();
				if($dt->nama != '1' || $dt->tempat_lahir != '1' || $dt->tanggal_lahir != '1' || $dt->no_str != '1' || $dt->awal_str != '1' || $dt->akhir_str != '1' || $dt->alamat != '1' || $dt->nama_praktek != '1' || $dt->jalan != '1' || $dt->kelurahan != '1' || $dt->ktp != '1' || $dt->foto != '1' || $dt->str != '1' || $dt->ijazah != '1' || $dt->rekomendasi_org != '1' || $dt->surat_keterangan != '1') {
					return $err;
				}
				if ($dt->surat_keluasan && $dt->surat_keluasan != '1') {
					return $err;
				}
				if ($dt->berkas_pendukung && $dt->berkas_pendukung != '1') {
					return $err;
				}
				// $dt->delete();
				$kode = $data->sik->subizin->kode; //kode SUBIZIN
				$no_kode = $data->sik->latest()->first();//Nomor Kode Surat
			} elseif($data->jenis_izin == 'sip') {
				if(!$data->sip->reason) {
					return $err;
				}

				$dt = Sipreason::where('sip_id', $data->sip->id)->first();
				if($dt->nama != '1' || $dt->tempat_lahir != '1' || $dt->tanggal_lahir != '1' || $dt->no_str != '1' || $dt->awal_str != '1' || $dt->akhir_str != '1' || $dt->alamat != '1' || $dt->nama_praktek1 != '1' || $dt->jalan1 != '1' || $dt->kelurahan1 != '1' || $dt->ktp != '1' || $dt->foto != '1' || $dt->str != '1' || $dt->rekomendasi_org != '1' || $dt->surat_keterangan != '1') {
					
					return $err;
				}
				if ($dt->nama_praktek2 && $dt->nama_praktek2 != '1') {
					return $err;
				}
				if ($dt->jalan2 && $dt->jalan2 != '1') {
					return $err;
				}
				if ($dt->kelurahan2 && $dt->kelurahan2 != '1') {
					return $err;
				}
				if ($dt->nama_praktek3 && $dt->nama_praktek3 != '1') {
					return $err;
				}
				if ($dt->jalan3 && $dt->jalan3 != '1') {
					return $err;
				}
				if ($dt->kelurahan3 && $dt->kelurahan3 != '1') {
					return $err;
				}
				if ($dt->surat_persetujuan && $dt->surat_persetujuan != '1') {
					return $err;
				}
				if ($dt->berkas_pendukung && $dt->berkas_pendukung != '1') {
					return $err;
				}
				$dt->delete();
				$kode = $data->sip->subizin->kode; //kode SUBIZIN
				$no_kode = $data->sip->latest()->first();//Nomor Kode Surat
			}

// return $err;
			// generate qr-code
			$route = config('app.url').'/cek-sertifikat/'.$no_tiket;
			$image = QrCode::format('png')
			->size(200)->errorCorrection('H')
			->generate($route);
			$output_file = 'qr-code/' . $no_tiket . '.png';
			Storage::disk('public')->put($output_file, $image);
			// end generate qrcode
// return $err;
			$time = Carbon::now();
			$bulan = $time->month;
			$tahun = $time->year;

			$uniqkode = $no_kode->id + 1;
			if(strlen($uniqkode) == 1) {
				$uniqkode = '00'.$uniqkode;
			} elseif(strlen($uniqkode) == 1) {
				$uniqkode = '0'.$uniqkode;
			}
			// return $err;
			$no_rekomendasi = '440/'.$uniqkode.'/Rek.'.$kode.'/DKK/'.$bulan.'/'.$tahun;
			$data->sik->update(array('no_rekomendasi' => $no_rekomendasi));
			$data->verif_by = Auth::guard('admin')->user()->id;
			$data->teknis_by = Auth::guard('admin')->user()->id;
			$data->status = '0';
			$data->updated_at = Carbon::now();
			$data->save();

			return $arrayName = array(
				'status' => 'success',
				'pesan' => 'Berkas dengan no. tiket '.$no_tiket.' telah diverifikasi! Data berhasil dikirim!'
			);

		} catch(Exception $e){
			return $arrayName = array(
				'status' => 'error',
				'pesan' => $e->getMessage()
			);
		}catch(QueryException $e){
			return $arrayName = array(
				'status' => 'error',
				'pesan' => $e->getMessage()
			);
		}
	}
}
