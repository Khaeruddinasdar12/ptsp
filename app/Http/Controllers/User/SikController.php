<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sik;
use App\Models\Perizinan;
use App\Models\Subizin;
use Auth;
use Carbon\Carbon;
use QueryException;
use Exception;
class SikController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

	public function index()
	{
	}

	public function create()
	{
		$auth = Auth::user()->id;
		$data = Subizin::where('jenis', 'sik')->get();
		$old = Perizinan::where('user_id', $auth)->where('jenis_izin', 'sik')->where('status', null)->first();
		if(!$old) {
			$old = null;
		}
		return view('user.sik.create', ['old' => $old, 'data' => $data]);
	}

	public function tab1(Request $request)
	{
		$rules = [
			'nama' => 'required|string',
			'nohp' => 'required|string',
			'tempat_lahir' => 'required|string',
			'tanggal_lahir' => 'required|date',
			'alamat' => 'required|string',
		];
		$message = [];
		$attribute = [
			'nama' => 'Nama',
			'nohp' => 'Nomor HP',	
			'alamat' => 'Alamat',
			'tanggal_lahir' => 'Tanggal Lahir',
			'tempat_lahir' => 'Tempat Lahir',
		];
		$validasi = $this->validate($request,$rules,$message,$attribute);
		$auth = Auth::user()->id;
		$perizinan = Perizinan::where('user_id', $auth)->where('jenis_izin', 'sik')->get();
		foreach($perizinan as $i) {

			if($i->status == null) {
				Sik::where('perizinan_id', $i->id)->update(array(
					'nama' => $request->nama,
					'nohp' => $request->nohp,
					'alamat' => $request->alamat,
					'tanggal_lahir' => $request->tanggal_lahir,
					'tempat_lahir' => $request->tempat_lahir,
				));
				return $arrayName = array(
					'status' => 'success',
					'pesan' => 'Berhasil Menyimpan!',
					'sik_id' => $i->id
				);

			} elseif($i->status == '0' || $i->status == '2') {
				return $arrayName = array(
					'status' => 'error',
					'pesan' => 'Saat ini Anda memiliki pengajuan perizinan Surat Izin Kerja (SIK)! Silakan Cek di tab Surat Perizinan Anda!'
				);
			}
		}
		try {
			$no_tiket = strtoupper(substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, 6));
			$izin = Perizinan::create(array(
				'user_id' => $auth,
				'jenis_izin' => 'sik',
				'status' => null,
				'no_tiket' => 'SIK-'.$no_tiket
			));

			$sik = Sik::create(array(
				'perizinan_id' => $izin->id,
				'nama' => $request->nama,
				'nohp' => $request->nohp,
				'alamat' => $request->alamat,
				'tanggal_lahir' => $request->tanggal_lahir,
				'tempat_lahir' => $request->tempat_lahir,
			));

			return $arrayName = array(
				'status' => 'success',
				'pesan' => 'Data disimpan!',
				'sik_id' => $sik->id
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

	// TAB 2
	public function tab2(Request $request)
	{
		$rules = [
			'jenis_izin' => 'required|string',
			'no_str' => 'required|string',
			'awal_str' => 'required|string',
			'akhir_str' => 'required|string',
		];
		$message = [];
		$attribute = [
			'jenis_izin' => 'Jenis izin',
			'rekomendasi_op' => 'No. Rekomendasi OP',
			'no_str' => 'No. STR',
			'awal_str' => 'Tanggal Mulai Berlaku STR',
			'akhir_str' => 'Tanggal Berakhir STR',
		];
		$validasi = $this->validate($request,$rules,$message,$attribute);
		$auth = Auth::user()->id;
		$perizinan = Perizinan::where('user_id', $auth)->where('jenis_izin', 'sik')->get();
		foreach($perizinan as $i) {

			if($i->status == null) {
				Sik::where('perizinan_id', $i->id)->update(array(
					'subizin_id' => $request->jenis_izin,
					'rekomendasi_op' => $request->rekomendasi_op,
					'no_str' => $request->no_str,
					'awal_str' => $request->awal_str,
					'akhir_str' => $request->akhir_str,
				));
				return $arrayName = array(
					'status' => 'success',
					'pesan' => 'Berhasil Menyimpan!',
					'sik_id' => $i->id
				);

			} elseif($i->status == '0' || $i->status == '2') {
				return $arrayName = array(
					'status' => 'error',
					'pesan' => 'Saat ini Anda memiliki pengajuan perizinan Surat Izin Kerja (SIK)! Silakan Cek di tab Surat Perizinan Anda!'
				);
			}
		}
		try {
			$no_tiket = strtoupper(substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, 6));
			$izin = Perizinan::create(array(
				'user_id' => $auth,
				'jenis_izin' => 'sik',
				'status' => null,
				'no_tiket' => 'SIK-'.$no_tiket
			));

			$sik = Sik::create(array(
				'perizinan_id' => $izin->id,
				'subizin_id' => $request->jenis_izin,
				'rekomendasi_op' => $request->rekomendasi_op,
				'no_str' => $request->no_str,
				'awal_str' => $request->awal_str,
				'akhir_str' => $request->akhir_str,
			));

			return $arrayName = array(
				'status' => 'success',
				'pesan' => 'Data disimpan!',
				'sik_id' => $sik->id
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
	} // END TAB 2

	// TAB 3
	public function tab3(Request $request)
	{
		$rules = [
			'nama_praktek' => 'required|string',
			'kelurahan' => 'required|string',
			'kecamatan' => 'required|string',
			'jalan' => 'required|string',
		];
		$message = [];
		$attribute = [
			'nama_praktek' => 'Nama Praktek',
			'kelurahan' => 'Kelurahan',
			'kecamatan' => 'Kecamatan',
			'jalan' => 'Jalan',
		];
		$validasi = $this->validate($request,$rules,$message,$attribute);
		$auth = Auth::user()->id;
		$perizinan = Perizinan::where('user_id', $auth)->where('jenis_izin', 'sik')->get();
		foreach($perizinan as $i) {

			if($i->status == null) {
				Sik::where('perizinan_id', $i->id)->update(array(
					'nama_praktek' => $request->nama_praktek,
					'kelurahan' => $request->kelurahan,
					'jalan' => $request->jalan,
				));
				return $arrayName = array(
					'status' => 'success',
					'pesan' => 'Berhasil Menyimpan!',
					'sik_id' => $i->id
				);

			} elseif($i->status == '0' || $i->status == '2') {
				return $arrayName = array(
					'status' => 'error',
					'pesan' => 'Saat ini Anda memiliki pengajuan perizinan Surat Izin Kerja (SIK)! Silakan Cek di tab Surat Perizinan Anda!'
				);
			}
		}
		try {
			$no_tiket = strtoupper(substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, 6));
			$izin = Perizinan::create(array(
				'user_id' => $auth,
				'jenis_izin' => 'sik',
				'status' => null,
				'no_tiket' => 'SIK-'.$no_tiket
			));

			$sik = Sik::create(array(
				'perizinan_id' => $izin->id,
				'nama_praktek' => $request->nama_praktek,
				'kelurahan' => $request->kelurahan,
				'jalan' => $request->jalan,
			));

			return $arrayName = array(
				'status' => 'success',
				'pesan' => 'Data disimpan!',
				'sik_id' => $sik->id
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
	} // END TAB 3

	// TAB 4
	public function tab4(Request $request)
	{
		$message = [];
		$attribute = [];
		$auth = Auth::user()->id;
		$perizinan = Perizinan::where('user_id', $auth)->where('jenis_izin', 'sik')->get();

		foreach($perizinan as $i) {

			if($i->status == null) {

				// upload KTP
				if($request->key == 'ktp') {
					$ktp = $request->file('ktp'); 
					if ($ktp) {
						$validasi = $this->validate($request, [
							'ktp' => 'mimes:jpeg,png,jpg|max:1024',
						],$message,$attribute);
						$sik = Sik::where('perizinan_id', $i->id)->first();
						if ($sik->ktp && file_exists(storage_path('app/public/' . $sik->ktp))) {
							\Storage::delete('public/' . $sik->ktp);
						}
						$path = $ktp->store('sik', 'public');
						$sik->ktp = $path;
						$sik->save();
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

				// upload Foto
				if($request->key == 'foto') {
					$foto = $request->file('foto'); 
					if ($foto) {
						$validasi = $this->validate($request, [
							'foto' => 'mimes:jpeg,png,jpg|max:1024',
						],$message,$attribute);
						$sik = Sik::where('perizinan_id', $i->id)->first();
						if ($sik->foto && file_exists(storage_path('app/public/' . $sik->foto))) {
							\Storage::delete('public/' . $sik->foto);
						}
						$path = $foto->store('sik', 'public');
						$sik->foto = $path;
						$sik->save();
						return $arrayName = array(
							'status' => 'success',
							'pesan' => 'Foto disimpan!'
						);
					}
					return $arrayName = array(
						'status' => 'error',
						'pesan' => 'Foto wajib diisi!',
					);	
				} // end upload Foto

				// upload Ijazah
				if($request->key == 'ijazah') {
					$ijazah = $request->file('ijazah'); 
					if ($ijazah) {
						$validasi = $this->validate($request, [
							'ijazah' => 'mimes:jpeg,png,jpg|max:1024',
						],$message,$attribute);
						$sik = Sik::where('perizinan_id', $i->id)->first();
						if ($sik->ijazah && file_exists(storage_path('app/public/' . $sik->ijazah))) {
							\Storage::delete('public/' . $sik->ijazah);
						}
						$path = $ijazah->store('sik', 'public');
						$sik->ijazah = $path;
						$sik->save();
						return $arrayName = array(
							'status' => 'success',
							'pesan' => 'Ijazah disimpan!'
						);
					}
					return $arrayName = array(
						'status' => 'error',
						'pesan' => 'Ijazah wajib diisi!',
					);	
				} // end upload Ijazah

				// upload STR
				if($request->key == 'str') {
					$str = $request->file('str'); 
					if ($str) {
						$validasi = $this->validate($request, [
							'str' => 'mimes:pdf|max:1024',
						],$message,$attribute);
						$sik = Sik::where('perizinan_id', $i->id)->first();
						if ($sik->str && file_exists(storage_path('app/public/' . $sik->str))) {
							\Storage::delete('public/' . $sik->str);
						}
						$path = $str->store('sik', 'public');
						$sik->str = $path;
						$sik->save();
						return $arrayName = array(
							'status' => 'success',
							'pesan' => 'STR disimpan!'
						);
					}
					return $arrayName = array(
						'status' => 'error',
						'pesan' => 'STR wajib diisi!',
					);	
				} // end upload STR

				// upload Rekomendasi Organisasi
				if($request->key == 'rekomendasi_org') {
					$rekomendasi_org = $request->file('rekomendasi_org'); 
					if ($rekomendasi_org) {
						$validasi = $this->validate($request, [
							'rekomendasi_org' => 'mimes:pdf|max:1024',
						],$message,$attribute);
						$sik = Sik::where('perizinan_id', $i->id)->first();
						if ($sik->rekomendasi_org && file_exists(storage_path('app/public/' . $sik->rekomendasi_org))) {
							\Storage::delete('public/' . $sik->rekomendasi_org);
						}
						$path = $rekomendasi_org->store('sik', 'public');
						$sik->rekomendasi_org = $path;
						$sik->save();
						return $arrayName = array(
							'status' => 'success',
							'pesan' => 'Rekomendasi organisasi disimpan!'
						);
					}
					return $arrayName = array(
						'status' => 'error',
						'pesan' => 'Rekomendasi organisasi wajib diisi!',
					);	
				} // end upload Rekomendasi Organisasi

				// upload Surat Keterangan Dari Pimpinan
				if($request->key == 'surat_keterangan') {
					$surat_keterangan = $request->file('surat_keterangan'); 
					if ($surat_keterangan) {
						$validasi = $this->validate($request, [
							'surat_keterangan' => 'mimes:pdf|max:1024',
						],$message,$attribute);
						$sik = Sik::where('perizinan_id', $i->id)->first();
						if ($sik->surat_keterangan && file_exists(storage_path('app/public/' . $sik->surat_keterangan))) {
							\Storage::delete('public/' . $sik->surat_keterangan);
						}
						$path = $surat_keterangan->store('sik', 'public');
						$sik->surat_keterangan = $path;
						$sik->save();
						return $arrayName = array(
							'status' => 'success',
							'pesan' => 'Surat keterangan dari pimpinan fasilitas pelayanan kesehatan disimpan!'
						);
					}
					return $arrayName = array(
						'status' => 'error',
						'pesan' => 'Surat keterangan dari pimpinan fasilitas pelayanan kesehatan wajib diisi!',
					);	
				} // end upload Surat Keterangan Dari Pimpinan


				// OPSIONAL
				// upload Surat Keluasan
				if($request->key == 'surat_keluasan') {
					$surat_keluasan = $request->file('surat_keluasan'); 
					if ($surat_keluasan) {
						$validasi = $this->validate($request, [
							'surat_keluasan' => 'mimes:pdf|max:1024',
						],$message,$attribute);
						$sik = Sik::where('perizinan_id', $i->id)->first();
						if ($sik->surat_keluasan && file_exists(storage_path('app/public/' . $sik->surat_keluasan))) {
							\Storage::delete('public/' . $sik->surat_keluasan);
						}
						$path = $surat_keluasan->store('sik', 'public');
						$sik->surat_keluasan = $path;
						$sik->save();
						return $arrayName = array(
							'status' => 'success',
							'pesan' => 'Surat keterangan keluasan disimpan!'
						);
					}
					return $arrayName = array(
						'status' => 'error',
						'pesan' => 'Surat keterangan keluasan wajib diisi!',
					);	
				} // end upload Surat Keterangan Dari Pimpinan

				// upload Berkas Pendukung
				if($request->key == 'berkas_pendukung') {
					$berkas_pendukung = $request->file('berkas_pendukung'); 
					if ($berkas_pendukung) {
						$validasi = $this->validate($request, [
							'berkas_pendukung' => 'mimes:pdf|max:1024',
						],$message,$attribute);
						$sik = Sik::where('perizinan_id', $i->id)->first();
						if ($sik->berkas_pendukung && file_exists(storage_path('app/public/' . $sik->berkas_pendukung))) {
							\Storage::delete('public/' . $sik->berkas_pendukung);
						}
						$path = $berkas_pendukung->store('sik', 'public');
						$sik->berkas_pendukung = $path;
						$sik->save();
						return $arrayName = array(
							'status' => 'success',
							'pesan' => 'Berkas pendukung keluasan disimpan!'
						);
					}
					return $arrayName = array(
						'status' => 'error',
						'pesan' => 'Berkas pendukung wajib diisi!',
					);	
				} // end upload Berkas Pendukung

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
			$perizinan = Perizinan::where('user_id', $auth)->where('jenis_izin', 'sik')->get();
			foreach($perizinan as $i) {
				if($i->status == null) {
					$cek = Sik::where('perizinan_id', $i->id)->first();
					if($cek->subizin_id == '') { return $this->err('Jenis Izin'); }
					if($cek->nama == '') { return $this->err('Nama'); }
					if($cek->tempat_lahir == '') { return $this->err('Tempat Lahir'); }
					if($cek->tanggal_lahir == '') { return $this->err('Tanggal Lahir'); }
					if($cek->nohp == '') { return $this->err('No HP'); }
					if($cek->rekomendasi_op == '') { return $this->err('No. Rekomendasi OP'); }
					if($cek->no_str == '') { return $this->err('No STR'); }
					if($cek->awal_str == '') { return $this->err('Tanggal Mulai Berlaku STR'); }
					if($cek->akhir_str == '') { return $this->err('Tanggal Berakhir'); }
					if($cek->alamat == '') { return $this->err('Berakhir'); }
					if($cek->nama_praktek == '') { return $this->err('Nama Praktek'); }
					if($cek->jalan == '') { return $this->err('Jalan'); }
					if($cek->kelurahan == '') { return $this->err('Kelurahan'); }
					if($cek->ktp == '') { return $this->err('KTP'); }
					if($cek->foto == '') { return $this->err('Foto'); }
					if($cek->str == '') { return $this->err('STR'); }
					if($cek->ijazah == '') { return $this->err('Ijazah'); }
					if($cek->rekomendasi_org == '') { return $this->err('Rekomendasi Organisasi'); }
					if($cek->surat_keterangan == '') { return $this->err('Surat Keterangan'); }

					Perizinan::where('id', $i->id)->update(array(
						'status' => '0',
						'created_at' => $time
					));
					return $arrayName = array(
						'status' => 'success',
						'pesan' => 'Berhasil Mengirim Berkas!'
					);

				} elseif($i->status == '0' || $i->status == '2') {
					return $arrayName = array(
						'status' => 'error',
						'pesan' => 'Saat ini Anda memiliki pengajuan perizinan Surat Izin Kerja (SIK)! Silakan Cek di tab Surat Perizinan Anda!'
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
		$data = Sik::find($id);
		return $data;
	}

	private function err($pesan) 
	{	
		return $err = array(
			'status' => 'error',
			'pesan' => 'Mohon mengisi '.$pesan
		);
	}

	public function update(Request $request, $id)
	{
		$message = [];
		$attribute = [
			'nama' => 'Nama',
			'alamat' => 'Alamat',
			'tempat_lahir' => 'Tempat Lahir',
			'tanggal_lahir' => 'Tanggal Lahir',
			'jenis_izin' => 'Jenis izin',
			'rekomendasi_op' => 'Rekomendasi OP',
			'no_str' => 'No. STR',
			'awal_str' => 'Tanggal Mulai Berlaku STR',
			'akhir_str' => 'Tanggal Berakhir STR',
			'nama_praktek' => 'Nama Praktek ',
			'jalan' => 'Jalan ',
			'kelurahan' => 'Kelurahan ',
			'kecamatan' => 'Kecamatan ',

			'surat_keterangan' => 'Surat Keterangan Pelayanan Kesehatan',
			'surat_keluasan' => 'Surat Keterangan Keluasan',
			'ktp' => 'KTP',
			'foto' => 'Foto',
			'str' => 'STR',
			'ijazah' => 'Ijazah',
			'rekomendasi_org' => 'Rekomendasi Organisasi Profesi',
			'berkas_pendukung' => 'Berkas Pendukung',

		];

		try {
			// BERKAS - FILE

				// upload KTP
			if($request->key == 'ktp') {
				$ktp = $request->file('ktp'); 
				if ($ktp) {
					$validasi = $this->validate($request, [
						'ktp' => 'image|mimes:jpeg,png,jpg|max:1024',
					],$message,$attribute);
					$sik = Sik::where('perizinan_id', $id)->first();
					if ($sik->ktp && file_exists(storage_path('app/public/' . $sik->ktp))) {
						\Storage::delete('public/' . $sik->ktp);
					}
					$path = $ktp->store('sik', 'public');
					$sik->ktp = $path;
					$sik->save();
					return $arrayName = array(
						'status' => 'success',
						'pesan' => 'KTP disimpan!'
					);
				}
				return $arrayName = array(
					'status' => 'error',
					'pesan' => 'KTP tidak diproses!',
				);	
			} // end upload ktp

			// upload Foto
			if($request->key == 'foto') {
				$foto = $request->file('foto'); 
				if ($foto) {
					$validasi = $this->validate($request, [
						'foto' => 'image|mimes:jpeg,png,jpg|max:1024',
					],$message,$attribute);
					$sik = Sik::where('perizinan_id', $id)->first();
					if ($sik->foto && file_exists(storage_path('app/public/' . $sik->foto))) {
						\Storage::delete('public/' . $sik->foto);
					}
					$path = $foto->store('sik', 'public');
					$sik->foto = $path;
					$sik->save();
					return $arrayName = array(
						'status' => 'success',
						'pesan' => 'Foto disimpan!'
					);
				}
				return $arrayName = array(
					'status' => 'error',
					'pesan' => 'Foto tidak diproses!',
				);	
			} // end upload Foto

			// upload Ijazah
			if($request->key == 'ijazah') {
				$ijazah = $request->file('ijazah'); 
				if ($ijazah) {
					$validasi = $this->validate($request, [
						'ijazah' => 'image|mimes:jpeg,png,jpg|max:1024',
					],$message,$attribute);
					$sik = Sik::where('perizinan_id', $id)->first();
					if ($sik->ijazah && file_exists(storage_path('app/public/' . $sik->ijazah))) {
						\Storage::delete('public/' . $sik->ijazah);
					}
					$path = $ijazah->store('sik', 'public');
					$sik->ijazah = $path;
					$sik->save();
					return $arrayName = array(
						'status' => 'success',
						'pesan' => 'Ijazah disimpan!'
					);
				}
				return $arrayName = array(
					'status' => 'error',
					'pesan' => 'Ijazah tidak diproses!',
				);	
			} // end upload Ijazah

			// upload STR
			if($request->key == 'str') {
				$str = $request->file('str'); 
				if ($str) {
					$validasi = $this->validate($request, [
						'str' => 'mimes:pdf|max:1024',
					],$message,$attribute);
					$sik = Sik::where('perizinan_id', $id)->first();
					if ($sik->str && file_exists(storage_path('app/public/' . $sik->str))) {
						\Storage::delete('public/' . $sik->str);
					}
					$path = $str->store('sik', 'public');
					$sik->str = $path;
					$sik->save();
					return $arrayName = array(
						'status' => 'success',
						'pesan' => 'STR disimpan!'
					);
				}
				return $arrayName = array(
					'status' => 'error',
					'pesan' => 'STR tidak diproses!',
				);	
			} // end upload STR

			// upload Rekomendasi Organisasi
			if($request->key == 'rekomendasi_org') {
				$rekomendasi_org = $request->file('rekomendasi_org'); 
				if ($rekomendasi_org) {
					$validasi = $this->validate($request, [
						'rekomendasi_org' => 'mimes:pdf|max:1024',
					],$message,$attribute);
					$sik = Sik::where('perizinan_id', $id)->first();
					if ($sik->rekomendasi_org && file_exists(storage_path('app/public/' . $sik->rekomendasi_org))) {
						\Storage::delete('public/' . $sik->rekomendasi_org);
					}
					$path = $rekomendasi_org->store('sik', 'public');
					$sik->rekomendasi_org = $path;
					$sik->save();
					return $arrayName = array(
						'status' => 'success',
						'pesan' => 'Rekomendasi organisasi disimpan!'
					);
				}
				return $arrayName = array(
					'status' => 'error',
					'pesan' => 'Rekomendasi organisasi tidak diproses!',
				);	
			} // end upload Rekomendasi Organisasi

			// upload Surat Keterangan Dari Pimpinan
			if($request->key == 'surat_keterangan') {
				$surat_keterangan = $request->file('surat_keterangan'); 
				if ($surat_keterangan) {
					$validasi = $this->validate($request, [
						'surat_keterangan' => 'mimes:pdf|max:1024',
					],$message,$attribute);
					$sik = Sik::where('perizinan_id', $id)->first();
					if ($sik->surat_keterangan && file_exists(storage_path('app/public/' . $sik->surat_keterangan))) {
						\Storage::delete('public/' . $sik->surat_keterangan);
					}
					$path = $surat_keterangan->store('sik', 'public');
					$sik->surat_keterangan = $path;
					$sik->save();
					return $arrayName = array(
						'status' => 'success',
						'pesan' => 'Surat keterangan dari pimpinan fasilitas pelayanan kesehatan disimpan!'
					);
				}
				return $arrayName = array(
					'status' => 'error',
					'pesan' => 'Surat keterangan dari pimpinan fasilitas pelayanan kesehatan tidak diproses!',
				);	
			} // end upload Surat Keterangan Dari Pimpinan


			// OPSIONAL
			// upload Surat Keluasan
			if($request->key == 'surat_keluasan') {
				$surat_keluasan = $request->file('surat_keluasan'); 
				if ($surat_keluasan) {
					$validasi = $this->validate($request, [
						'surat_keluasan' => 'mimes:pdf|max:1024',
					],$message,$attribute);
					$sik = Sik::where('perizinan_id', $id)->first();
					if ($sik->surat_keluasan && file_exists(storage_path('app/public/' . $sik->surat_keluasan))) {
						\Storage::delete('public/' . $sik->surat_keluasan);
					}
					$path = $surat_keluasan->store('sik', 'public');
					$sik->surat_keluasan = $path;
					$sik->save();
					return $arrayName = array(
						'status' => 'success',
						'pesan' => 'Surat keterangan keluasan disimpan!'
					);
				}
				return $arrayName = array(
					'status' => 'error',
					'pesan' => 'Surat keterangan keluasan tidak diproses!',
				);	
			} // end upload Surat Keterangan Dari Pimpinan

			// upload Berkas Pendukung
			if($request->key == 'berkas_pendukung') {
				$berkas_pendukung = $request->file('berkas_pendukung'); 
				if ($berkas_pendukung) {
					$validasi = $this->validate($request, [
						'berkas_pendukung' => 'mimes:pdf|max:1024',
					],$message,$attribute);
					$sik = Sik::where('perizinan_id', $id)->first();
					if ($sik->berkas_pendukung && file_exists(storage_path('app/public/' . $sik->berkas_pendukung))) {
						\Storage::delete('public/' . $sik->berkas_pendukung);
					}
					$path = $berkas_pendukung->store('sik', 'public');
					$sik->berkas_pendukung = $path;
					$sik->save();
					return $arrayName = array(
						'status' => 'success',
						'pesan' => 'Berkas pendukung keluasan disimpan!'
					);
				}
				return $arrayName = array(
					'status' => 'error',
					'pesan' => 'Berkas pendukung tidak diproses!',
				);	
			} // end upload Berkas Pendukung

			// TEXT
			$validasi = $this->validate($request, [
				'revisi' => 'required|string',
			],$message,$attribute);
			$data = Sik::where('perizinan_id', $id)->update(array($request->key => $request->revisi));
			return redirect()->back()->with('success',$attribute[$request->key].' diperbarui');

		} catch(Exception $e) {
			return redirect()->back()->with('not_found', $e->getMessage());
		} catch(QueryException $e) {
			return redirect()->back()->with('not_found', $e->getMessage());
		}
	}

}
