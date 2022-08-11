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

	public function store(Request $request)
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
}
