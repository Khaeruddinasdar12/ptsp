<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Perizinan;
use App\Models\Sipreason;
use App\Models\Sikreason;
use App\Models\Pddreason;
use App\Models\Krkreason;
use Auth;
use App\Models\Admin;
use App\Models\Sip;
use App\Models\Sik;
use App\Models\Pendidikan;
use App\Models\Krk;
use Carbon\Carbon;
use Mail;
use Storage;
use QueryException;
use Exception;
class BidangByController extends Controller
{
	public function index(Request $request)
	{
		if (Auth::guard('admin')->user()->role != 'bidang') {
			return redirect()->route('error')->with('not_found','Kamu Tidak Memiliki Akses Bidang');
		}
		
		// $data = Perizinan::where('status', '0')->whereNull('bidang_by')->paginate(10);
		$data = Perizinan::where('status', '0')
            ->whereNull('bidang_by')
            ->where('no_tiket','LIKE','%'.$request->cari.'%')
            ->paginate(10);
		// return $data;
		return view('admin.bidang.index', ['data' => $data]);
	}

	public function reason(Request $request, $id, $jenis)
	{
		try {
			if (Auth::guard('admin')->user()->role != 'bidang') {
				return $arrayName = array(
					'status' => 'error',
					'pesan' => 'Kamu Tidak Memiliki Akses Bidang'
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
					Sipreason::where('sip_id', $id)->update(array($request->key => $request->pesan));
				} else {
					$data = new Sipreason;
					$data['sip_id'] = $id;
					$data[$request->key] = $request->pesan;
					$data->save();
				}
			} elseif($jenis == 'sik') { // JIKA SIK
				$data = Sikreason::where('sik_id', $id)->first();
				if($data) {
					Sikreason::where('sik_id', $id)->update(array($request->key => $request->pesan));
				} else {
					$data = new Sikreason;
					$data['sik_id'] = $id;
					$data[$request->key] = $request->pesan;
					$data->save();
				}
			} elseif($jenis == 'pendidikan') { // JIKA PENDIDIKAN
				$data = Pddreason::where('pendidikan_id', $id)->first();
				if($data) {
					Pddreason::where('pendidikan_id', $id)->update(array($request->key => $request->pesan));
				} else {
					$data = new Pddreason;
					$data['pendidikan_id'] = $id;
					$data[$request->key] = $request->pesan;
					$data->save();
				}
			} elseif($jenis == 'krk') { // JIKA KRK

				$data = Krkreason::where('krk_id', $id)->first();
				
				if($data) {
					Krkreason::where('krk_id', $id)->update(array($request->key => $request->pesan));
				} else {
					$data = new Krkreason;
					$data['krk_id'] = $id;
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
			if (Auth::guard('admin')->user()->role != 'bidang') {
				return $arrayName = array(
					'status' => 'error',
					'pesan' => 'Kamu Tidak Memiliki Akses Bidang'
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
			} else if ($request->izin == 'sik') {
				$data = Sikreason::where('sik_id', $id)->first();
				if($data) {
					$data->update(array($request->key => 1));
				} else {
					$data = new Sikreason;
					$data['sik_id'] = $id;
					$data[$request->key] = 1;
					$data->save();
				}
			} else if ($request->izin == 'pendidikan') {
				$data = Pddreason::where('pendidikan_id', $id)->first();
				if($data) {
					$data->update(array($request->key => 1));
				} else {
					$data = new Pddreason;
					$data['pendidikan_id'] = $id;
					$data[$request->key] = 1;
					$data->save();
				}
			} else if ($request->izin == 'krk') {
				$data = Krkreason::where('krk_id', $id)->first();
				if($data) {
					$data->update(array($request->key => 1));
				} else {
					$data = new Krkreason;
					$data['krk_id'] = $id;
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
		} catch(QueryException $e){
			return $arrayName = array(
				'status' => 'error',
				'pesan' => $e->getMessage()
			);
		}
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
// return $data;
		// return $data->sip->reason;
		
		if($data->jenis_izin == 'sik') {
			return view('admin.bidang.sik-show', ['data' => $data]);
		} elseif($data->jenis_izin == 'sip') {
			return view('admin.bidang.sip-show', ['data' => $data]);
		} elseif($data->jenis_izin == 'pendidikan') {
			return view('admin.bidang.pendidikan-show', ['data' => $data]);
		} elseif($data->jenis_izin == 'krk') {
			return view('admin.bidang.krk-show', ['data' => $data]);
		} 
	}

	public function verif(Request $request, $no_tiket)
	{
		try {
			if (Auth::guard('admin')->user()->role != 'bidang') {
				return $arrayName = array(
					'status' => 'error',
					'pesan' => 'Kamu Tidak Memiliki Akses Bidang'
				);
			}

			$data = Perizinan::where('status', '0')->whereNull('bidang_by')->where('no_tiket', $no_tiket)->first();
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

			if($data->jenis_izin == 'sik') {

				if(!$data->sik->reason) {
					return $err;
				}

				$dt = Sikreason::where('sik_id', $data->sik->id)->first();
				if($dt->nama == '' || $dt->tempat_lahir == '' || $dt->tanggal_lahir == '' || $dt->rekomendasi_op == '' || $dt->no_str == '' || $dt->awal_str == '' || $dt->akhir_str == '' || $dt->alamat == '' || $dt->nama_praktek == '' || $dt->jalan == '' || $dt->kelurahan == '' || $dt->ktp == '' || $dt->foto == '' || $dt->str == '' || $dt->ijazah == '' || $dt->rekomendasi_org == '' || $dt->surat_keterangan == '' || $dt->surat_keluasan == '' || $dt->berkas_pendukung == '') {
					return $err;
				}
				// $dt->delete();
			} elseif($data->jenis_izin == 'sip') {
				
				if(!$data->sip->reason) {
					return $err;
				}

				$dt = Sipreason::where('sip_id', $data->sip->id)->first();
				if($dt->nama == '' || $dt->tempat_lahir == '' || $dt->tanggal_lahir == '' || $dt->rekomendasi_op == '' || $dt->konsultan == '' | $dt->no_str == '' || $dt->awal_str == '' || $dt->akhir_str == '' || $dt->alamat == '' || $dt->nama_praktek1 == '' || $dt->jejaring1 == '' || $dt->jalan1 == '' || $dt->kelurahan1 == '' || $dt->ktp == '' || $dt->foto == '' || $dt->str == '' || $dt->rekomendasi_org == '' || $dt->surat_keterangan == '' || $dt->berkas_jejaring1 == '' || $dt->surat_persetujuan == '' || $dt->berkas_pendukung == '') {
					
					return $err;
				}
				if($data->sip->subizin_id == '7' && $data->sip->nama_praktek1 && $dt->jadwal1 == '') {
					return $err;
				}

				if ($data->sip->nama_praktek2 && $dt->nama_praktek2 == '') {
					return $err;
				}
				if ($data->sip->jalan2 && $dt->jalan2 == '') {
					return $err;
				}
				if ($data->sip->kelurahan2 && $dt->kelurahan2 == '') {
					return $err;
				}
				if($data->sip->subizin_id == '7' && $data->sip->nama_praktek2 && $dt->jadwal2 == '') {
					return $err;
				}

				if ($data->sip->nama_praktek3 && $dt->nama_praktek3 == '') {
					return $err;
				}
				if ($data->sip->jalan3 && $dt->jalan3 == '') {
					return $err;
				}
				if ($data->sip->kelurahan3 && $dt->kelurahan3 == '') {
					return $err;
				}
				if($data->sip->subizin_id == '7' && $data->sip->nama_praktek3 && $dt->jadwal3 == '') {
					return $err;
				}

				// $dt->delete();
			} if($data->jenis_izin == 'pendidikan') {

				if(!$data->pendidikan->reason) {
					return $err;
				}
				$dt = Pddreason::where('pendidikan_id', $data->pendidikan->id)->first();
				if($dt->nama == '' || $dt->alamat == '' || $dt->nama_yayasan == '' || $dt->nama_pendidikan == '' || $dt->no_npsn == '' || $dt->kelurahan == '' || $dt->jalan == '' || $dt->kode_pos == '' || $dt->ktp == '' || $dt->pas_foto == '' || $dt->imb == '' || $dt->akta == '' || $dt->kurikulum == '' || $dt->struktur_organisasi == '' || $dt->sk == '' || $dt->nib == '' || $dt->npsn == '' || $dt->izin_lama == '' || $dt->berkas_pendukung == '') {
					return $err;
				}
				if ($data->pendidikan->subizin->nama == 'Program Pendidikan Kursus Dan Pelatihan' && $dt->jenis_program == '') {
					return $err;
				}
				// $dt->delete();
			} if($data->jenis_izin == 'krk') {

				if(!$data->krk->reason) {
					return $err;
				}
				$dt = Krkreason::where('krk_id', $data->krk->id)->first();
				if($dt->nama == '' || $dt->nik == '' || $dt->alamat == '' || $dt->luas == '' || $dt->nama_surat == '' || $dt->nomor_surat == '' || $dt->penggunaan == '' || $dt->jenis == '' || $dt->jml_lantai == '' || $dt->jml_bangunan == '' || $dt->kelurahan == '' || $dt->jalan == '' || $dt->ktp == '' || $dt->pbb == '' || $dt->surat_tanah == '' || $dt->peta == '' || $dt->gambar == '') {
					return $err;
				}
				if ($data->krk->berkas_pendukung && $dt->berkas_pendukung == '') {
					return $err;
				}
				// $dt->delete();
			}

			$data->verif_by = Auth::guard('admin')->user()->id;
			$data->bidang_by = Auth::guard('admin')->user()->id;
			$data->status = '0';
			$data->updatedbidang_at = Carbon::now();
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

	public function tolak(Request $request, $no_tiket)
	{
		try{
			if (Auth::guard('admin')->user()->role != 'bidang') {
				return $arrayName = array(
					'status' => 'error',
					'pesan' => 'Kamu Tidak Memiliki Akses Bidang'
				);
			}

			$data = Perizinan::with('user')->where('status', '0')->whereNull('bidang_by')->where('no_tiket', $no_tiket)->first();
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

			if($data->jenis_izin == 'sik') {
				
				if(!$data->sik->reason) {
					return $err;
				}

				$dt = Sikreason::where('sik_id', $data->sik->id)->first();
				if($dt->nama == '' || $dt->tempat_lahir == '' || $dt->tanggal_lahir == '' || $dt->rekomendasi_op == '' || $dt->no_str == '' || $dt->awal_str == '' || $dt->akhir_str == '' || $dt->alamat == '' || $dt->nama_praktek == '' || $dt->jalan == '' || $dt->kelurahan == '' || $dt->ktp == '' || $dt->foto == '' || $dt->str == '' || $dt->ijazah == '' || $dt->rekomendasi_org == '' || $dt->surat_keterangan == '') {
					return $err;
				}
				if ($data->sik->surat_keluasan && $dt->surat_keluasan == '') {
					return $err;
				}
				if ($data->sik->berkas_pendukung && $dt->berkas_pendukung == '') {
					return $err;
				}
			} elseif($data->jenis_izin == 'pendidikan') {
				
				if(!$data->pendidikan->reason) {
					return $err;
				}

				$dt = Pddreason::where('pendidikan_id', $data->pendidikan->id)->first();
				if($dt->nama == '' || $dt->alamat == '' || $dt->nama_pendidikan == '' || $dt->kelurahan == '' || $dt->jalan == '' || $dt->ktp == '' || $dt->pas_foto == '' || $dt->akta == '' || $dt->kurikulum == '' || $dt->struktur_organisasi == '' || $dt->sk == '' || $dt->nib == '') {
					return $err;
				}
				if ($data->pendidikan->npsn && $dt->npsn == '') {
					return $err;
				}
				if ($data->pendidikan->izin_lama && $dt->izin_lama == '') {
					return $err;
				}
				if ($data->pendidikan->berkas_pendukung && $dt->berkas_pendukung == '') {
					return $err;
				}
			} elseif($data->jenis_izin == 'krk') {
				
				if(!$data->krk->reason) {
					return $err;
				}

				$dt = Krkreason::where('krk_id', $data->krk->id)->first();
				if($dt->nama == '' || $dt->nik == '' ||  $dt->alamat == '' || $dt->luas == '' || $dt->nama_surat == '' || $dt->nomor_surat == '' || $dt->penggunaan == '' || $dt->jenis == '' || $dt->jml_lantai == '' || $dt->jml_bangunan == '' || $dt->kelurahan == '' || $dt->jalan == '' || $dt->ktp == '' || $dt->pbb == '' || $dt->surat_tanah == '' || $dt->peta == '' || $dt->gambar == '') {
					return $err;
				}
				if ($data->krk->berkas_pendukung && $dt->berkas_pendukung == '') {
					return $err;
				}
			} elseif($data->jenis_izin == 'sip') {
				
				if(!$data->sip->reason) {
					return $err;
				}

				$dt = Sipreason::where('sip_id', $data->sip->id)->first();
				if($dt->nama == '' || $dt->tempat_lahir == '' || $dt->tanggal_lahir == '' || $dt->rekomendasi_op == '' || $dt->no_str == '' || $dt->awal_str == '' || $dt->akhir_str == '' || $dt->alamat == '' || $dt->nama_praktek1 == '' || $dt->jalan1 == '' || $dt->kelurahan1 == '' || $dt->ktp == '' || $dt->foto == '' || $dt->str == '' || $dt->rekomendasi_org == '' || $dt->surat_keterangan == '') {
					
					return $err;
				}
				if($data->sip->subizin_id == '7' && $data->sip->nama_praktek1 && $dt->jadwal1 == '') {
					return $err;
				}

				if ($data->sip->nama_praktek2 && $dt->nama_praktek2 == '') {
					return $err;
				}
				if ($data->sip->jalan2 && $dt->jalan2 == '') {
					return $err;
				}
				if ($data->sip->kelurahan2 && $dt->kelurahan2 == '') {
					return $err;
				}
				if($data->sip->subizin_id == '7' && $data->sip->nama_praktek2 && $dt->jadwal2 == '') {
					return $err;
				}

				if ($data->sip->nama_praktek3 && $dt->nama_praktek3 == '') {
					return $err;
				}
				if ($data->sip->jalan3 && $dt->jalan3 == '') {
					return $err;
				}
				if ($data->sip->kelurahan3 && $dt->kelurahan3 == '') {
					return $err;
				}
				if($data->sip->subizin_id == '7' && $data->sip->nama_praktek3 && $dt->jadwal3 == '') {
					return $err;
				}

				if ($data->sip->surat_persetujuan && $dt->surat_persetujuan == '') {
					return $err;
				}
				if ($data->sip->berkas_pendukung && $dt->berkas_pendukung == '') {
					return $err;
				}
			} 

			$data->verif_by = Auth::guard('admin')->user()->id;
			$data->status = '2';
			$data->ket = $request->ket;
			$data->updated_at = Carbon::now();
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
				return $arrayName = array('status' => 'error' , 'pesan' => 'Gagal mengirim email' );
			}
			$data->save();
			

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


}
