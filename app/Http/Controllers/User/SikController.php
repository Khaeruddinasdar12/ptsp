<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sik;
use App\Models\Perizinan;
use Auth;
use Validator;
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
		return view('user.sik.create');
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
			'kecamatan1' => 'required|string',
			'foto'   => 'image|mimes:jpeg,png,jpg|max:1024',
			'ktp'   => 'image|mimes:jpeg,png,jpg|max:1024',
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
			'kecamatan2' => 'Kecamatan 2',
			'nama_praktek3' => 'Nama Praktek 3',
			'jalan3' => 'Jalan 3',
			'kelurahan3' => 'Kelurahan 3',
			'kecamatan3' => 'Kecamatan 3',
			'surat_keterangan' => 'Surat Keterangan Pelayanan Kesehatan',
			'surat_persetujuan' => 'Surat Persetujuan Pimpinan Instansi',
			'ktp' => 'KTP',
			'foto' => 'Foto',
			'str' => 'STR',
			'rekomendasi_idi' => 'Rekomendasi IDI',

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
		$sip->jenis_izin = $request->jenis_izin;
		$sip->no_str = $request->no_str;
		$sip->awal_str = $request->awal_str;
		$sip->akhir_str = $request->akhir_str;
		$sip->nama_praktek1 = $request->nama_praktek1;
		$sip->jalan1 = $request->jalan1;
		$sip->kelurahan1 = $request->kelurahan1;
		$sip->kecamatan1 = $request->kecamatan1;

		if($request->nama_praktek2 || $request->jalan2 || $request->kelurahan2 || $request->kecamatan2) {
			$validasi = $this->validate($request, [
				'nama_praktek2' => 'required|string',
				'jalan2' => 'required|string',
				'kelurahan2' => 'required|string',
				'kecamatan2' => 'required|string',
			],$message,$attribute);
			$sip->nama_praktek2 = $request->nama_praktek2;
			$sip->jalan2 = $request->jalan2;
			$sip->kelurahan2 = $request->kelurahan2;
			$sip->kecamatan2 = $request->kecamatan2;
		}

		if($request->nama_praktek3 || $request->jalan3 || $request->kelurahan3 || $request->kecamatan3) {
			$validasi = $this->validate($request, [
				'nama_praktek3'  => 'required|string',
				'jalan3'  => 'required|string',
				'kelurahan3'  => 'required|string',
				'kecamatan3'  => 'required|string',
			],$message,$attribute);
			$sip->nama_praktek3 = $request->nama_praktek3;
			$sip->jalan3 = $request->jalan3;
			$sip->kelurahan3 = $request->kelurahan3;
			$sip->kecamatan3 = $request->kecamatan3;
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

        $idi = $request->file('rekomendasi_idi'); // upload Rekomendasi IDI
        if ($idi) {
        	$path = $idi->store('sip', 'public');
        	$sip->rekomendasi_idi = $path;
        }

        $surat_keterangan = $request->file('surat_keterangan'); // Surat Keterangan Pelayanan Kesehatan
        if ($surat_keterangan) {
        	$path = $surat_keterangan->store('sip', 'public');
        	$sip->surat_keterangan = $path;
        }	

        $surat_persetujuan = $request->file('surat_persetujuan'); // Surat Persetujuan Pimpinan (opsional)
        if ($surat_persetujuan) {
        	$validasi = $this->validate($request, [
				'surat_persetujuan' => 'mimes:pdf|max:1024',
			],$message,$attribute);
        	$path = $surat_persetujuan->store('sip', 'public');
        	$sip->surat_persetujuan = $path;
        }

        $izin->save();
		$sip->perizinan_id = $izin->id;
        $sip->save();
        return $arrayName = array(
        	'status' => 'success',
        	'pesan' => 'Berhasil Mengajukan Surat Izin Praktik!'
        );
        return redirect()->back()->with('success', 'Berhasil Mengirim!');
        // return view('user.sip.create');
    }
}
