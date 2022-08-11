<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sik;
use App\Models\Perizinan;
use App\Models\Subizin;
use Auth;
use QueryException;
// use Exception;
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
		try {
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
				'rekomendasi_idi'   => 'mimes:pdf|max:1024',
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
        $surat_persetujuan = $request->file('surat_keluasaan'); // Surat Keterangan keluasaan (opsional)
        if ($surat_persetujuan) {
        	$validasi = $this->validate($request, [
        		'surat_persetujuan' => 'mimes:pdf|max:1024',
        	],$message,$attribute);
        	$path = $surat_persetujuan->store('sik', 'public');
        	$sip->surat_persetujuan = $path;
        }

        $berkas_pendukung = $request->file('berkas_pendukung'); // Surat Keterangan keluasaan (opsional)
        if ($berkas_pendukung) {
        	$validasi = $this->validate($request, [
        		'berkas_pendukung' => 'mimes:pdf|max:1024',
        	],$message,$attribute);
        	$path = $berkas_pendukung->store('sik', 'public');
        	$sip->berkas_pendukung = $path;
        }
        
        $izin->save();
        $sip->perizinan_id = $izin->id;
        $sip->save();

        

        return $arrayName = array(
        	'status' => 'success',
        	'pesan' => 'Berhasil Mengajukan Surat Izin Praktik!'
        );
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
}

public function update(Request $request, $no_tiket)
{
	try{
		$rules = [
			'nama' => 'required|string',
			'tempat_lahir' => 'required|string',
			'tanggal_lahir' => 'required|date',
			'alamat' => 'required|string',
			'jenis_izin' => 'required|string',
			'no_str' => 'required|string',
			'awal_str' => 'required|date',
			'akhir_str' => 'required|date',
			'nama_praktek' => 'required|string',
			'jalan' => 'required|string',
			'kelurahan' => 'required|string',
			// 'foto'   => 'image|mimes:jpeg,png,jpg|max:2048',
			// 'ktp'   => 'image|mimes:jpeg,png,jpg|max:2048',
			// 'str'   => 'mimes:pdf|max:2048',
			// 'rekomendasi_idi'   => 'mimes:pdf|max:2048',
			// 'surat_keterangan'   => 'mimes:pdf|max:2048',
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
			'nama_praktek' => 'Nama Praktek ',
			'jalan' => 'Jalan',
			'kelurahan' => 'Kelurahan ',
			'surat_keterangan' => 'Surat Keterangan Pelayanan Kesehatan',
			'ktp' => 'KTP',
			'foto' => 'Foto',
			'str' => 'STR',
			'ijazah' => 'STR',
			'rekomendasi_org' => 'Rekomendasi Organisasi Profesi',

		];
		$validasi = $this->validate($request,$rules,$message,$attribute);

		$user_id = Auth::user()->id;
		$izin = Perizinan::where('no_tiket', $no_tiket)->where('user_id', $user_id)->with('sik')->first();
		$sip = Sik::where('perizinan_id', $izin->id)->first();
		if(!$izin && !$sip) {
			abort(404);
		}


		$izin->user_id = Auth::user()->id;
		$izin->status = '0';
		
		$sip->nama = $request->nama;
		$sip->tempat_lahir = $request->tempat_lahir;
		$sip->tanggal_lahir = $request->tanggal_lahir;
		$sip->alamat = $request->alamat;
		$sip->nohp = $request->nohp;
		$sip->subizin_id = $request->jenis_izin;
		$sip->no_str = $request->no_str;
		$sip->awal_str = $request->awal_str;
		$sip->akhir_str = $request->akhir_str;
		$sip->nama_praktek = $request->nama_praktek;
		$sip->jalan = $request->jalan;
		$sip->kelurahan = $request->kelurahan;
		
		$ktp = $request->file('ktp'); // upload KTP
		if ($ktp) {
			$validasi = $this->validate($request, [
				'ktp' => 'image|mimes:jpeg,png,jpg|max:1024',
			],$message,$attribute);
			if ($sip->ktp && file_exists(storage_path('app/public/' . $sip->ktp))) {
				\Storage::delete('public/' . $sip->ktp);
			}
			$path = $ktp->store('sik', 'public');
			$sip->ktp = $path;
		}

        $foto = $request->file('foto'); // upload Foto
        if ($foto) {
        	$validasi = $this->validate($request, [
        		'foto' => 'image|mimes:jpeg,png,jpg|max:1024',
        	],$message,$attribute);
        	if ($sip->foto && file_exists(storage_path('app/public/' . $sip->foto))) {
        		\Storage::delete('public/' . $sip->foto);
        	}
        	$path = $foto->store('sik', 'public');
        	$sip->foto = $path;
        }

        $ijazah = $request->file('ijazah'); // upload Ijazah
        if ($ijazah) {
        	$validasi = $this->validate($request, [
        		'ijazah' => 'image|mimes:jpeg,png,jpg|max:1024',
        	],$message,$attribute);
        	if ($sip->ijazah && file_exists(storage_path('app/public/' . $sip->ijazah))) {
        		\Storage::delete('public/' . $sip->ijazah);
        	}
        	$path = $ijazah->store('sik', 'public');
        	$sip->ijazah = $path;
        }

        $str = $request->file('str'); // upload STR
        if ($str) {
        	$validasi = $this->validate($request, [
        		'str'   => 'mimes:pdf|max:1024',
        	],$message,$attribute);
        	if ($sip->str && file_exists(storage_path('app/public/' . $sip->str))) {
        		\Storage::delete('public/' . $sip->foto);
        	}
        	$path = $str->store('sik', 'public');
        	$sip->str = $path;
        }

        $org = $request->file('rekomendasi_org'); // upload Rekomendasi Org Profesi
        if($org) {
        	$validasi = $this->validate($request, [
        		'rekomendasi_org' => 'mimes:pdf|max:1024',
        	],$message,$attribute);
        	if ($sip->rekomendasi_org && file_exists(storage_path('app/public/' . $sip->rekomendasi_org))) {
        		\Storage::delete('public/' . $sip->rekomendasi_org);
        	}
        	$path = $org->store('sik', 'public');
        	$sip->rekomendasi_org = $path;
        }

        $surat_keterangan = $request->file('surat_keterangan'); // Surat Keterangan Pelayanan Kesehatan
        if($surat_keterangan) {
        	$validasi = $this->validate($request, [
        		'surat_keterangan'   => 'mimes:pdf|max:1024',
        	],$message,$attribute);
        	if ($sip->surat_keterangan && file_exists(storage_path('app/public/' . $sip->surat_keterangan))) {
        		\Storage::delete('public/' . $sip->surat_keterangan);
        	}
        	$path = $surat_keterangan->store('sik', 'public');
        	$sip->surat_keterangan = $path;
        }	

        $surat_keluasan = $request->file('surat_keluasan'); // Surat Keluasan (opsional)
        if($surat_keluasan) {
        	$validasi = $this->validate($request, [
        		'surat_keluasan' => 'mimes:pdf|max:1024',
        	],$message,$attribute);
        	if ($sip->surat_keluasan && file_exists(storage_path('app/public/' . $sip->surat_keluasan))) {
        		\Storage::delete('public/' . $sip->surat_keluasan);
        	}
        	$path = $surat_keluasan->store('sik', 'public');
        	$sip->surat_keluasan = $path;
        }

        $izin->save();
        $sip->save();
        return $arrayName = array(
        	'status' => 'success',
        	'pesan' => 'Berhasil Mengirim Perubahan Data Perizinan!'
        );
        return redirect()->route('perizinan.ditolak')->with('success', 'Berhasil Mengirim!');
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

}

}
