<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Perizinan;
use App\Models\Sip;
use App\Models\Sik;
use App\Models\Pendidikan;
use App\Models\Krk;
use App\Models\Sipreason;
use App\Models\Sikreason;
use App\Models\Pddreason;
use App\Models\Krkreason;
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
	public function index(Request $request)
	{
		if (Auth::guard('admin')->user()->role != 'teknis') {
			return redirect()->route('error')->with('not_found','Kamu Tidak Memiliki Akses Teknis');
		}
		
		$data = Perizinan::where('status', '0')
		->whereNotNull('bidang_by')
		->whereNull('teknis_by')
		->where('no_tiket','LIKE','%'.$request->cari.'%')
		->paginate(10);
		// return $data;
		return view('admin.teknis.index', ['data' => $data]);
	}

	public function show($no_tiket)
	{
		if (Auth::guard('admin')->user()->role != 'teknis') {
			return redirect()->route('error')->with('not_found','Kamu Tidak Memiliki Akses Teknis');
		}
		
		$data = Perizinan::where('status', '0')->whereNotNull('bidang_by')->whereNull('teknis_by')->where('no_tiket', $no_tiket)->first();
		if(!$data) {
			abort(404);
		}
		if($data->jenis_izin == 'sik') {
			return view('admin.teknis.sik-show', ['data' => $data]);
		} elseif($data->jenis_izin == 'sip') {
			return view('admin.teknis.sip-show', ['data' => $data]);
		} elseif($data->jenis_izin == 'pendidikan') {
			return view('admin.teknis.pendidikan-show', ['data' => $data]);
		} elseif($data->jenis_izin == 'krk') {
			return view('admin.teknis.krk-show', ['data' => $data]);
		}	
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
			} elseif($jenis == 'krk') { // JIKA PENDIDIKAN
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
				if($dt->nama == '' || $dt->tempat_lahir == '' || $dt->tanggal_lahir == '' || $dt->rekomendasi_op =='' || $dt->no_str == '' || $dt->awal_str == '' || $dt->akhir_str == '' || $dt->alamat == '' || $dt->nama_praktek == '' || $dt->jalan == '' || $dt->kelurahan == '' || $dt->ktp == '' || $dt->foto == '' || $dt->str == '' || $dt->ijazah == '' || $dt->rekomendasi_org == '' || $dt->surat_keterangan == '' || $dt->surat_keluasan == '' || $dt->berkas_pendukung == '') {
					return $err;
				}
			} elseif($data->jenis_izin == 'pendidikan') {
				
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

			} elseif($data->jenis_izin == 'sip') {
				
				if(!$data->sip->reason) {
					return $err;
				}

				$dt = Sipreason::where('sip_id', $data->sip->id)->first();
				if($dt->nama == '' || $dt->tempat_lahir == '' || $dt->tanggal_lahir == '' || $dt->rekomendasi_op =='' || $dt->konsultan == '' || $dt->no_str == '' || $dt->awal_str == '' || $dt->akhir_str == '' || $dt->alamat == '' || $dt->nama_praktek1 == '' || $dt->jejaring1 == '' || $dt->jejaring1 == '' || $dt->jalan1 == '' || $dt->kelurahan1 == '' || $dt->ktp == '' || $dt->foto == '' || $dt->str == '' || $dt->rekomendasi_org == '' || $dt->surat_keterangan == '' || $dt->berkas_jejaring1 == '' || $dt->surat_persetujuan == '' || $dt->berkas_pendukung == '' || $dt->berkas_jejaring1 == '') {
					
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
			}

			$data->verif_by = Auth::guard('admin')->user()->id;
			$data->status = '2'; //tolak
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
				return $arrayName = array('status' => 'error' , 'pesan' => 'Gagal menigirim email' );
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
				if($dt->nama != '1' || $dt->tempat_lahir != '1' || $dt->tanggal_lahir != '1' || $dt->rekomendasi_op !='1' || $dt->no_str != '1' || $dt->awal_str != '1' || $dt->akhir_str != '1' || $dt->alamat != '1' || $dt->nama_praktek != '1' || $dt->jalan != '1' || $dt->kelurahan != '1' || $dt->ktp != '1' || $dt->foto != '1' || $dt->str != '1' || $dt->ijazah != '1' || $dt->rekomendasi_org != '1' || $dt->surat_keterangan != '1' || $dt->surat_keluasan != '1' || $dt->berkas_pendukung != '1') {
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
				if($dt->nama != '1' || $dt->konsultan != '1' || $dt->tempat_lahir != '1' || $dt->tanggal_lahir != '1' || $dt->rekomendasi_op != '1' || $dt->no_str != '1' || $dt->awal_str != '1' || $dt->akhir_str != '1' || $dt->alamat != '1' || $dt->nama_praktek1 != '1' || $dt->jejaring1 != '1' || $dt->jalan1 != '1' || $dt->kelurahan1 != '1' || $dt->ktp != '1' || $dt->foto != '1' || $dt->str != '1' || $dt->rekomendasi_org != '1' || $dt->surat_keterangan != '1' || $dt->berkas_jejaring1 != '1' || $dt->surat_persetujuan != '1' || $dt->berkas_pendukung != '1') {
					
					return $err;
				}
				if($data->sip->subizin_id == '7' && $data->sip->nama_praktek1 && $dt->jadwal1 == '') {
					return $err;
				}

				if ($data->sip->nama_praktek2 && $dt->nama_praktek2 != '1') {
					return $err;
				}
				if ($data->sip->jalan2 && $dt->jalan2 != '1') {
					return $err;
				}
				if ($data->sip->kelurahan2 && $dt->kelurahan2 != '1') {
					return $err;
				}
				if($data->sip->subizin_id == '7' && $data->sip->nama_praktek2 && $dt->jadwal2 == '') {
					return $err;
				}

				if ($data->sip->nama_praktek3 && $dt->nama_praktek3 != '1') {
					return $err;
				}
				if ($data->sip->jalan3 && $dt->jalan3 != '1') {
					return $err;
				}
				if ($data->sip->kelurahan3 && $dt->kelurahan3 != '1') {
					return $err;
				}
				if($data->sip->subizin_id == '7' && $data->sip->nama_praktek3 && $dt->jadwal3 == '') {
					return $err;
				}
				// $dt->delete();
				$kode = $data->sip->subizin->kode; //kode SUBIZIN
				$no_kode = $data->sip->latest()->first();//Nomor Kode Surat
			} if($data->jenis_izin == 'pendidikan') {

				if(!$data->pendidikan->reason) {
					return $err;
				}
				$dt = Pddreason::where('pendidikan_id', $data->pendidikan->id)->first();
				if($dt->nama != '1' || $dt->alamat != '1' || $dt->nama_yayasan != '1' || $dt->nama_pendidikan != '1' || $dt->no_npsn != '1' || $dt->kelurahan != '1' || $dt->jalan != '1' || $dt->ktp != '1' || $dt->pas_foto != '1' || $dt->imb != '1' || $dt->akta != '1' || $dt->kurikulum != '1' || $dt->struktur_organisasi != '1' || $dt->sk != '1' || $dt->nib != '1' || $dt->npsn != '1' || $dt->izin_lama != '1' || $dt->berkas_pendukung != '1') {
					return $err;
				}
				if ($data->pendidikan->subizin->nama == 'Program Pendidikan Kursus Dan Pelatihan' && $dt->jenis_program != '1') {
					return $err;
				}

				if($data->pendidikan->no_berita_acara == '') { return $this->err('Nomor Berita Acara'); }
				if($data->pendidikan->berita_acara == '') { return $this->err('Berkas Berita Acara'); }
				if($data->pendidikan->gambar1 == '') { return $this->err('Lampiran Gambar 1'); }
				if($data->pendidikan->gambar2 == '') { return $this->err('Lampiran Gambar 2'); }
				// $dt->delete();
				$kode =  $data->pendidikan->subizin->kode; //kode SUBIZIN
				$no_kode = $data->pendidikan->latest()->first();//Nomor Kode Surat
			} if($data->jenis_izin == 'krk') {

				if(!$data->krk->reason) {
					return $err;
				}
				$dt = Krkreason::where('krk_id', $data->krk->id)->first();
				if($dt->nama != '1' || $dt->nik != '1' || $dt->alamat != '1' || $dt->luas != '1' || $dt->nama_surat != '1' || $dt->nomor_surat != '1' 	|| $dt->jml_lantai != '1' || $dt->jml_bangunan != '1' || $dt->kelurahan != '1' || $dt->jalan != '1' || $dt->ktp != '1' || $dt->pbb != '1' || $dt->surat_tanah != '1' || $dt->peta != '1' || $dt->gambar != '1') {
					return $err;
				}
				if ($data->krk->berkas_pendukung && $dt->berkas_pendukung != '1') {
					return $err;
				}

				if($data->krk->kdb == '' || $data->krk->klb == '' || $data->krk->kdh == '' || $data->krk->jml_lantai_max == '' || $data->krk->lebar_jalan == '' || $data->krk->gsp == '' || $data->krk->gsb == '' || $data->krk->klasifikasi == '') {
					return $err =array(
						'status' => 'warning',
						'pesan' => 'Setiap Data KRK Wajib diisi!'
					);
				}
				// $dt->delete();
				$kode = '';
				$no_kode = $data->krk->latest()->first();//Nomor Kode Surat

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
			
			$time = Carbon::now();
			$bulan = $time->month;
			$tahun = $time->year;

			$uniqkode = $no_kode->id + 1;
			if(strlen($uniqkode) == 1) {
				$uniqkode = '00'.$uniqkode;
			} elseif(strlen($uniqkode) == 1) {
				$uniqkode = '0'.$uniqkode;
			}

			if($data->jenis_izin == 'sip') {
				$no_rekomendasi = '440/'.$uniqkode.'/Rek.'.$kode.'/DKK/'.$bulan.'/'.$tahun;
				$data->sip->update(array('no_rekomendasi' => $no_rekomendasi));
			} elseif($data->jenis_izin == 'sik') {
				$no_rekomendasi = '440/'.$uniqkode.'/Rek.'.$kode.'/DKK/'.$bulan.'/'.$tahun;
				$data->sik->update(array('no_rekomendasi' => $no_rekomendasi));
			} elseif($data->jenis_izin == 'pendidikan') {
				$no_rekomendasi = '503/'.$uniqkode.'/'.$kode.'/DPM-PTSP/'.$bulan.'/'.$tahun;
				$data->pendidikan->update(array('no_rekomendasi' => $no_rekomendasi));
			}  elseif($data->jenis_izin == 'krk') {
				$no_rekomendasi = $uniqkode.'/RekoTeknis/'.$bulan.'/'.$tahun;
				$data->krk->update(array('no_rekomendasi' => $no_rekomendasi));
			} 
			$data->verif_by = Auth::guard('admin')->user()->id;
			$data->teknis_by = Auth::guard('admin')->user()->id;
			$data->status = '0';
			$data->updatedteknis_at = Carbon::now();
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

	public function storedata(Request $request, $id)
	{
		$rules = [
			'kdb' => 'required|string',
			'klb' => 'required|string',
			'kdh' => 'required|string',
			'jml_lantai_max' => 'required|string',
			'lebar_jalan' => 'required|string',
			'gsp' => 'required|string',
			'gsb' => 'required|string',
			'klasifikasi' => 'required|string',

		];
		$message = [];
		$attribute = [
			'kdb' => 'Koefisien Dasar Bangunan (KDB) Maximum',
			'klb' => 'Koefisien Lantai Bangunan (KLB) Maximum',
			'kdh' => 'Koefisien Dasar Hijau (KDH) Maximum',
			'jml_lantai_max' => 'Jumlah Lantai Bangunan Maximum',
			'lebar_jalan' => 'Lebar Jalan',
			'gsp' => 'Garis Sempadan Pagar (GSP)',
			'gsb' => 'Garis Sempadan Bangunan (GSB)',
			'klasifikasi' => 'Klasifikasi Kegiatan',
		];
		$validasi = $this->validate($request,$rules,$message,$attribute);
		try {
			$auth = Auth::user()->id;
			$data = Krk::find($id);
			$data->kdb = $request->kdb;
			$data->klb = $request->klb; 
			$data->kdh = $request->kdh;
			$data->jml_lantai_max = $request->jml_lantai_max;
			$data->lebar_jalan = $request->lebar_jalan;
			$data->gsp = $request->gsp;
			$data->gsb = $request->gsb;
			$data->klasifikasi = $request->klasifikasi;
			$data->save();
			return $arrayName = array(
				'status' => 'success',
				'pesan' => 'Data ditambahkan'
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

	// BERITA ACARA
	public function bastore(Request $request, $id) 
	{
		$message = [];
		$attribute = [
			'no_berita_acara' => 'Nomor Berita Acara',
			'berita_acara' => 'Berkas Berita Acara',
			'gambar1' => 'Lampiran Gambar 1',
			'gambar2' => 'Lampiran Gambar 2',
			'gambar3' => 'Lampiran Gambar 3',
		];

		if($request->key == 'no_berita_acara') {
			$validasi = $this->validate($request, [
				'berita_acara' => 'mimes:pdf|max:1024',
			],$message,$attribute);
			$pdd = Pendidikan::findOrFail($id);
			$pdd->no_berita_acara = $request->no_berita_acara;
			$pdd->save();
			return $arrayName = array(
				'status' => 'success',
				'pesan' => 'No Berita Acara disimpan!'
			);
		}

		// upload Berita Acara 
		if($request->key == 'berita_acara') {
			$berita_acara = $request->file('berita_acara'); 
			if ($berita_acara) {
				$validasi = $this->validate($request, [
					'berita_acara' => 'mimes:pdf|max:1024',
				],$message,$attribute);
				$pdd = Pendidikan::findOrFail($id);
				if ($pdd->berita_acara && file_exists(storage_path('app/public/' . $pdd->berita_acara))) {
					\Storage::delete('public/' . $pdd->berita_acara);
				}
				$path = $berita_acara->store('pendidikan', 'public');
				$pdd->berita_acara = $path;
				$pdd->save();
				return $arrayName = array(
					'status' => 'success',
					'pesan' => 'Berita Acara disimpan!'
				);
			}
			return $arrayName = array(
				'status' => 'error',
				'pesan' => 'Berita Acara wajib diisi!',
			);	
		} // end upload Berita Acara

		// upload Lampiran Gambar 1
		if($request->key == 'gambar1') {
			$gambar1 = $request->file('gambar1'); 
			if ($gambar1) {
				$validasi = $this->validate($request, [
					'gambar1' => 'mimes:jpeg,png,jpg|max:1024',
				],$message,$attribute);
				$pdd = Pendidikan::findOrFail($id);
				if ($pdd->gambar1 && file_exists(storage_path('app/public/' . $pdd->gambar1))) {
					\Storage::delete('public/' . $pdd->gambar1);
				}
				$path = $gambar1->store('pendidikan', 'public');
				$pdd->gambar1 = $path;
				$pdd->save();
				return $arrayName = array(
					'status' => 'success',
					'pesan' => 'Lampiran gambar 1 disimpan!'
				);
			}
			return $arrayName = array(
				'status' => 'error',
				'pesan' => 'Lampiran gambar 1 wajib diisi!',
			);	
		} // end upload Lampiran Gambar 1

		// upload Lampiran Gambar 2
		if($request->key == 'gambar2') {
			$gambar2 = $request->file('gambar2'); 
			if ($gambar2) {
				$validasi = $this->validate($request, [
					'gambar2' => 'mimes:jpeg,png,jpg|max:1024',
				],$message,$attribute);
				$pdd = Pendidikan::findOrFail($id);
				if ($pdd->gambar2 && file_exists(storage_path('app/public/' . $pdd->gambar2))) {
					\Storage::delete('public/' . $pdd->gambar2);
				}
				$path = $gambar2->store('pendidikan', 'public');
				$pdd->gambar2 = $path;
				$pdd->save();
				return $arrayName = array(
					'status' => 'success',
					'pesan' => 'Lampiran gambar 2 disimpan!'
				);
			}
			return $arrayName = array(
				'status' => 'error',
				'pesan' => 'Lampiran gambar 2 wajib diisi!',
			);	
		} // end upload Lampiran Gambar 2

		// upload Lampiran Gambar 3
		if($request->key == 'gambar3') {
			$gambar3 = $request->file('gambar3'); 
			if ($gambar3) {
				$validasi = $this->validate($request, [
					'gambar3' => 'mimes:jpeg,png,jpg|max:1024',
				],$message,$attribute);
				$pdd = Pendidikan::findOrFail($id);
				if ($pdd->gambar3 && file_exists(storage_path('app/public/' . $pdd->gambar3))) {
					\Storage::delete('public/' . $pdd->gambar3);
				}
				$path = $gambar3->store('pendidikan', 'public');
				$pdd->gambar3 = $path;
				$pdd->save();
				return $arrayName = array(
					'status' => 'success',
					'pesan' => 'Lampiran gambar 3 disimpan!'
				);
			}
			return $arrayName = array(
				'status' => 'error',
				'pesan' => 'Lampiran gambar 3 wajib diisi!',
			);	
		} // end upload Lampiran Gambar 3
	}

	public function reload($id)
	{
		$data = Pendidikan::find($id);
		return $data;
	} 

	private function err($pesan) 
	{	
		return $err = array(
			'status' => 'error',
			'pesan' => 'Mohon mengisi '.$pesan
		);
	} 
}
