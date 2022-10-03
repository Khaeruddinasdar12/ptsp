<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sip;
use App\Models\Subizin;
use App\Models\Perizinan;
use App\Models\Kelurahan;
use App\Models\Jadwal;
use Auth;
use Carbon\Carbon;
use QueryException;
use Exception;
class SipController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

	public function index()
	{
	}

	public function kelurahan($kec) // cek kelurahan
	{
		// return $kec;
		$data = Kelurahan::where('kecamatan', $kec)->get();
		return $data;
	}

	public function create()
	{
		$auth = Auth::user()->id;
		$old = Perizinan::where('user_id', $auth)->where('jenis_izin', 'sip')->where('status', null)->first();
		if(!$old) {
			$old = null;
		}
		$data = Subizin::where('jenis', 'sip')->get();
		// $kel = 
		// return $data;
		return view('user.sip.create', ['data' => $data, 'old' => $old]);
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
		try {
			$auth = Auth::user()->id;
			$perizinan = Perizinan::where('user_id', $auth)->where('jenis_izin', 'sip')->get();
			foreach($perizinan as $i) {

				if($i->status == null) {
					Sip::where('perizinan_id', $i->id)->update(array(
						'nama' => $request->nama,
						'nohp' => $request->nohp,
						'alamat' => $request->alamat,
						'tanggal_lahir' => $request->tanggal_lahir,
						'tempat_lahir' => $request->tempat_lahir,
					));
					return $arrayName = array(
						'status' => 'success',
						'pesan' => 'Berhasil Menyimpan!'
					);

				} elseif($i->status == '0' || $i->status == '2') {
					return $arrayName = array(
						'status' => 'error',
						'pesan' => 'Saat ini Anda memiliki pengajuan perizinan Surat Izin Prakti (SIP)! Silakan Cek di tab Surat Perizinan Anda!'
					);
				}
			}

			$no_tiket = strtoupper(substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, 6));
			$izin = Perizinan::create(array(
				'user_id' => $auth,
				'jenis_izin' => 'sip',
				'status' => null,
				'no_tiket' => 'SIP-'.$no_tiket
			));

			Sip::create(array(
				'perizinan_id' => $izin->id,
				'nama' => $request->nama,
				'nohp' => $request->nohp,
				'alamat' => $request->alamat,
				'tanggal_lahir' => $request->tanggal_lahir,
				'tempat_lahir' => $request->tempat_lahir,
			));

			return $arrayName = array(
				'status' => 'success',
				'pesan' => 'Data disimpan!'
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
			'akhir_str' => 'required|date',
		];
		$message = [];
		$attribute = [
			'jenis_izin' => 'Jenis Izin',
			'no_str' => 'Nomor STR',	
			'awal_str' => 'Tanggal Mulai Berlaku STR',
			'akhir_str' => 'Tanggal Berakhir STR',
		];
		$validasi = $this->validate($request,$rules,$message,$attribute);
		try {
			$auth = Auth::user()->id;
			$perizinan = Perizinan::where('user_id', $auth)->where('jenis_izin', 'sip')->get();
			foreach($perizinan as $i) {

				if($i->status == null) {
					Sip::where('perizinan_id', $i->id)->update(array(
						'subizin_id' => $request->jenis_izin,
						'no_str' => $request->no_str,
						'awal_str' => $request->awal_str,
						'akhir_str' => $request->akhir_str,
					));
					return $arrayName = array(
						'status' => 'success',
						'pesan' => 'Berhasil Menyimpan!'
					);

				} elseif($i->status == '0' || $i->status == '2') {
					return $arrayName = array(
						'status' => 'error',
						'pesan' => 'Saat ini Anda memiliki pengajuan perizinan Surat Izin Prakti (SIP)! Silakan Cek di tab Surat Perizinan Anda!'
					);
				}
			}

			$no_tiket = strtoupper(substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, 6));
			$izin = Perizinan::create(array(
				'user_id' => $auth,
				'jenis_izin' => 'sip',
				'status' => null,
				'no_tiket' => 'SIP-'.$no_tiket
			));

			Sip::create(array(
				'perizinan_id' => $izin->id,
				'subizin_id' => $request->jenis_izin,
				'no_str' => $request->no_str,
				'awal_str' => $request->awal_str,
				'akhir_str' => $request->akhir_str,
			));

			return $arrayName = array(
				'status' => 'success',
				'pesan' => 'Data disimpan!'
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
	public function praktik1(Request $request)
	{
		$rules = [
			'nama_praktek1' => 'required|string',
			'jalan1' => 'required|string',
			'kelurahan1' => 'required|string',			
		];
		$message = [];
		$attribute = [
			'nama_praktek1' => 'Nama Praktek 1',
			'jalan1' => 'Jalan 1',
			'kelurahan1' => 'Kelurahan 1',
			'kecamatan1' => 'Kecamatan 1',
		];
		$validasi = $this->validate($request,$rules,$message,$attribute);
		$jam_buka1 = null;
		$jam_tutup1 = null;
		if($request->hari_buka1 || $request->hari_tutup1) {
			$validasi = $this->validate($request, [
				'hari_buka1'  => 'required|string',
				'hari_tutup1'  => 'required|string',
				'jam_buka1'  => 'required|string',
				'menitbuka1' => 'required|string',
				'jam_tutup1'  => 'required|string',
				'menittutup1' => 'required|string',
			],$message,$attribute);
			$jam_buka1 = $request->jam_buka1 .':'. $request->menitbuka1;
			$jam_tutup1 = $request->jam_tutup1 .':'. $request->menittutup1;
		} else {
			$request->hari_buka1 = null;
			$request->hari_tutup1 = null;	
		}	

		try {
			$auth = Auth::user()->id;
			$perizinan = Perizinan::where('user_id', $auth)->where('jenis_izin', 'sip')->get();
			foreach($perizinan as $i) {
				if($i->status == null) {
					Sip::where('perizinan_id', $i->id)->update(array(
						'nama_praktek1' => $request->nama_praktek1,
						'jalan1' => $request->jalan1,
						'kelurahan1' => $request->kelurahan1,
						'hari_buka1' => $request->hari_buka1,
						'hari_tutup1' => $request->hari_tutup1,
						'jam_buka1' => $jam_buka1,
						'jam_tutup1' => $jam_tutup1,
					));
					return $arrayName = array(
						'status' => 'success',
						'pesan' => 'Data Disimpan!'
					);

				} elseif($i->status == '0' || $i->status == '2') {
					return $arrayName = array(
						'status' => 'error',
						'pesan' => 'Saat ini Anda memiliki pengajuan perizinan Surat Izin Praktik (SIP)! Silakan Cek di tab Surat Perizinan Anda!'
					);
				}
			}

			$no_tiket = strtoupper(substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, 6));
			$izin = Perizinan::create(array(
				'user_id' => $auth,
				'jenis_izin' => 'sip',
				'status' => null,
				'no_tiket' => 'SIP-'.$no_tiket
			));

			Sip::create(array(
				'perizinan_id' => $izin->id,

				'nama_praktek1' => $request->nama_praktek1,
				'jalan1' => $request->jalan1,
				'kelurahan1' => $request->kelurahan1,
				'hari_buka1' => $request->hari_buka1,
				'hari_tutup1' => $request->hari_tutup1,
				'jam_buka1' => $jam_buka1,
				'jam_tutup1' => $jam_tutup1,
			));

			return $arrayName = array(
				'status' => 'success',
				'pesan' => 'Data disimpan!'
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

	public function praktik2(Request $request)
	{
		$rules = [
			'nama_praktek2' => 'required|string',
			'jalan2' => 'required|string',
			'kelurahan2' => 'required|string',			
		];
		$message = [];
		$attribute = [
			'nama_praktek2' => 'Nama Praktek 2',
			'jalan2' => 'Jalan 2',
			'kelurahan2' => 'Kelurahan 2',
			'kecamatan2' => 'Kecamatan 2',
		];
		$validasi = $this->validate($request,$rules,$message,$attribute);
		$jam_buka2 = null;
		$jam_tutup2 = null;
		if($request->hari_buka2 || $request->hari_tutup2) {
			$validasi = $this->validate($request, [
				'hari_buka2'  => 'required|string',
				'hari_tutup2'  => 'required|string',
				'jam_buka2'  => 'required|string',
				'menitbuka2' => 'required|string',
				'jam_tutup2'  => 'required|string',
				'menittutup2' => 'required|string',
			],$message,$attribute);
			$jam_buka2 = $request->jam_buka2 .':'. $request->menitbuka2;
			$jam_tutup2 = $request->jam_tutup2 .':'. $request->menittutup2;
		} else {
			$request->hari_buka2 = null;
			$request->hari_tutup2 = null;	
		}	

		try {
			$auth = Auth::user()->id;
			$perizinan = Perizinan::where('user_id', $auth)->where('jenis_izin', 'sip')->get();
			foreach($perizinan as $i) {
				if($i->status == null) {
					$sip = Sip::where('perizinan_id', $i->id)->first();
					if($sip->nama_praktek1 == '') {
						return $arrayName = array(
							'status' => 'error',
							'pesan' => 'Anda Harus Mengisi Praktik 1 Terlebih Dahulu!'
						);
					}
					Sip::where('perizinan_id', $i->id)->update(array(
						'nama_praktek2' => $request->nama_praktek2,
						'jalan2' => $request->jalan2,
						'kelurahan2' => $request->kelurahan2,
						'hari_buka2' => $request->hari_buka2,
						'hari_tutup2' => $request->hari_tutup2,
						'jam_buka2' => $jam_buka2,
						'jam_tutup2' => $jam_tutup2,
					));
					return $arrayName = array(
						'status' => 'success',
						'pesan' => 'Data Disimpan!'
					);

				} elseif($i->status == '0' || $i->status == '2') {
					return $arrayName = array(
						'status' => 'error',
						'pesan' => 'Saat ini Anda memiliki pengajuan perizinan Surat Izin Praktik (SIP)! Silakan Cek di tab Surat Perizinan Anda!'
					);
				}
			}

			return $arrayName = array(
				'status' => 'error',
				'pesan' => 'Anda Harus Mengisi Praktik 1 Terlebih Dahulu!'
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

	public function praktik3(Request $request)
	{
		$rules = [
			'nama_praktek3' => 'required|string',
			'jalan3' => 'required|string',
			'kelurahan3' => 'required|string',			
		];
		$message = [];
		$attribute = [
			'nama_praktek3' => 'Nama Praktek 3',
			'jalan3' => 'Jalan 3',
			'kelurahan3' => 'Kelurahan 3',
			'kecamatan3' => 'Kecamatan 3',
		];
		$validasi = $this->validate($request,$rules,$message,$attribute);
		$jam_buka3 = null;
		$jam_tutup3 = null;
		if($request->hari_buka3 || $request->hari_tutup3) {
			$validasi = $this->validate($request, [
				'hari_buka3'  => 'required|string',
				'hari_tutup3'  => 'required|string',
				'jam_buka3'  => 'required|string',
				'menitbuka3' => 'required|string',
				'jam_tutup3'  => 'required|string',
				'menittutup3' => 'required|string',
			],$message,$attribute);
			$jam_buka3 = $request->jam_buka3 .':'. $request->menitbuka3;
			$jam_tutup3 = $request->jam_tutup3 .':'. $request->menittutup3;
		} else {
			$request->hari_buka3 = null;
			$request->hari_tutup3 = null;	
		}	

		try {
			$auth = Auth::user()->id;
			$perizinan = Perizinan::where('user_id', $auth)->where('jenis_izin', 'sip')->get();
			foreach($perizinan as $i) {
				if($i->status == null) {
					$sip = Sip::where('perizinan_id', $i->id)->first();
					if($sip->nama_praktek1 == '' || $sip->nama_praktek2 == '') {
						return $arrayName = array(
							'status' => 'error',
							'pesan' => 'Anda Harus Mengisi Praktik 1 & 2 Terlebih Dahulu!'
						);
					}
					Sip::where('perizinan_id', $i->id)->update(array(
						'nama_praktek3' => $request->nama_praktek3,
						'jalan3' => $request->jalan3,
						'kelurahan3' => $request->kelurahan3,
						'hari_buka3' => $request->hari_buka3,
						'hari_tutup3' => $request->hari_tutup3,
						'jam_buka3' => $jam_buka3,
						'jam_tutup3' => $jam_tutup3,
					));
					return $arrayName = array(
						'status' => 'success',
						'pesan' => 'Data Disimpan!'
					);

				} elseif($i->status == '0' || $i->status == '2') {
					return $arrayName = array(
						'status' => 'error',
						'pesan' => 'Saat ini Anda memiliki pengajuan perizinan Surat Izin Praktik (SIP)! Silakan Cek di tab Surat Perizinan Anda!'
					);
				}
			}

			return $arrayName = array(
				'status' => 'error',
				'pesan' => 'Anda Harus Mengisi Praktik 1 & 2 Terlebih Dahulu!'
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


	public function tab3(Request $request)
	{
		$rules = [
			'nama_praktek1' => 'required|string',
			'jalan1' => 'required|string',
			'kelurahan1' => 'required|string',			
		];
		$message = [];
		$attribute = [
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
		];
		$validasi = $this->validate($request,$rules,$message,$attribute);

		$jam_buka2 = null;
		$jam_tutup2 = null;
		if($request->nama_praktek2 || $request->jalan2 || $request->hari_buka2 || $request->hari_tutup2) {
			$validasi = $this->validate($request, [
				'nama_praktek2' => 'required|string',
				'jalan2' => 'required|string',
				'kelurahan2' => 'required|string',
			],$message,$attribute);
			
			if($request->hari_buka2 || $request->hari_tutup2) {
				$validasi = $this->validate($request, [
					'hari_buka2'  => 'required|string',
					'hari_tutup2'  => 'required|string',
					'jam_buka2'  => 'required|string',
					'menitbuka2' => 'required|string',
					'jam_tutup2'  => 'required|string',
					'menittutup2' => 'required|string',
				],$message,$attribute);
				$jam_buka2 = $request->jam_buka2 .':'. $request->menitbuka2;
				$jam_tutup2 = $request->jam_tutup2 .':'. $request->menittutup2;
			} else {
				$request->hari_buka2 = null;
				$request->hari_tutup2 = null;	
			}
		} else {
			$request->kelurahan2 = null;
		}

		$jam_buka3 = null;
		$jam_tutup3 = null;
		if($request->nama_praktek3 || $request->jalan3 || $request->hari_buka3 || $request->hari_tutup3) {
			$validasi = $this->validate($request, [
				'nama_praktek3'  => 'required|string',
				'jalan3'  => 'required|string',
				'kelurahan3'  => 'required|string',
			],$message,$attribute);
			
			if($request->hari_buka3 || $request->hari_tutup3) {
				$validasi = $this->validate($request, [
					'hari_buka3'  => 'required|string',
					'hari_tutup3'  => 'required|string',
					'jam_buka3'  => 'required|string',
					'menitbuka3' => 'required|string',
					'jam_tutup3'  => 'required|string',
					'menittutup3' => 'required|string',
				],$message,$attribute);
				$jam_buka3 = $request->jam_buka3 .':'. $request->menitbuka3;
				$jam_tutup3 = $request->jam_tutup3 .':'. $request->menittutup3;
			} else {
				$request->hari_buka3 = null;
				$request->hari_tutup3 = null;	
			}
		} else {
			$request->kelurahan3 = null;
		}

		// Jadwal Validate
		$jam_buka1 = null;
		$jam_tutup1 = null;
		if($request->hari_buka1 || $request->hari_tutup1) {
			$validasi = $this->validate($request, [
				'hari_buka1'  => 'required|string',
				'hari_tutup1'  => 'required|string',
				'jam_buka1'  => 'required|string',
				'menitbuka1' => 'required|string',
				'jam_tutup1'  => 'required|string',
				'menittutup1' => 'required|string',
			],$message,$attribute);
			$jam_buka1 = $request->jam_buka1 .':'. $request->menitbuka1;
			$jam_tutup1 = $request->jam_tutup1 .':'. $request->menittutup1;
		} else {
			$request->hari_buka1 = null;
			$request->hari_tutup1 = null;	
		}		
		// End Jadwal validate


		try {
			$auth = Auth::user()->id;
			$perizinan = Perizinan::where('user_id', $auth)->where('jenis_izin', 'sip')->get();
			foreach($perizinan as $i) {

				if($i->status == null) {
					Sip::where('perizinan_id', $i->id)->update(array(
						'nama_praktek1' => $request->nama_praktek1,
						'jalan1' => $request->jalan1,
						'kelurahan1' => $request->kelurahan1,
						'hari_buka1' => $request->hari_buka1,
						'hari_tutup1' => $request->hari_tutup1,
						'jam_buka1' => $jam_buka1,
						'jam_tutup1' => $jam_tutup1,

						'nama_praktek2' => $request->nama_praktek2,
						'jalan2' => $request->jalan2,
						'kelurahan2' => $request->kelurahan2,
						'hari_buka2' => $request->hari_buka2,
						'hari_tutup2' => $request->hari_tutup2,
						'jam_buka2' => $jam_buka2,
						'jam_tutup2' => $jam_tutup2,

						'nama_praktek3' => $request->nama_praktek3,
						'jalan3' => $request->jalan3,
						'kelurahan3' => $request->kelurahan3,
						'hari_buka3' => $request->hari_buka3,
						'hari_tutup3' => $request->hari_tutup3,
						'jam_buka3' => $jam_buka3,
						'jam_tutup3' => $jam_tutup3,

					));
					return $arrayName = array(
						'status' => 'success',
						'pesan' => 'Data Disimpan!'
					);

				} elseif($i->status == '0' || $i->status == '2') {
					return $arrayName = array(
						'status' => 'error',
						'pesan' => 'Saat ini Anda memiliki pengajuan perizinan Surat Izin Praktik (SIP)! Silakan Cek di tab Surat Perizinan Anda!'
					);
				}
			}

			$no_tiket = strtoupper(substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, 6));
			$izin = Perizinan::create(array(
				'user_id' => $auth,
				'jenis_izin' => 'sip',
				'status' => null,
				'no_tiket' => 'SIP-'.$no_tiket
			));

			Sip::create(array(
				'perizinan_id' => $izin->id,

				'nama_praktek1' => $request->nama_praktek1,
				'jalan1' => $request->jalan1,
				'kelurahan1' => $request->kelurahan1,
				'hari_buka1' => $request->hari_buka1,
				'hari_tutup1' => $request->hari_tutup1,
				'jam_buka1' => $jam_buka1,
				'jam_tutup1' => $jam_tutup1,

				'nama_praktek2' => $request->nama_praktek2,
				'jalan2' => $request->jalan2,
				'kelurahan2' => $request->kelurahan2,
				'hari_buka2' => $request->hari_buka2,
				'hari_tutup2' => $request->hari_tutup2,
				'jam_buka2' => $jam_buka2,
				'jam_tutup2' => $jam_tutup2,

				'nama_praktek3' => $request->nama_praktek3,
				'jalan3' => $request->jalan3,
				'kelurahan3' => $request->kelurahan3,
				'hari_buka3' => $request->hari_buka3,
				'hari_tutup3' => $request->hari_tutup3,
				'jam_buka3' => $jam_buka3,
				'jam_tutup3' => $jam_tutup3,
			));

			return $arrayName = array(
				'status' => 'success',
				'pesan' => 'Data disimpan!'
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
		$perizinan = Perizinan::where('user_id', $auth)->where('jenis_izin', 'sip')->get();

		foreach($perizinan as $i) {

			if($i->status == null) {

				// upload KTP
				if($request->key == 'ktp') {
					$ktp = $request->file('ktp'); 
					if ($ktp) {
						$validasi = $this->validate($request, [
							'ktp' => 'image|mimes:jpeg,png,jpg|max:1024',
						],$message,$attribute);
						$sip = Sip::where('perizinan_id', $i->id)->first();
						if ($sip->ktp && file_exists(storage_path('app/public/' . $sip->ktp))) {
							\Storage::delete('public/' . $sip->ktp);
						}
						$path = $ktp->store('sip', 'public');
						$sip->ktp = $path;
						$sip->save();
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

				// upload pas foto
				if($request->key == 'foto') {
					$foto = $request->file('foto'); 
					if ($foto) {
						$validasi = $this->validate($request, [
							'foto' => 'image|mimes:jpeg,png,jpg|max:1024',
						],$message,$attribute);
						$sip = Sip::where('perizinan_id', $i->id)->first();
						if ($sip->foto && file_exists(storage_path('app/public/' . $sip->foto))) {
							\Storage::delete('public/' . $sip->foto);
						}
						$path = $foto->store('sip', 'public');
						$sip->foto = $path;
						$sip->save();
						return $arrayName = array(
							'status' => 'success',
							'pesan' => 'Pas Foto disimpan!'
						);
					}
					return $arrayName = array(
						'status' => 'error',
						'pesan' => 'Pas Foto tidak diproses!',
					);	
				} // end upload pas foto

				// upload pas STR
				if($request->key == 'str') {
					$str = $request->file('str'); 
					if ($str) {
						$validasi = $this->validate($request, [
							'str' => 'mimes:pdf|max:1024',
						],$message,$attribute);
						$sip = Sip::where('perizinan_id', $i->id)->first();
						if ($sip->str && file_exists(storage_path('app/public/' . $sip->str))) {
							\Storage::delete('public/' . $sip->str);
						}
						$path = $str->store('sip', 'public');
						$sip->str = $path;
						$sip->save();
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
						$sip = Sip::where('perizinan_id', $i->id)->first();
						if ($sip->rekomendasi_org && file_exists(storage_path('app/public/' . $sip->rekomendasi_org))) {
							\Storage::delete('public/' . $sip->rekomendasi_org);
						}
						$path = $rekomendasi_org->store('sip', 'public');
						$sip->rekomendasi_org = $path;
						$sip->save();
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

				// upload Surat Keterangan
				if($request->key == 'surat_keterangan') {
					$surat_keterangan = $request->file('surat_keterangan'); 
					if ($surat_keterangan) {
						$validasi = $this->validate($request, [
							'surat_keterangan' => 'mimes:pdf|max:1024',
						],$message,$attribute);
						$sip = Sip::where('perizinan_id', $i->id)->first();
						if ($sip->surat_keterangan && file_exists(storage_path('app/public/' . $sip->surat_keterangan))) {
							\Storage::delete('public/' . $sip->surat_keterangan);
						}
						$path = $surat_keterangan->store('sip', 'public');
						$sip->surat_keterangan = $path;
						$sip->save();
						return $arrayName = array(
							'status' => 'success',
							'pesan' => 'Surat keterangan pelayanan kesehatan disimpan!'
						);
					}
					return $arrayName = array(
						'status' => 'error',
						'pesan' => 'Surat keterangan pelayanan kesehatan tidak diproses!',
					);	
				} // end upload Surat Keterangan

				// OPSIONAL
				// upload Surat Persetujuan
				if($request->key == 'surat_persetujuan') {
					$surat_persetujuan = $request->file('surat_persetujuan'); 
					if ($surat_persetujuan) {
						$validasi = $this->validate($request, [
							'surat_persetujuan' => 'mimes:pdf|max:1024',
						],$message,$attribute);
						$sip = Sip::where('perizinan_id', $i->id)->first();
						if ($sip->surat_persetujuan && file_exists(storage_path('app/public/' . $sip->surat_persetujuan))) {
							\Storage::delete('public/' . $sip->surat_persetujuan);
						}
						$path = $surat_persetujuan->store('sip', 'public');
						$sip->surat_persetujuan = $path;
						$sip->save();
						return $arrayName = array(
							'status' => 'success',
							'pesan' => 'Surat persetujuan pimpinan instansi disimpan!'
						);
					}
					return $arrayName = array(
						'status' => 'error',
						'pesan' => 'Surat persetujuan pimpinan instansi tidak diproses!',
					);	
				} // end upload Surat Persetujuan

				// upload berkas pendukung
				if($request->key == 'berkas_pendukung') {
					$berkas_pendukung = $request->file('berkas_pendukung'); 
					if ($berkas_pendukung) {
						$validasi = $this->validate($request, [
							'berkas_pendukung' => 'mimes:pdf|max:1024',
						],$message,$attribute);
						$sip = Sip::where('perizinan_id', $i->id)->first();
						if ($sip->berkas_pendukung && file_exists(storage_path('app/public/' . $sip->berkas_pendukung))) {
							\Storage::delete('public/' . $sip->berkas_pendukung);
						}
						$path = $berkas_pendukung->store('sip', 'public');
						$sip->berkas_pendukung = $path;
						$sip->save();
						return $arrayName = array(
							'status' => 'success',
							'pesan' => 'Berkas pendukung disimpan!'
						);
					}
					return $arrayName = array(
						'status' => 'error',
						'pesan' => 'Berkas pendukung tidak diproses!',
					);	
				} // end upload Surat Persetujuan


			} elseif($i->status == '0' || $i->status == '2') {
				return $arrayName = array(
					'status' => 'error',
					'pesan' => 'Saat ini Anda memiliki pengajuan perizinan Pendidikan! Silakan Cek di tab Surat Perizinan Anda!'
				);
			}
		}
	} //END TAB 4

	public function tab5(Request $request)
	{
		try {
			$time = Carbon::now();
			$auth = Auth::user()->id;
			$perizinan = Perizinan::where('user_id', $auth)->where('jenis_izin', 'sip')->get();
			
			foreach($perizinan as $i) {
				if($i->status == null) {
					$cek = Sip::where('perizinan_id', $i->id)->first();
					if($cek->subizin_id == '7') { 
						if($cek->hari_buka1 == '' || $cek->hari_tutup1 == '' ) {
							return $this->err('Jadwal Praktek 1');
						}
						if($cek->nama_praktek2 && ($cek->hari_buka2 == '' || $cek->hari_tutup2 == '')) {
							return $this->err('Jadwal Praktek 2');
						}
						if($cek->nama_praktek3 && ($cek->hari_buka3 == '' || $cek->hari_tutup3 == '')) {
							return $this->err('Jadwal Praktek 3');
						}
					}

					if($cek->subizin_id == '') { return $this->err('Jenis Izin'); }
					if($cek->nama == '') { return $this->err('Nama'); }
					if($cek->nohp == '') { return $this->err('No HP'); }
					if($cek->tempat_lahir == '') { return $this->err('Tempat Lahir'); }
					if($cek->tanggal_lahir == '') { return $this->err('Tanggal Lahir'); }
					if($cek->alamat == '') { return $this->err('Alamat'); }
					if($cek->no_str == '') { return $this->err('No STR'); }
					if($cek->awal_str == '') { return $this->err('Tanggal Mulai Berlaku STR'); }
					if($cek->akhir_str == '') { return $this->err('Tanggal Berakhir STR'); }
					if($cek->nama_praktek1 == '') { return $this->err('Nama Praktek 1'); }
					if($cek->jalan1 == '') { return $this->err('Jalan 1'); }
					if($cek->kelurahan1 == '') { return $this->err('Kelurahan 1'); }
					if($cek->ktp == '') { return $this->err('KTP'); }
					if($cek->foto == '') { return $this->err('Foto'); }
					if($cek->str == '') { return $this->err('STR'); }
					if($cek->rekomendasi_org == '') { return $this->err('Rekomendasi Organisas'); }
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
						'pesan' => 'Saat ini Anda memiliki pengajuan perizinan Surat Izin Praktik (SIP)! Silakan Cek di tab Surat Perizinan Anda!'
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
		$data = Sip::find($id);
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
			'jenis_izin' => 'Jenis izin',
			'no_str' => 'No. STR',
			'awal_str' => 'Tanggal Mulai Berlaku STR',
			'akhir_str' => 'Tanggal Berakhir STR',
			'nama_praktek1' => 'Nama Praktek 1',
			'jalan1' => 'Jalan 1',
			'kelurahan1' => 'Kelurahan 1',
			'kecamatan1' => 'Kecamatan 1',
			'jadwal1' => 'Jalan Praktek 1',

			'nama_praktek2' => 'Nama Praktek 2',
			'jalan2' => 'Jalan 2',
			'kelurahan2' => 'Kelurahan 2',
			'jadwal2' => 'Jalan Praktek 2',

			'nama_praktek3' => 'Nama Praktek 3',
			'jalan3' => 'Jalan 3',
			'kelurahan3' => 'Kelurahan 3',
			'jadwal3' => 'Jalan Praktek 3',

			'surat_keterangan' => 'Surat Keterangan Pelayanan Kesehatan',
			'surat_persetujuan' => 'Surat Persetujuan Pimpinan Instansi',
			'ktp' => 'KTP',
			'foto' => 'Foto',
			'str' => 'STR',
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
					$sip = Sip::where('perizinan_id', $id)->first();
					if ($sip->ktp && file_exists(storage_path('app/public/' . $sip->ktp))) {
						\Storage::delete('public/' . $sip->ktp);
					}
					$path = $ktp->store('sip', 'public');
					$sip->ktp = $path;
					$sip->save();
					return redirect()->back()->with('success', 'KTP disimpan!');
				}
				return redirect()->back()->with('not_found', 'KTP tidak diproses!');
			} // end upload ktp

				// upload pas foto
			if($request->key == 'foto') {
				$foto = $request->file('foto'); 
				if ($foto) {
					$validasi = $this->validate($request, [
						'foto' => 'image|mimes:jpeg,png,jpg|max:1024',
					],$message,$attribute);
					$sip = Sip::where('perizinan_id', $id)->first();
					if ($sip->foto && file_exists(storage_path('app/public/' . $sip->foto))) {
						\Storage::delete('public/' . $sip->foto);
					}
					$path = $foto->store('sip', 'public');
					$sip->foto = $path;
					$sip->save();
					return redirect()->back()->with('success', 'Pas Foto disimpan');
				}
				return redirect()->back()->with('not_found', 'Pas Foto tidak diproses!');
			} // end upload pas foto

				// upload pas STR
			if($request->key == 'str') {
				$str = $request->file('str'); 
				if ($str) {
					$validasi = $this->validate($request, [
						'str' => 'mimes:pdf|max:1024',
					],$message,$attribute);
					$sip = Sip::where('perizinan_id', $id)->first();
					if ($sip->str && file_exists(storage_path('app/public/' . $sip->str))) {
						\Storage::delete('public/' . $sip->str);
					}
					$path = $str->store('sip', 'public');
					$sip->str = $path;
					$sip->save();
					return redirect()->back()->with('success', 'STR disimpan!');
				}
				return redirect()->back()->with('not_found', 'STR tidak diproses');
			} // end upload STR

				// upload Rekomendasi Organisasi
			if($request->key == 'rekomendasi_org') {
				$rekomendasi_org = $request->file('rekomendasi_org'); 
				if ($rekomendasi_org) {
					$validasi = $this->validate($request, [
						'rekomendasi_org' => 'mimes:pdf|max:1024',
					],$message,$attribute);
					$sip = Sip::where('perizinan_id', $id)->first();
					if ($sip->rekomendasi_org && file_exists(storage_path('app/public/' . $sip->rekomendasi_org))) {
						\Storage::delete('public/' . $sip->rekomendasi_org);
					}
					$path = $rekomendasi_org->store('sip', 'public');
					$sip->rekomendasi_org = $path;
					$sip->save();
					return redirect()->back()->with('success', 'Rekomendasi organisasi disimpan!');
				}
				return redirect()->back()->with('not_found', 'Rekomendasi organisasi tidak diproses');
			} // end upload Rekomendasi Organisasi

				// upload Surat Keterangan
			if($request->key == 'surat_keterangan') {
				$surat_keterangan = $request->file('surat_keterangan'); 
				if ($surat_keterangan) {
					$validasi = $this->validate($request, [
						'surat_keterangan' => 'mimes:pdf|max:1024',
					],$message,$attribute);
					$sip = Sip::where('perizinan_id', $id)->first();
					if ($sip->surat_keterangan && file_exists(storage_path('app/public/' . $sip->surat_keterangan))) {
						\Storage::delete('public/' . $sip->surat_keterangan);
					}
					$path = $surat_keterangan->store('sip', 'public');
					$sip->surat_keterangan = $path;
					$sip->save();
					return redirect()->back()->with('success', 'Surat keterangan pelayanan kesehatan disimpan!');
				}
				return redirect()->back()->with('not_found', 'Surat keterangan pelayanan kesehatan tidak diproses!');
			} // end upload Surat Keterangan

				// OPSIONAL
				// upload Surat Persetujuan
			if($request->key == 'surat_persetujuan') {
				$surat_persetujuan = $request->file('surat_persetujuan'); 
				if ($surat_persetujuan) {
					$validasi = $this->validate($request, [
						'surat_persetujuan' => 'mimes:pdf|max:1024',
					],$message,$attribute);
					$sip = Sip::where('perizinan_id', $id)->first();
					if ($sip->surat_persetujuan && file_exists(storage_path('app/public/' . $sip->surat_persetujuan))) {
						\Storage::delete('public/' . $sip->surat_persetujuan);
					}
					$path = $surat_persetujuan->store('sip', 'public');
					$sip->surat_persetujuan = $path;
					$sip->save();
					return redirect()->back()->with('success', 'Surat persetujuan pimpinan instansi disimpan!');
				}
				return redirect()->back()->with('not_found', 'Surat persetujuan pimpinan instansi tidak diproses!');
			} // end upload Surat Persetujuan

				// upload berkas pendukung
			if($request->key == 'berkas_pendukung') {
				$berkas_pendukung = $request->file('berkas_pendukung'); 
				if ($berkas_pendukung) {
					$validasi = $this->validate($request, [
						'berkas_pendukung' => 'mimes:pdf|max:1024',
					],$message,$attribute);
					$sip = Sip::where('perizinan_id', $id)->first();
					if ($sip->berkas_pendukung && file_exists(storage_path('app/public/' . $sip->berkas_pendukung))) {
						\Storage::delete('public/' . $sip->berkas_pendukung);
					}
					$path = $berkas_pendukung->store('sip', 'public');
					$sip->berkas_pendukung = $path;
					$sip->save();
					return redirect()->back()->with('success', 'Berkas pendukung disimpan!');
				}
				return redirect()->back()->with('not_found', 'Berkas pendukung tidak diproses!');	
			} // end upload Surat Persetujuan

			if($request->key == 'jadwal1') {
				$validasi = $this->validate($request, [
					'hari_buka1' => 'required|string',
					'hari_tutup1' => 'required|string',
					'jam_buka1' => 'required|string',
					'menitbuka1' => 'required|string',
					'jam_tutup1' => 'required|string',
					'menittutup1' => 'required|string',
				],$message,$attribute);
				$data = Sip::where('perizinan_id', $id)->update(array(
					'hari_buka1' => $request->hari_buka1,
					'hari_tutup1' => $request->hari_tutup1,
					'jam_buka1' => $request->jam_buka1.':'.$request->menitbuka1,
					'jam_tutup1' => $request->jam_tutup1.':'.$request->menittutup1,
				));
				return redirect()->back()->with('success',$attribute[$request->key].' diperbarui');
			}
			if($request->key == 'jadwal1') {
				$validasi = $this->validate($request, [
					'hari_buka1' => 'required|string',
					'hari_tutup1' => 'required|string',
					'jam_buka1' => 'required|string',
					'menitbuka1' => 'required|string',
					'jam_tutup1' => 'required|string',
					'menittutup1' => 'required|string',
				],$message,$attribute);
				$data = Sip::where('perizinan_id', $id)->update(array(
					'hari_buka1' => $request->hari_buka1,
					'hari_tutup1' => $request->hari_tutup1,
					'jam_buka1' => $request->jam_buka1.':'.$request->menitbuka1,
					'jam_tutup1' => $request->jam_tutup1.':'.$request->menittutup1,
				));
				return redirect()->back()->with('success',$attribute[$request->key].' diperbarui');
			}
			if($request->key == 'jadwal2') {
				$validasi = $this->validate($request, [
					'hari_buka2' => 'required|string',
					'hari_tutup2' => 'required|string',
					'jam_buka2' => 'required|string',
					'menitbuka2' => 'required|string',
					'jam_tutup2' => 'required|string',
					'menittutup2' => 'required|string',
				],$message,$attribute);
				$data = Sip::where('perizinan_id', $id)->update(array(
					'hari_buka2' => $request->hari_buka2,
					'hari_tutup2' => $request->hari_tutup2,
					'jam_buka2' => $request->jam_buka2.':'.$request->menitbuka2,
					'jam_tutup2' => $request->jam_tutup2.':'.$request->menittutup2,
				));
				return redirect()->back()->with('success',$attribute[$request->key].' diperbarui');
			}
			if($request->key == 'jadwal3') {
				$validasi = $this->validate($request, [
					'hari_buka3' => 'required|string',
					'hari_tutup3' => 'required|string',
					'jam_buka3' => 'required|string',
					'menitbuka3' => 'required|string',
					'jam_tutup3' => 'required|string',
					'menittutup3' => 'required|string',
				],$message,$attribute);
				$data = Sip::where('perizinan_id', $id)->update(array(
					'hari_buka3' => $request->hari_buka3,
					'hari_tutup3' => $request->hari_tutup3,
					'jam_buka3' => $request->jam_buka3.':'.$request->menitbuka3,
					'jam_tutup3' => $request->jam_tutup3.':'.$request->menittutup3,
				));
				return redirect()->back()->with('success',$attribute[$request->key].' diperbarui');
			}

			// TEXT
			$validasi = $this->validate($request, [
				'revisi' => 'required|string',
			],$message,$attribute);
			$data = Sip::where('perizinan_id', $id)->update(array($request->key => $request->revisi));
			return redirect()->back()->with('success',$attribute[$request->key].' diperbarui');

		} catch(Exception $e) {
			return redirect()->back()->with('not_found', $e->getMessage());
		} catch(QueryException $e) {
			return redirect()->back()->with('not_found', $e->getMessage());
		}
	}

}
