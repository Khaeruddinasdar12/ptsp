<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sik;
use App\Models\Perizinan;
use App\Models\Subizin;
use Auth;
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
		$data = Subizin::where('jenis', 'sik')->get();
		return view('user.sik.create', ['data' => $data]);
	}

	public function store(Request $request)
	{
		$rules = [
			'nama' => 'required|string',
			'tempat_lahir' => 'required|string',
			'tanggal_lahir' => 'required|date',
			'alamat' => 'required|string',
			'nohp' => 'required|string',
			'jenis_izin' => 'required|string',
			'no_str' => 'required|string',
			'awal_str' => 'required|date',
			'akhir_str' => 'required|date',
			'nama_praktek' => 'required|string',
			'jalan' => 'required|string',
			'kelurahan' => 'required|string',
			'foto'   => 'image|mimes:jpeg,png,jpg|max:1024',
			'ktp'   => 'image|mimes:jpeg,png,jpg|max:1024',
			'ijazah'   => 'image|mimes:jpeg,png,jpg|max:1024',
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
			'nohp' => 'No HP',
			'jenis_izin' => 'Jenis izin',
			'no_str' => 'No. STR',
			'awal_str' => 'Tanggal Mulai Berlaku STR',
			'akhir_str' => 'Tanggal Berakhir STR',
			'nama_praktek' => 'Nama Praktek',
			'jalan' => 'Jalan',
			'kelurahan' => 'Kelurahan',
			'surat_keterangan' => 'Surat Keterangan Pelayanan Kesehatan',
			'surat_persetujuan' => 'Surat Persetujuan Pimpinan Instansi',
			'ktp' => 'KTP',
			'foto' => 'Foto',
			'str' => 'STR',
			'ijazah' => 'Ijazah',
			'rekomendasi_org' => 'Rekomendasi Organisasi Profesi',
			'surat_keluasan' => 'Surat Keterangan Keluasan',
			'berkas_pendukung' => 'Berkas Pendukung',
		];

		$validasi = $this->validate($request,$rules,$message,$attribute);
		$izin = new Perizinan;
		$sip = new Sik;

		$izin->user_id = Auth::user()->id;
		$izin->jenis_izin = 'sik';
		$izin->status = '0';
		$no_tiket = strtoupper(substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, 6));
		$izin->no_tiket = 'SIK-'.$no_tiket;
		// return $no_tiket;

		$sip->nama = $request->nama;
		$sip->tempat_lahir = $request->tempat_lahir;
		$sip->tanggal_lahir = $request->tanggal_lahir;
		$sip->nohp = $request->nohp;
		$sip->alamat = $request->alamat;
		$sip->subizin_id = $request->jenis_izin;
		$sip->no_str = $request->no_str;
		$sip->awal_str = $request->awal_str;
		$sip->akhir_str = $request->akhir_str;
		$sip->nama_praktek = $request->nama_praktek;
		$sip->jalan = $request->jalan;
		$sip->kelurahan = $request->kelurahan;

		$ktp = $request->file('ktp'); // upload KTP
		if ($ktp) {
			$path = $ktp->store('sik', 'public');
			$sip->ktp = $path;
		}

        $foto = $request->file('foto'); // upload Foto
        if ($foto) {
        	$path = $foto->store('sik', 'public');
        	$sip->foto = $path;
        }

        $ijazah = $request->file('ijazah'); // upload Ijazah
        if ($ijazah) {
        	$path = $ijazah->store('sik', 'public');
        	$sip->ijazah = $path;
        }

        $str = $request->file('str'); // upload STR
        if ($str) {
        	$path = $str->store('sik', 'public');
        	$sip->str = $path;
        }

        $org = $request->file('rekomendasi_org'); // upload Rekomendasi Organisasi Profesi
        if ($org) {
        	$path = $org->store('sik', 'public');
        	$sip->rekomendasi_org = $path;
        }

        $surat_keterangan = $request->file('surat_keterangan'); // Surat Keterangan dari pimpinan Pelayanan Kesehatan
        if ($surat_keterangan) {
        	$path = $surat_keterangan->store('sik', 'public');
        	$sip->surat_keterangan = $path;
        }	

        // OPSIONAL
        $surat_keluasan = $request->file('surat_keluasan'); // Surat Keterangan keluasan (opsional)
        if ($surat_keluasan) {
        	$validasi = $this->validate($request, [
        		'surat_keluasan' => 'mimes:pdf|max:1024',
        	],$message,$attribute);
        	$path = $surat_keluasan->store('sik', 'public');
        	$sip->surat_keluasan = $path;
        }

        $berkas_pendukung = $request->file('berkas_pendukung'); // Berkas Pendukung (opsional)
        if ($berkas_pendukung) {
        	$validasi = $this->validate($request, [
        		'berkas_pendukung' => 'mimes:pdf|max:1024',
        	],$message,$attribute);
        	$path = $berkas_pendukung->store('sik', 'public');
        	$sip->berkas_pendukung = $path;
        }

        try {
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
        	'pesan' => 'Berhasil Mengajukan Surat Izin Kerja (SIK) dengan No. Tiket '.$izin->no_tiket
        );

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
    		'nama_praktek' => 'Nama Praktek',
    		'jalan' => 'Jalan',
    		'kelurahan' => 'Kelurahan',
    		'kecamatan' => 'Kecamatan',
    		'surat_keterangan' => 'Surat Keterangan Pelayanan Kesehatan',
    		'surat_keluasan' => 'Surat Keterangan Keluasan',
    		'ktp' => 'KTP',
    		'foto' => 'Foto',
    		'str' => 'STR',
    		'ijazah' => 'Ijazah',
    		'rekomendasi_org' => 'Rekomendasi Organisasi Profesi',
    		'berkas_pendukung' => 'Berkas Pendukung',

    	];

    	// try {
    		if($request->key == 'nama') {
    			$validasi = $this->validate($request, [
    				'revisi' => 'required|string',
    			],$message,$attribute);
    			$data = Sik::where('perizinan_id', $id)->update(array($request->key => $request->revisi));
    			return redirect()->back()->with('success','Nama diperbarui');
    		}

    		if($request->key == 'tempat_lahir') {
    			$validasi = $this->validate($request, [
    				'revisi' => 'required|string',
    			],$message,$attribute);
    			$data = Sik::where('perizinan_id', $id)->update(array($request->key => $request->revisi));
    			return redirect()->back()->with('success','Tempat lahir diperbarui');
    		}

    		if($request->key == 'tanggal_lahir') {
    			$validasi = $this->validate($request, [
    				'revisi' => 'required|date',
    			],$message,$attribute);
    			$data = Sik::where('perizinan_id', $id)->update(array($request->key => $request->revisi));
    			return redirect()->back()->with('success','Tanggal lahir diperbarui');
    		}

    		if($request->key == 'alamat') {
    			$validasi = $this->validate($request, [
    				'revisi' => 'required|string',
    			],$message,$attribute);
    			$data = Sik::where('perizinan_id', $id)->update(array($request->key => $request->revisi));
    			return redirect()->back()->with('success','Alamat diperbarui');
    		}

    		if($request->key == 'no_str') {
    			$validasi = $this->validate($request, [
    				'revisi' => 'required|string',
    			],$message,$attribute);
    			$data = Sik::where('perizinan_id', $id)->update(array($request->key => $request->revisi));
    			return redirect()->back()->with('success','Nomor STR diperbarui');
    		}

    		if($request->key == 'awal_str') {
    			$validasi = $this->validate($request, [
    				'revisi' => 'required|date',
    			],$message,$attribute);
    			$data = Sik::where('perizinan_id', $id)->update(array($request->key => $request->revisi));
    			return redirect()->back()->with('success','Tanggal mulai berlaku STR diperbarui');
    		}

    		if($request->key == 'akhir_str') {
    			$validasi = $this->validate($request, [
    				'revisi' => 'required|date',
    			],$message,$attribute);
    			$data = Sik::where('perizinan_id', $id)->update(array($request->key => $request->revisi));
    			return redirect()->back()->with('success','Tanggal berakhir STR diperbarui');
    		}

    		if($request->key == 'nama_praktek') {
    			$validasi = $this->validate($request, [
    				'revisi' => 'required|string',
    			],$message,$attribute);
    			$data = Sik::where('perizinan_id', $id)->update(array($request->key => $request->revisi));
    			return redirect()->back()->with('success','Nama Praktek diperbarui');
    		}

    		if($request->key == 'jalan') {
    			$validasi = $this->validate($request, [
    				'revisi' => 'required|string',
    			],$message,$attribute);
    			$data = Sik::where('perizinan_id', $id)->update(array($request->key => $request->revisi));
    			return redirect()->back()->with('success','Jalan diperbarui');
    		}

    		if($request->key == 'kelurahan') {
    			$validasi = $this->validate($request, [
    				'revisi' => 'required|string',
    			],$message,$attribute);
    			$data = Sik::where('perizinan_id', $id)->update(array($request->key => $request->revisi));
    			return redirect()->back()->with('success','Kelurahan Dan Kecamatan diperbarui');
    		}

    		if($request->key == 'ktp') {
				$ktp = $request->file('ktp'); // upload KTP
				if ($ktp) {
					$validasi = $this->validate($request, [
						'ktp' => 'image|mimes:jpeg,png,jpg|max:1024',
					],$message,$attribute);
					$sip = Sik::where('perizinan_id', $id)->first();
					if ($sip->ktp && file_exists(storage_path('app/public/' . $sip->ktp))) {
						\Storage::delete('public/' . $sip->ktp);
					}
					$path = $ktp->store('sik', 'public');
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
					$sip = Sik::where('perizinan_id', $id)->first();
					if ($sip->foto && file_exists(storage_path('app/public/' . $sip->foto))) {
						\Storage::delete('public/' . $sip->ktp);
					}
					$path = $foto->store('sik', 'public');
					$sip->foto = $path;
					$sip->save();
					return redirect()->back()->with('success','Pas foto diperbarui');
				}
				return redirect()->back()->with('not_found','Pas Foto tidak diproses');	
			}

			if($request->key == 'ijazah') {
				$ijazah = $request->file('ijazah'); // upload IJAZAH
				if ($ijazah) {
					$validasi = $this->validate($request, [
						'ijazah' => 'image|mimes:jpeg,png,jpg|max:1024',
					],$message,$attribute);
					$sip = Sik::where('perizinan_id', $id)->first();
					if ($sip->ijazah && file_exists(storage_path('app/public/' . $sip->ijazah))) {
						\Storage::delete('public/' . $sip->ijazah);
					}
					$path = $ijazah->store('sik', 'public');
					$sip->ijazah = $path;
					$sip->save();
					return redirect()->back()->with('success','Ijazah diperbarui');
				}
				return redirect()->back()->with('not_found','Ijazah tidak diproses');	
			}

			if($request->key == 'str') {
				$str = $request->file('str'); // upload STR
				if ($str) {
					$validasi = $this->validate($request, [
						'str' => 'mimes:pdf|max:1024',
					],$message,$attribute);
					$sip = Sik::where('perizinan_id', $id)->first();
					if ($sip->str && file_exists(storage_path('app/public/' . $sip->str))) {
						\Storage::delete('public/' . $sip->str);
					}
					$path = $str->store('sik', 'public');
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
					$sip = Sik::where('perizinan_id', $id)->first();
					if ($sip->rekomendasi_org && file_exists(storage_path('app/public/' . $sip->rekomendasi_org))) {
						\Storage::delete('public/' . $sip->rekomendasi_org);
					}
					$path = $rekomendasi_org->store('sik', 'public');
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
					$sip = Sik::where('perizinan_id', $id)->first();
					if ($sip->surat_keterangan && file_exists(storage_path('app/public/' . $sip->surat_keterangan))) {
						\Storage::delete('public/' . $sip->surat_keterangan);
					}
					$path = $surat_keterangan->store('sik', 'public');
					$sip->surat_keterangan = $path;
					$sip->save();
					return redirect()->back()->with('success','Surat keterangan pelanayan kesehatan diperbarui');
				}
				return redirect()->back()->with('not_found','Surat keterangan pelanayan kesehatan tidak diproses');	
			}

			// OPSIONAL
			if($request->key == 'surat_keluasan') {
				$surat_keluasan = $request->file('surat_keluasan'); // Surat Keluasan
				if ($surat_keluasan) {
					$validasi = $this->validate($request, [
						'surat_keluasan' => 'mimes:pdf|max:1024',
					],$message,$attribute);
					$sip = Sik::where('perizinan_id', $id)->first();
					if ($sip->surat_keluasan && file_exists(storage_path('app/public/' . $sip->surat_keluasan))) {
						\Storage::delete('public/' . $sip->surat_keluasan);
					}
					$path = $surat_keluasan->store('sik', 'public');
					$sip->surat_keluasan = $path;
					$sip->save();
					return redirect()->back()->with('success','Surat keterangan keluasan');
				}
				return redirect()->back()->with('not_found','Surat keterangan keluasan tidak diproses');	
			}

			if($request->key == 'berkas_pendukung') {
				$berkas_pendukung = $request->file('berkas_pendukung'); // Berkas Pendukung
				if ($berkas_pendukung) {
					$validasi = $this->validate($request, [
						'berkas_pendukung' => 'mimes:pdf|max:1024',
					],$message,$attribute);
					$sip = Sik::where('perizinan_id', $id)->first();
					if ($sip->berkas_pendukung && file_exists(storage_path('app/public/' . $sip->berkas_pendukung))) {
						\Storage::delete('public/' . $sip->berkas_pendukung);
					}
					$path = $berkas_pendukung->store('sik', 'public');
					$sip->berkas_pendukung = $path;
					$sip->save();
					return redirect()->back()->with('success','Berkas pendukung diperbarui');
				}
				return redirect()->back()->with('not_found','Berkas pendukung tidak diproses');	
			}

		// } catch(Exception $e) {
		// 	return redirect()->back()->with('not_found', $e->getMessage());
		// } catch(QueryException $e) {
		// 	return redirect()->back()->with('not_found', $e->getMessage());
			
		// }
	}

}
