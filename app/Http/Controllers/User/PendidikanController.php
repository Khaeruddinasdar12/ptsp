<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subizin;
use App\Models\Perizinan;
use App\Models\Pendidikan;
use Auth;
use Carbon\Carbon;
use App\Models\Kelurahan;
use QueryException;
use Exception;
class PendidikanController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}
	public function update(Request $request, $id)
	{
		$message = [];
		$attribute = [
			'nama' => 'Nama',
			'alamat' => 'Alamat',
			'jenis_izin' => 'Jenis izin',
			'no_str' => 'No. STR',
			'awal_str' => 'Tanggal Mulai Berlaku STR',
			'akhir_str' => 'Tanggal Berakhir STR',
			'nama_praktek1' => 'Nama Praktek 1',
			'jalan1' => 'Jalan 1',
			'kelurahan1' => 'Kelurahan 1',
			'kecamatan1' => 'Kecamatan 1',
			'nama_praktek2' => 'Nama Praktek 2',
			'jalan2' => 'Jalan 2',
			'kelurahan2' => 'Kelurahan 2',
			'nama_praktek3' => 'Nama Praktek 3',
			'jalan3' => 'Jalan 3',
			'kelurahan3' => 'Kelurahan 3',
			'surat_keterangan' => 'Surat Keterangan Pelayanan Kesehatan',
			'surat_persetujuan' => 'Surat Persetujuan Pimpinan Instansi',
			'ktp' => 'KTP',
			'foto' => 'Foto',
			'str' => 'STR',
			'rekomendasi_org' => 'Rekomendasi Organisasi Profesi',
			'berkas_pendukung' => 'Berkas Pendukung',

		];

		try {
			if($request->key == 'nama') {
				$validasi = $this->validate($request, [
					'revisi' => 'required|string',
				],$message,$attribute);
				$data = Pendidikan::where('perizinan_id', $id)->update(array($request->key => $request->revisi));
				return redirect()->back()->with('success','Nama diperbarui');
			}

			if($request->key == 'alamat') {
				$validasi = $this->validate($request, [
					'revisi' => 'required|string',
				],$message,$attribute);
				$data = Pendidikan::where('perizinan_id', $id)->update(array($request->key => $request->revisi));
				return redirect()->back()->with('success','Alamat diperbarui');
			}

			if($request->key == 'nama_pendidikan') {
				$validasi = $this->validate($request, [
					'revisi' => 'required|string',
				],$message,$attribute);
				$data = Pendidikan::where('perizinan_id', $id)->update(array($request->key => $request->revisi));
				return redirect()->back()->with('success','Nama pendidikan diperbarui');
			}

			if($request->key == 'kelurahan') {
				$validasi = $this->validate($request, [
					'revisi' => 'required|string',
				],$message,$attribute);
				$data = Pendidikan::where('perizinan_id', $id)->update(array($request->key => $request->revisi));
				return redirect()->back()->with('success','Kelurahan diperbarui');
			}

			if($request->key == 'jalan') {
				$validasi = $this->validate($request, [
					'revisi' => 'required|string',
				],$message,$attribute);
				$data = Pendidikan::where('perizinan_id', $id)->update(array($request->key => $request->revisi));
				return redirect()->back()->with('success','Jalan diperbarui');
			}

			if($request->key == 'nama_pendidikan') {
				$validasi = $this->validate($request, [
					'revisi' => 'required|string',
				],$message,$attribute);
				$data = Pendidikan::where('perizinan_id', $id)->update(array($request->key => $request->revisi));
				return redirect()->back()->with('success','Nama pendidikan diperbarui');
			}

			// BERKAS - FILE

			// upload KTP
			if($request->key == 'ktp') {
				$ktp = $request->file('ktp'); 
				if ($ktp) {
					$validasi = $this->validate($request, [
						'ktp' => 'mimes:jpeg,png,jpg|max:1024',
					],$message,$attribute);
					$pdd = Pendidikan::where('perizinan_id', $id)->first();
					if ($pdd->ktp && file_exists(storage_path('app/public/' . $pdd->ktp))) {
						\Storage::delete('public/' . $pdd->ktp);
					}
					$path = $ktp->store('pendidikan', 'public');
					$pdd->ktp = $path;
					$pdd->save();
					return redirect()->back()->with('success','KTP diperbarui');
				}
				return redirect()->back()->with('error','KTP tidak diproses');
				} // end upload ktp

				// upload foto
				if($request->key == 'pas_foto') {
					$foto = $request->file('pas_foto'); 
					if ($foto) {
						$validasi = $this->validate($request, [
							'pas_foto' => 'mimes:jpeg,png,jpg|max:1024',
						],$message,$attribute);
						$pdd = Pendidikan::where('perizinan_id', $id)->first();
						if ($pdd->pas_foto && file_exists(storage_path('app/public/' . $pdd->pas_foto))) {
							\Storage::delete('public/' . $pdd->pas_foto);
						}
						$path = $foto->store('pendidikan', 'public');
						$pdd->pas_foto = $path;
						$pdd->save();
						return redirect()->back()->with('success','Pas foto diperbarui');
					}
					return redirect()->back()->with('error','Pas foto tidak diproses');
				} // end upload foto

				// upload akta
				if($request->key == 'akta') {
					$akta = $request->file('akta'); 
					if ($akta) {
						$validasi = $this->validate($request, [
							'akta' => 'mimes:pdf|max:1024',
						],$message,$attribute);
						$pdd = Pendidikan::where('perizinan_id', $id)->first();
						if ($pdd->akta && file_exists(storage_path('app/public/' . $pdd->akta))) {
							\Storage::delete('public/' . $pdd->akta);
						}
						$path = $akta->store('pendidikan', 'public');
						$pdd->akta = $path;
						$pdd->save();
						return redirect()->back()->with('success','Akta pendirian diperbarui');
					}
					return redirect()->back()->with('error','Akta pendirian tidak diproses');
				} // end upload akta

				// upload kurikulum
				if($request->key == 'kurikulum') {
					$kurikulum = $request->file('kurikulum'); 
					if ($kurikulum) {
						$validasi = $this->validate($request, [
							'kurikulum' => 'mimes:pdf|max:1024',
						],$message,$attribute);
						$pdd = Pendidikan::where('perizinan_id', $id)->first();
						if ($pdd->kurikulum && file_exists(storage_path('app/public/' . $pdd->kurikulum))) {
							\Storage::delete('public/' . $pdd->kurikulum);
						}
						$path = $kurikulum->store('pendidikan', 'public');
						$pdd->kurikulum = $path;
						$pdd->save();
						return redirect()->back()->with('success','Kurikulum diperbarui');
					}
					return redirect()->back()->with('error','Kurikulum tidak diproses');	
				} // end upload kurikulum

				// upload struktur organisasi
				if($request->key == 'struktur_organisasi') {
					$struktur = $request->file('struktur_organisasi'); 
					if ($struktur) {
						$validasi = $this->validate($request, [
							'struktur_organisasi' => 'mimes:pdf|max:1024',
						],$message,$attribute);
						$pdd = Pendidikan::where('perizinan_id', $id)->first();
						if ($pdd->struktur_organisasi && file_exists(storage_path('app/public/' . $pdd->struktur_organisasi))) {
							\Storage::delete('public/' . $pdd->struktur_organisasi);
						}
						$path = $struktur->store('pendidikan', 'public');
						$pdd->struktur_organisasi = $path;
						$pdd->save();
						return redirect()->back()->with('success','Struktur organisasi diperbarui');
					}
					return redirect()->back()->with('error','Struktur organisasi tidak diproses');	
				} // end upload struktur organisasi

				// upload sk
				if($request->key == 'sk') {
					$sk = $request->file('sk'); 
					if ($sk) {
						$validasi = $this->validate($request, [
							'sk' => 'mimes:pdf|max:1024',
						],$message,$attribute);
						$pdd = Pendidikan::where('perizinan_id', $id)->first();
						if ($pdd->sk && file_exists(storage_path('app/public/' . $pdd->sk))) {
							\Storage::delete('public/' . $pdd->sk);
						}
						$path = $sk->store('pendidikan', 'public');
						$pdd->sk = $path;
						$pdd->save();
						return redirect()->back()->with('success','SK penanggung jawab dan pengajar diperbarui');
					}
					return redirect()->back()->with('error','SK penanggung jawab dan pengajar tidak diproses');	
				} // end upload sk

				// upload sertifikat tanah
				if($request->key == 'sertifikat_tanah') {
					$sertifikat = $request->file('sertifikat_tanah'); 
					if ($sertifikat) {
						$validasi = $this->validate($request, [
							'sertifikat_tanah' => 'mimes:pdf|max:1024',
						],$message,$attribute);
						$pdd = Pendidikan::where('perizinan_id', $id)->first();
						if ($pdd->sertifikat_tanah && file_exists(storage_path('app/public/' . $pdd->sertifikat_tanah))) {
							\Storage::delete('public/' . $pdd->sertifikat_tanah);
						}
						$path = $sertifikat->store('pendidikan', 'public');
						$pdd->sertifikat_tanah = $path;
						$pdd->save();
						return redirect()->back()->with('success','Sertifikat tanah diperbarui');
					}
					return redirect()->back()->with('error','Sertifikat tanah tidak diproses');
				} // end upload sertifikat tanah

				// upload nib
				if($request->key == 'nib') {
					$nib = $request->file('nib'); 
					if ($nib) {
						$validasi = $this->validate($request, [
							'nib' => 'mimes:pdf|max:1024',
						],$message,$attribute);
						$pdd = Pendidikan::where('perizinan_id', $id)->first();
						if ($pdd->nib && file_exists(storage_path('app/public/' . $pdd->nib))) {
							\Storage::delete('public/' . $pdd->nib);
						}
						$path = $nib->store('pendidikan', 'public');
						$pdd->nib = $path;
						$pdd->save();
						return redirect()->back()->with('success','NIB diperbarui');
					}
					return redirect()->back()->with('error','NIB tidak diproses');
				} // end upload nib

				// upload npsn
				if($request->key == 'npsn') {
					$npsn = $request->file('npsn'); 
					if ($npsn) {
						$validasi = $this->validate($request, [
							'npsn' => 'mimes:pdf|max:1024',
						],$message,$attribute);
						$pdd = Pendidikan::where('perizinan_id', $id)->first();
						if ($pdd->npsn && file_exists(storage_path('app/public/' . $pdd->npsn))) {
							\Storage::delete('public/' . $pdd->npsn);
						}
						$path = $npsn->store('pendidikan', 'public');
						$pdd->npsn = $path;
						$pdd->save();
						return redirect()->back()->with('success','NPSN diperbarui');
					}
					return redirect()->back()->with('error','NPSN tidak diproses');
				} // end upload npsn

				// upload izin lama
				if($request->key == 'izin_lama') {
					$izin_lama = $request->file('izin_lama'); 
					if ($izin_lama) {
						$validasi = $this->validate($request, [
							'izin_lama' => 'mimes:pdf|max:1024',
						],$message,$attribute);
						$pdd = Pendidikan::where('perizinan_id', $id)->first();
						if ($pdd->izin_lama && file_exists(storage_path('app/public/' . $pdd->izin_lama))) {
							\Storage::delete('public/' . $pdd->izin_lama);
						}
						$path = $izin_lama->store('pendidikan', 'public');
						$pdd->izin_lama = $path;
						$pdd->save();
						return redirect()->back()->with('success','Izin lama diperbarui');
					}
					return redirect()->back()->with('error','Izin lama tidak diproses');
				} // end upload izin lama

				// upload berkas pendukung
				if($request->key == 'berkas_pendukung') {
					$berkas_pendukung = $request->file('berkas_pendukung'); 
					if ($berkas_pendukung) {
						$validasi = $this->validate($request, [
							'berkas_pendukung' => 'mimes:pdf|max:1024',
						],$message,$attribute);
						$pdd = Pendidikan::where('perizinan_id', $id)->first();
						if ($pdd->berkas_pendukung && file_exists(storage_path('app/public/' . $pdd->berkas_pendukung))) {
							\Storage::delete('public/' . $pdd->berkas_pendukung);
						}
						$path = $berkas_pendukung->store('pendidikan', 'public');
						$pdd->berkas_pendukung = $path;
						$pdd->save();
						return redirect()->back()->with('success','Berkas pendukung diperbarui');
					}
					return redirect()->back()->with('error','Berkas pendukung tidak diproses');
				} // end upload berkas pendukung

			} catch(Exception $e) {
				return redirect()->back()->with('not_found', $e->getMessage());
			} catch(QueryException $e) {
				return redirect()->back()->with('not_found', $e->getMessage());
			}
		}
		
		public function create()
		{
			$auth = Auth::user()->id;
			$data = Subizin::where('jenis', 'pendidikan')->distinct()->get('nama');
		// return $data;
			$old = Perizinan::where('user_id', $auth)->where('jenis_izin', 'pendidikan')->where('status', null)->first();
			if(!$old) {
				$old = null;
			}
		// return $old;
			return view('user.pendidikan.create', ['data' => $data, 'old' => $old]);
		} 

		public function tab1(Request $request)
		{
			$rules = [
				'nama' => 'required|string',
				'nohp' => 'required|string',
				'alamat' => 'required|string',
			];
			$message = [];
			$attribute = [
				'nama' => 'Nama',
				'nohp' => 'Nomor HP',	
				'alamat' => 'Alamat',
			];
			$validasi = $this->validate($request,$rules,$message,$attribute);
			$auth = Auth::user()->id;
			$perizinan = Perizinan::where('user_id', $auth)->where('jenis_izin', 'pendidikan')->get();
			foreach($perizinan as $i) {

				if($i->status == null) {
					Pendidikan::where('perizinan_id', $i->id)->update(array(
						'gelar_awal' => $request->gelar_awal,
						'nama' => $request->nama,
						'gelar_akhir' => $request->gelar_akhir,						
						'nohp' => $request->nohp,
						'alamat' => $request->alamat
					));
					return $arrayName = array(
						'status' => 'success',
						'pesan' => 'Berhasil Disimpan!',
						'pendidikan_id' => $i->id
					);

				} elseif($i->status == '0' || $i->status == '2') {
					return $arrayName = array(
						'status' => 'error',
						'pesan' => 'Saat ini Anda memiliki pengajuan perizinan Pendidikan! Silakan Cek di tab Surat Perizinan Anda!'
					);
				}
			}
			try {
				$no_tiket = strtoupper(substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, 6));
				$izin = Perizinan::create(array(
					'user_id' => $auth,
					'jenis_izin' => 'pendidikan',
					'status' => null,
					'no_tiket' => 'PDD-'.$no_tiket
				));

				$pdd = Pendidikan::create(array(
					'perizinan_id' => $izin->id,
					'gelar_awal' => $request->gelar_awal,
					'nama' => $request->nama,
					'gelar_akhir' => $request->gelar_akhir,
					'nohp' => $request->nohp,
					'alamat' => $request->alamat
				));

				return $arrayName = array(
					'status' => 'success',
					'pesan' => 'Data disimpan!',
					'pendidikan_id' => $pdd->id
				);
			} catch(Exception $e) {
				return $arrayName = array(
					'status' => 'error',
					'pesan' => $e->getMessage()
				);
			} catch(QueryException $e) {
				return $arrayName = array(
					'status' => 'error',
					'pesan' => $e->getMessage()
				);
			}
	} // END TAB 1

	public function tab2(Request $request)
	{
		$message = [];
		$attribute = [
			'nama_yayasan' => 'Nama Yayasan',	
			'nama_pendidikan' => 'Nama Pendidikan',	
			'jenis_izin' => 'Jenis Izin',
			'jenis_program' => 'Jenis Program',
		];
		if($request->jenis_perizinan == 'Program Pendidikan Kursus Dan Pelatihan') {
			$rules = [
				'nama_pendidikan' => 'required|string',
				'nama_yayasan' => 'required|string',
				'jenis_program' => 'required|string',
			];
			$jenis_izin = 66;
		} else {
			$rules = [
				'nama_pendidikan' => 'required|string',
				'nama_yayasan' => 'required|string',
				'jenis_izin' => 'required|string',
			];
			$jenis_izin = $request->jenis_izin;
		}
		$validasi = $this->validate($request,$rules,$message,$attribute);
		$auth = Auth::user()->id;
		$perizinan = Perizinan::where('user_id', $auth)->where('jenis_izin', 'pendidikan')->get();
		foreach($perizinan as $i) {

			if($i->status == null) {
				Pendidikan::where('perizinan_id', $i->id)->update(array(
					'subizin_id' => $jenis_izin,
					'nama_yayasan' => $request->nama_yayasan,
					'nama_pendidikan' => $request->nama_pendidikan,
					'no_npsn' => $request->no_npsn,
					'jenis_program' => $request->jenis_program,
				));
				return $arrayName = array(
					'status' => 'success',
					'pesan' => 'Berhasil Disimpan!',
					'pendidikan_id' => $i->id
				);

			} elseif($i->status == '0' || $i->status == '2') {
				return $arrayName = array(
					'status' => 'error',
					'pesan' => 'Saat ini Anda memiliki pengajuan perizinan Pendidikan! Silakan Cek di tab Surat Perizinan Anda!'
				);
			}
		}

		try {
			$no_tiket = strtoupper(substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, 6));
			$izin = Perizinan::create(array(
				'user_id' => $auth,
				'jenis_izin' => 'pendidikan',
				'status' => null,
				'no_tiket' => 'PDD-'.$no_tiket
			));

			$pdd = Pendidikan::create(array(
				'perizinan_id' => $izin->id,
				'subizin_id' => $jenis_izin,
				'nama_yayasan' => $request->nama_yayasan,
				'nama_pendidikan' => $request->nama_pendidikan,
				'no_npsn' => $request->no_npsn,
				'jenis_program' => $request->jenis_program,
			));

			return $arrayName = array(
				'status' => 'success',
				'pesan' => 'Data disimpan!',
				'pendidikan_id' => $pdd->id
			);
		} catch(Exception $e) {
			return $arrayName = array(
				'status' => 'error',
				'pesan' => $e->getMessage()
			);
		} catch(QueryException $e) {
			return $arrayName = array(
				'status' => 'error',
				'pesan' => $e->getMessage()
			);
		}
	}
	// END TAB 2

	public function tab3(Request $request)
	{
		$rules = [
			'kelurahan' => 'required|string',
			'jalan' => 'required|string',
		];
		$message = [];
		$attribute = [
			'kelurahan' => 'Kelurahan',	
			'jalan' => 'Jalan',

		];
		$validasi = $this->validate($request,$rules,$message,$attribute);
		$auth = Auth::user()->id;
		$perizinan = Perizinan::where('user_id', $auth)->where('jenis_izin', 'pendidikan')->get();
		foreach($perizinan as $i) {
			if($i->status == null) {
				Pendidikan::where('perizinan_id', $i->id)->update(array(
					'kelurahan' => $request->kelurahan,
					'jalan' => $request->jalan,
					'kode_pos' => $request->kode_pos,
				));
				return $arrayName = array(
					'status' => 'success',
					'pesan' => 'Berhasil Disimpan!',
					'pendidikan_id' => $i->id
				);

			} elseif($i->status == '0' || $i->status == '2') {
				return $arrayName = array(
					'status' => 'error',
					'pesan' => 'Saat ini Anda memiliki pengajuan perizinan Pendidikan! Silakan Cek di tab Surat Perizinan Anda!'
				);
			}
		}

		try {


			$no_tiket = strtoupper(substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, 6));
			$izin = Perizinan::create(array(
				'user_id' => $auth,
				'jenis_izin' => 'pendidikan',
				'status' => null,
				'no_tiket' => 'PDD-'.$no_tiket
			));

			$pdd = Pendidikan::create(array(
				'perizinan_id' => $izin->id,
				'kelurahan' => $request->kelurahan,
				'jalan' => $request->jalan,
				'kode_pos' => $request->kode_pos,
			));

			return $arrayName = array(
				'status' => 'success',
				'pesan' => 'Data disimpan!',
				'pendidikan_id' => $pdd->id
			);
		} catch(Exception $e) {
			return $arrayName = array(
				'status' => 'error',
				'pesan' => $e->getMessage()
			);
		} catch(QueryException $e) {
			return $arrayName = array(
				'status' => 'error',
				'pesan' => $e->getMessage()
			);
		}
	}
	// END TAB 3

	public function tab4(Request $request)
	{
		$message = [];
		$attribute = [];
		$auth = Auth::user()->id;
		$perizinan = Perizinan::where('user_id', $auth)->where('jenis_izin', 'pendidikan')->get();
		foreach($perizinan as $i) {

			if($i->status == null) {
				// upload KTP
				if($request->key == 'ktp') {
					$ktp = $request->file('ktp'); 
					if ($ktp) {
						$validasi = $this->validate($request, [
							'ktp' => 'image|mimes:jpeg,png,jpg|max:1024',
						],$message,$attribute);
						$pdd = Pendidikan::where('perizinan_id', $i->id)->first();
						if ($pdd->ktp && file_exists(storage_path('app/public/' . $pdd->ktp))) {
							\Storage::delete('public/' . $pdd->ktp);
						}
						$path = $ktp->store('pendidikan', 'public');
						$pdd->ktp = $path;
						$pdd->save();
						return $arrayName = array(
							'status' => 'success',
							'pesan' => 'KTP disimpan!'
						);
					}
					return $arrayName = array(
						'status' => 'error',
						'pesan' => 'KTP wajib diisi!',
					);	
				} // end upload ktp

				// upload foto
				if($request->key == 'foto') {
					$foto = $request->file('foto'); 
					if ($foto) {
						$validasi = $this->validate($request, [
							'foto' => 'image|mimes:jpeg,png,jpg|max:1024',
						],$message,$attribute);
						$pdd = Pendidikan::where('perizinan_id', $i->id)->first();
						if ($pdd->pas_foto && file_exists(storage_path('app/public/' . $pdd->pas_foto))) {
							\Storage::delete('public/' . $pdd->pas_foto);
						}
						$path = $foto->store('pendidikan', 'public');
						$pdd->pas_foto = $path;
						$pdd->save();
						return $arrayName = array(
							'status' => 'success',
							'pesan' => 'Foto disimpan!',
						);
					}
					return $arrayName = array(
						'status' => 'error',
						'pesan' => 'Foto wajib diisi!'
					);	
				} // end upload foto

				// upload imb
				if($request->key == 'imb') {
					$imb = $request->file('imb'); 
					if ($imb) {
						$validasi = $this->validate($request, [
							'imb' => 'image|mimes:jpeg,png,jpg|max:1024',
						],$message,$attribute);
						$pdd = Pendidikan::where('perizinan_id', $i->id)->first();
						if ($pdd->imb && file_exists(storage_path('app/public/' . $pdd->imb))) {
							\Storage::delete('public/' . $pdd->imb);
						}
						$path = $imb->store('pendidikan', 'public');
						$pdd->imb = $path;
						$pdd->save();
						return $arrayName = array(
							'status' => 'success',
							'pesan' => 'IMB disimpan!',
						);
					}
					return $arrayName = array(
						'status' => 'error',
						'pesan' => 'IMB wajib diisi!'
					);	
				} // end upload imb

				// upload akta
				if($request->key == 'akta') {
					$akta = $request->file('akta'); 
					if ($akta) {
						$validasi = $this->validate($request, [
							'akta' => 'mimes:pdf|max:1024',
						],$message,$attribute);
						$pdd = Pendidikan::where('perizinan_id', $i->id)->first();
						if ($pdd->akta && file_exists(storage_path('app/public/' . $pdd->akta))) {
							\Storage::delete('public/' . $pdd->akta);
						}
						$path = $akta->store('pendidikan', 'public');
						$pdd->akta = $path;
						$pdd->save();
						return $arrayName = array(
							'status' => 'success',
							'pesan' => 'Akta disimpan!',
						);
					}
					return $arrayName = array(
						'status' => 'error',
						'pesan' => 'Foto wajib diisi!'
					);	
				} // end upload akta

				// upload kurikulum
				if($request->key == 'kurikulum') {
					$kurikulum = $request->file('kurikulum'); 
					if ($kurikulum) {
						$validasi = $this->validate($request, [
							'kurikulum' => 'mimes:pdf|max:1024',
						],$message,$attribute);
						$pdd = Pendidikan::where('perizinan_id', $i->id)->first();
						if ($pdd->kurikulum && file_exists(storage_path('app/public/' . $pdd->kurikulum))) {
							\Storage::delete('public/' . $pdd->kurikulum);
						}
						$path = $kurikulum->store('pendidikan', 'public');
						$pdd->kurikulum = $path;
						$pdd->save();
						return $arrayName = array(
							'status' => 'success',
							'pesan' => 'Kurikulum disimpan!',
						);
					}
					return $arrayName = array(
						'status' => 'error',
						'pesan' => 'Kurikulum wajib diisi!'
					);	
				} // end upload kurikulum

				// upload struktur organisasi
				if($request->key == 'struktur_organisasi') {
					$struktur = $request->file('struktur_organisasi'); 
					if ($struktur) {
						$validasi = $this->validate($request, [
							'struktur_organisasi' => 'mimes:pdf|max:1024',
						],$message,$attribute);
						$pdd = Pendidikan::where('perizinan_id', $i->id)->first();
						if ($pdd->struktur_organisasi && file_exists(storage_path('app/public/' . $pdd->struktur_organisasi))) {
							\Storage::delete('public/' . $pdd->struktur_organisasi);
						}
						$path = $struktur->store('pendidikan', 'public');
						$pdd->struktur_organisasi = $path;
						$pdd->save();
						return $arrayName = array(
							'status' => 'success',
							'pesan' => 'Struktur organisasi disimpan!',
						);
					}
					return $arrayName = array(
						'status' => 'error',
						'pesan' => 'Struktur organisasi wajib diisi!'
					);	
				} // end upload struktur organisasi

				// upload sk
				if($request->key == 'sk') {
					$sk = $request->file('sk'); 
					if ($sk) {
						$validasi = $this->validate($request, [
							'sk' => 'mimes:pdf|max:1024',
						],$message,$attribute);
						$pdd = Pendidikan::where('perizinan_id', $i->id)->first();
						if ($pdd->sk && file_exists(storage_path('app/public/' . $pdd->sk))) {
							\Storage::delete('public/' . $pdd->sk);
						}
						$path = $sk->store('pendidikan', 'public');
						$pdd->sk = $path;
						$pdd->save();
						return $arrayName = array(
							'status' => 'success',
							'pesan' => 'SK disimpan!',
						);
					}
					return $arrayName = array(
						'status' => 'error',
						'pesan' => 'SK wajib diisi!'
					);	
				} // end upload sk

				// upload sertifikat tanah
				if($request->key == 'sertifikat_tanah') {
					$sertifikat = $request->file('sertifikat_tanah'); 
					if ($sertifikat) {
						$validasi = $this->validate($request, [
							'sertifikat_tanah' => 'mimes:pdf|max:1024',
						],$message,$attribute);
						$pdd = Pendidikan::where('perizinan_id', $i->id)->first();
						if ($pdd->sertifikat_tanah && file_exists(storage_path('app/public/' . $pdd->sertifikat_tanah))) {
							\Storage::delete('public/' . $pdd->sertifikat_tanah);
						}
						$path = $sertifikat->store('pendidikan', 'public');
						$pdd->sertifikat_tanah = $path;
						$pdd->save();
						return $arrayName = array(
							'status' => 'success',
							'pesan' => 'Sertifikat tanah disimpan!',
						);
					}
					return $arrayName = array(
						'status' => 'error',
						'pesan' => 'Sertifikat tanah wajib diisi!'
					);	
				} // end upload sertifikat tanah

				// upload nib
				if($request->key == 'nib') {
					$nib = $request->file('nib'); 
					if ($nib) {
						$validasi = $this->validate($request, [
							'nib' => 'mimes:pdf|max:1024',
						],$message,$attribute);
						$pdd = Pendidikan::where('perizinan_id', $i->id)->first();
						if ($pdd->nib && file_exists(storage_path('app/public/' . $pdd->nib))) {
							\Storage::delete('public/' . $pdd->nib);
						}
						$path = $nib->store('pendidikan', 'public');
						$pdd->nib = $path;
						$pdd->save();
						return $arrayName = array(
							'status' => 'success',
							'pesan' => 'NIB disimpan!',
						);
					}
					return $arrayName = array(
						'status' => 'error',
						'pesan' => 'NIB wajib diisi!'
					);	
				} // end upload nib

				// upload npsn
				if($request->key == 'npsn') {
					$npsn = $request->file('npsn'); 
					if ($npsn) {
						$validasi = $this->validate($request, [
							'npsn' => 'mimes:pdf|max:1024',
						],$message,$attribute);
						$pdd = Pendidikan::where('perizinan_id', $i->id)->first();
						if ($pdd->npsn && file_exists(storage_path('app/public/' . $pdd->npsn))) {
							\Storage::delete('public/' . $pdd->npsn);
						}
						$path = $npsn->store('pendidikan', 'public');
						$pdd->npsn = $path;
						$pdd->save();
						return $arrayName = array(
							'status' => 'success',
							'pesan' => 'NPSN disimpan!',
						);
					}
					return $arrayName = array(
						'status' => 'error',
						'pesan' => 'NPSN wajib diisi!'
					);	
				} // end upload npsn

				// upload izin lama
				if($request->key == 'izin_lama') {
					$izin_lama = $request->file('izin_lama'); 
					if ($izin_lama) {
						$validasi = $this->validate($request, [
							'izin_lama' => 'mimes:pdf|max:1024',
						],$message,$attribute);
						$pdd = Pendidikan::where('perizinan_id', $i->id)->first();
						if ($pdd->izin_lama && file_exists(storage_path('app/public/' . $pdd->izin_lama))) {
							\Storage::delete('public/' . $pdd->izin_lama);
						}
						$path = $izin_lama->store('pendidikan', 'public');
						$pdd->izin_lama = $path;
						$pdd->save();
						return $arrayName = array(
							'status' => 'success',
							'pesan' => 'Izin lama disimpan!',
						);
					}
					return $arrayName = array(
						'status' => 'error',
						'pesan' => 'Izin lama wajib diisi!'
					);	
				} // end upload izin lama

				// upload berkas pendukung
				if($request->key == 'berkas_pendukung') {
					$berkas_pendukung = $request->file('berkas_pendukung'); 
					if ($berkas_pendukung) {
						$validasi = $this->validate($request, [
							'berkas_pendukung' => 'mimes:pdf|max:1024',
						],$message,$attribute);
						$pdd = Pendidikan::where('perizinan_id', $i->id)->first();
						if ($pdd->berkas_pendukung && file_exists(storage_path('app/public/' . $pdd->berkas_pendukung))) {
							\Storage::delete('public/' . $pdd->berkas_pendukung);
						}
						$path = $berkas_pendukung->store('pendidikan', 'public');
						$pdd->berkas_pendukung = $path;
						$pdd->save();
						return $arrayName = array(
							'status' => 'success',
							'pesan' => 'Berkas pendukung lama disimpan!',
						);
					}
					return $arrayName = array(
						'status' => 'error',
						'pesan' => 'Berkas pendukung wajib diisi!'
					);	
				} // end upload berkas pendukung

			} elseif($i->status == '0' || $i->status == '2') {
				return $arrayName = array(
					'status' => 'error',
					'pesan' => 'Saat ini Anda memiliki pengajuan perizinan Pendidikan! Silakan Cek di tab Surat Perizinan Anda!'
				);
			}
		}
		return $this->err('Tab Sebelumnya');
	} //END TAB 4

	public function tab5(Request $request)
	{
		try {
			$time = Carbon::now();
			$auth = Auth::user()->id;
			$perizinan = Perizinan::where('user_id', $auth)->where('jenis_izin', 'pendidikan')->get();
			foreach($perizinan as $i) {
				if($i->status == null) {
					$err = array(
						'status' => 'error',
						'pesan' => 'Mohon lengkapi semua data yang bertanda *(wajib)!'
					);
					$cek = Pendidikan::where('perizinan_id', $i->id)->first();
					if($cek->subizin_id == '') { return $this->err('Jenis Izin'); }
					if($cek->nama == '') { return $this->err('Nama'); }
					if($cek->nohp == '') { return $this->err('No HP'); }
					if($cek->alamat == '') { return $this->err('Alamat'); }
					if($cek->nama_pendidikan == '') { return $this->err('Nama Pendidikan'); }
					if($cek->jalan == '') { return $this->err('Jalan'); }
					if($cek->ktp == '') { return $this->err('KTP'); }
					if($cek->pas_foto == '') { return $this->err('Foto'); }
					if($cek->akta == '') { return $this->err('Akta'); }
					if($cek->struktur_organisasi == '') { return $this->err('Struktur Organiasasi'); }
					if($cek->sk == '') { return $this->err('SK'); }
					if($cek->sertifikat_tanah == '') { return $this->err('Sertifikat Tanah'); }
					if($cek->nib == '') { return $this->err('NIB'); }

					Perizinan::where('id', $i->id)->update(array(
						'status' => '0',
						'created_at' => $time
					));
					return $arrayName = array(
						'status' => 'success',
						'pesan' => 'Berhasil Mengirim Berkas! '
					);

				} elseif($i->status == '0' || $i->status == '2') {
					return $arrayName = array(
						'status' => 'error',
						'pesan' => 'Saat ini Anda memiliki pengajuan perizinan Pendidikan! Silakan Cek di tab Surat Perizinan Anda!'
					);
				}
			}

			return $arrayName = array(
				'status' => 'error',
				'pesan' => 'Mohon isi semua form!'
			);
		} catch(Exception $e) {
			return $arrayName = array(
				'status' => 'error',
				'pesan' => $e->getMessage()
			);
		} catch(QueryException $e) {
			return $arrayName = array(
				'status' => 'error',
				'pesan' => $e->getMessage()
			);
		}
		
	}
	// END TAB 5

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
