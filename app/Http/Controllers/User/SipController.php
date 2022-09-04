<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sip;
use App\Models\Subizin;
use App\Models\Perizinan;
use Auth;
use App\Models\Kelurahan;
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
		$data = Subizin::where('jenis', 'sip')->get();
		// $kel = 
		// return $data;
		return view('user.sip.create', ['data' => $data]);
	}

	public function update(Request $request, $id)
	{
		$message = [];
		$attribute = [
			'nama' => 'Nama',
			'tempat_lahir' => 'Tempat Lahir',
			'tanggal_lahir' => 'Tanggal Lahir',
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
				$data = Sip::where('perizinan_id', $id)->update(array($request->key => $request->revisi));
				return redirect()->back()->with('success','Nama diperbarui');
			}

			if($request->key == 'tempat_lahir') {
				$validasi = $this->validate($request, [
					'revisi' => 'required|string',
				],$message,$attribute);
				$data = Sip::where('perizinan_id', $id)->update(array($request->key => $request->revisi));
				return redirect()->back()->with('success','Tempat lahir diperbarui');
			}

			if($request->key == 'tanggal_lahir') {
				$validasi = $this->validate($request, [
					'revisi' => 'required|date',
				],$message,$attribute);
				$data = Sip::where('perizinan_id', $id)->update(array($request->key => $request->revisi));
				return redirect()->back()->with('success','Tanggal lahir diperbarui');
			}

			if($request->key == 'alamat') {
				$validasi = $this->validate($request, [
					'revisi' => 'required|string',
				],$message,$attribute);
				$data = Sip::where('perizinan_id', $id)->update(array($request->key => $request->revisi));
				return redirect()->back()->with('success','Alamat diperbarui');
			}

			if($request->key == 'no_str') {
				$validasi = $this->validate($request, [
					'revisi' => 'required|string',
				],$message,$attribute);
				$data = Sip::where('perizinan_id', $id)->update(array($request->key => $request->revisi));
				return redirect()->back()->with('success','Nomor STR diperbarui');
			}

			if($request->key == 'awal_str') {
				$validasi = $this->validate($request, [
					'revisi' => 'required|date',
				],$message,$attribute);
				$data = Sip::where('perizinan_id', $id)->update(array($request->key => $request->revisi));
				return redirect()->back()->with('success','Tanggal mulai berlaku STR diperbarui');
			}

			if($request->key == 'akhir_str') {
				$validasi = $this->validate($request, [
					'revisi' => 'required|date',
				],$message,$attribute);
				$data = Sip::where('perizinan_id', $id)->update(array($request->key => $request->revisi));
				return redirect()->back()->with('success','Tanggal berakhir STR diperbarui');
			}

			if($request->key == 'nama_praktek1') {
				$validasi = $this->validate($request, [
					'revisi' => 'required|string',
				],$message,$attribute);
				$data = Sip::where('perizinan_id', $id)->update(array($request->key => $request->revisi));
				return redirect()->back()->with('success','Nama Praktek 1 diperbarui');
			}
			
			if($request->key == 'jalan1') {
				$validasi = $this->validate($request, [
					'revisi' => 'required|string',
				],$message,$attribute);
				$data = Sip::where('perizinan_id', $id)->update(array($request->key => $request->revisi));
				return redirect()->back()->with('success','Jalan 1 diperbarui');
			}

			if($request->key == 'kelurahan1') {
				$validasi = $this->validate($request, [
					'revisi' => 'required|string',
				],$message,$attribute);
				$data = Sip::where('perizinan_id', $id)->update(array($request->key => $request->revisi));
				return redirect()->back()->with('success','Kelurahan Dan Kecamatan 1 diperbarui');
			}

			// PRAKTEK 2, JALAN 2, KELURAHAN 2
			if($request->key == 'nama_praktek2') {
				$validasi = $this->validate($request, [
					'revisi' => 'required|string',
				],$message,$attribute);
				$data = Sip::where('perizinan_id', $id)->update(array($request->key => $request->revisi));
				return redirect()->back()->with('success','Nama Praktek 2 diperbarui');
			}
			
			if($request->key == 'jalan2') {
				$validasi = $this->validate($request, [
					'revisi' => 'required|string',
				],$message,$attribute);
				$data = Sip::where('perizinan_id', $id)->update(array($request->key => $request->revisi));
				return redirect()->back()->with('success','Jalan 2 diperbarui');
			}

			if($request->key == 'kelurahan2') {
				$validasi = $this->validate($request, [
					'revisi' => 'required|string',
				],$message,$attribute);
				$data = Sip::where('perizinan_id', $id)->update(array($request->key => $request->revisi));
				return redirect()->back()->with('success','Kelurahan Dan Kecamatan 2 diperbarui');
			}
			// END OF PRAKTEK 2, JALAN 2, KELURAHAN 2


			// PRAKTEK 3, JALAN 3, KELURAHAN 3
			if($request->key == 'nama_praktek3') {
				$validasi = $this->validate($request, [
					'revisi' => 'required|string',
				],$message,$attribute);
				$data = Sip::where('perizinan_id', $id)->update(array($request->key => $request->revisi));
				return redirect()->back()->with('success','Nama Praktek 3 diperbarui');
			}
			
			if($request->key == 'jalan3') {
				$validasi = $this->validate($request, [
					'revisi' => 'required|string',
				],$message,$attribute);
				$data = Sip::where('perizinan_id', $id)->update(array($request->key => $request->revisi));
				return redirect()->back()->with('success','Jalan 3 diperbarui');
			}

			if($request->key == 'kelurahan3') {
				$validasi = $this->validate($request, [
					'revisi' => 'required|string',
				],$message,$attribute);
				$data = Sip::where('perizinan_id', $id)->update(array($request->key => $request->revisi));
				return redirect()->back()->with('success','Kelurahan Dan Kecamatan 3 diperbarui');
			}
			// END OF PRAKTEK 3, JALAN 3, KELURAHAN 3


			if($request->key == 'ktp') {
				$ktp = $request->file('ktp'); // upload KTP
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
					return redirect()->back()->with('success','KTP diperbarui');
				}
				return redirect()->back()->with('not_found','KTP tidak diproses');	
			}

			if($request->key == 'foto') {
				$foto = $request->file('foto'); // upload Pas Foto
				if ($foto) {
					$validasi = $this->validate($request, [
						'foto' => 'image|mimes:jpeg,png,jpg|max:1024',
					],$message,$attribute);
					$sip = Sip::where('perizinan_id', $id)->first();
					if ($sip->foto && file_exists(storage_path('app/public/' . $sip->foto))) {
						\Storage::delete('public/' . $sip->ktp);
					}
					$path = $foto->store('sip', 'public');
					$sip->foto = $path;
					$sip->save();
					return redirect()->back()->with('success','Pas foto diperbarui');
				}
				return redirect()->back()->with('not_found','Pas Foto tidak diproses');	
			}

			if($request->key == 'str') {
				$str = $request->file('str'); // upload STR
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
					return redirect()->back()->with('success','STR diperbarui');
				}
				return redirect()->back()->with('not_found','STR tidak diproses');	
			}

			if($request->key == 'rekomendasi_org') {
				$rekomendasi_org = $request->file('rekomendasi_org'); // upload Rekomendasi ORGd
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
					return redirect()->back()->with('success','Rekomendasi organisasi profesi diperbarui');
				}
				return redirect()->back()->with('not_found','Rekomendasi organisasi profesi diproses');	
			}

			if($request->key == 'surat_keterangan') {
				$surat_keterangan = $request->file('surat_keterangan'); // surat keterangan
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
					return redirect()->back()->with('success','Surat keterangan pelanayan kesehatan diperbarui');
				}
				return redirect()->back()->with('not_found','Surat keterangan pelanayan kesehatan tidak diproses');	
			}

			// OPSIONAL
			if($request->key == 'surat_persetujuan') {
				$surat_persetujuan = $request->file('surat_persetujuan'); // Surat Persetujuan
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
					return redirect()->back()->with('success','Surat persetujuan pimpinan instansi diperbarui');
				}
				return redirect()->back()->with('not_found','Surat persetujuan pimpinan instansi tidak diproses');	
			}

			if($request->key == 'berkas_pendukung') {
				$berkas_pendukung = $request->file('berkas_pendukung'); // Berkas Pendukung
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
					return redirect()->back()->with('success','Berkas pendukung diperbarui');
				}
				return redirect()->back()->with('not_found','Berkas pendukung tidak diproses');	
			}

		} catch(Exception $e) {
			return redirect()->back()->with('not_found', $e->getMessage());
		} catch(QueryException $e) {
			return redirect()->back()->with('not_found', $e->getMessage());
			
		}
	}
	public function store(Request $request)
	{
		
		$rules = [
			'nama' => 'required|string',
			'tempat_lahir' => 'required|string',
			'tanggal_lahir' => 'required|date',
			'alamat' => 'required|string',
			'jenis_izin' => 'required|string',
			'no_str' => 'required|string',
			'awal_str' => 'required|date',
			'akhir_str' => 'required|date',
			'nama_praktek1' => 'required|string',
			'jalan1' => 'required|string',
			'kelurahan1' => 'required|string',
			'foto'   => 'image|mimes:jpeg,png,jpg|max:1024',
			'ktp'   => 'image|mimes:jpeg,png,jpg|max:1024',
			'str'   => 'mimes:pdf|max:1024',
			'rekomendasi_org'   => 'mimes:pdf|max:1024',
			'surat_keterangan'   => 'mimes:pdf|max:1024',
		];
		$message = [];
		$attribute = [
			'nama' => 'Nama',
			'tempat_lahir' => 'Tempat Lahir',
			'tanggal_lahir' => 'Tanggal Lahir',
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
		$validasi = $this->validate($request,$rules,$message,$attribute);

		$izin = new Perizinan;
		$sip = new Sip;

		$izin->user_id = Auth::user()->id;
		$izin->jenis_izin = 'sip';
		$izin->status = '0';
		$no_tiket = strtoupper(substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, 6));
		$izin->no_tiket = 'SIP-'.$no_tiket;
		// return $no_tiket;

		$sip->nama = $request->nama;
		$sip->tempat_lahir = $request->tempat_lahir;
		$sip->tanggal_lahir = $request->tanggal_lahir;
		$sip->alamat = $request->alamat;
		$sip->subizin_id = $request->jenis_izin; // nomor id sub izin (jenis izin)
		$sip->no_str = $request->no_str;
		$sip->awal_str = $request->awal_str;
		$sip->akhir_str = $request->akhir_str;
		$sip->nama_praktek1 = $request->nama_praktek1;
		$sip->jalan1 = $request->jalan1;
		$sip->kelurahan1 = $request->kelurahan1;

		if($request->nama_praktek2 || $request->jalan2 || $request->kelurahan2) {
			$validasi = $this->validate($request, [
				'nama_praktek2' => 'required|string',
				'jalan2' => 'required|string',
				'kelurahan2' => 'required|string',
			],$message,$attribute);
			$sip->nama_praktek2 = $request->nama_praktek2;
			$sip->jalan2 = $request->jalan2;
			$sip->kelurahan2 = $request->kelurahan2;
		}

		if($request->nama_praktek3 || $request->jalan3 || $request->kelurahan3) {
			$validasi = $this->validate($request, [
				'nama_praktek3'  => 'required|string',
				'jalan3'  => 'required|string',
				'kelurahan3'  => 'required|string',
			],$message,$attribute);
			$sip->nama_praktek3 = $request->nama_praktek3;
			$sip->jalan3 = $request->jalan3;
			$sip->kelurahan3 = $request->kelurahan3;
		}
		
		$ktp = $request->file('ktp'); // upload KTP
		if ($ktp) {
			$path = $ktp->store('sip', 'public');
			$sip->ktp = $path;
		}

        $foto = $request->file('foto'); // upload Foto
        if ($foto) {
        	$path = $foto->store('sip', 'public');
        	$sip->foto = $path;
        }

        $str = $request->file('str'); // upload STR
        if ($str) {
        	$path = $str->store('sip', 'public');
        	$sip->str = $path;
        }

        $org = $request->file('rekomendasi_org'); // upload Rekomendasi Org Profesi
        if ($org) {
        	$path = $org->store('sip', 'public');
        	$sip->rekomendasi_org = $path;
        }

        $surat_keterangan = $request->file('surat_keterangan'); // Surat Keterangan Pelayanan Kesehatan
        if ($surat_keterangan) {
        	$path = $surat_keterangan->store('sip', 'public');
        	$sip->surat_keterangan = $path;
        }	

        // OPSIONAL
        $surat_persetujuan = $request->file('surat_persetujuan'); // Surat Persetujuan Pimpinan (opsional)
        if ($surat_persetujuan) {
        	$validasi = $this->validate($request, [
        		'surat_persetujuan' => 'mimes:pdf|max:1024',
        	],$message,$attribute);
        	$path = $surat_persetujuan->store('sip', 'public');
        	$sip->surat_persetujuan = $path;
        }

        $berkas_pendukung = $request->file('berkas_pendukung'); // Berkas Pendukung (opsional)
        if ($surat_persetujuan) {
        	$validasi = $this->validate($request, [
        		'berkas_pendukung' => 'mimes:pdf|max:1024',
        	],$message,$attribute);
        	$path = $berkas_pendukung->store('sip', 'public');
        	$sip->berkas_pendukung = $path;
        }

        try{
        	$izin->save();
        	$sip->perizinan_id = $izin->id;
        	$sip->save();
        }catch(Exception $e){
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
        return $arrayName = array(
        	'status' => 'success',
        	'pesan' => 'Berhasil Mengajukan Surat Izin Praktik!'
        );
        
        

    }
}
