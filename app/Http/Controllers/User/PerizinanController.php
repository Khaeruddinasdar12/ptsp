<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Perizinan;
use App\Models\Sip;
use Auth;

class PerizinanController extends Controller
{
    public function __construct()
	{
		$this->middleware('auth');
	}

	public function ditinjau()
	{
		$user_id = Auth::user()->id;
		$data = Perizinan::where('user_id', $user_id)->where('status','0')->paginate(10);
		return view('user.perizinan.ditinjau', ['data' => $data]);
	}

	public function ditolak()
	{
		$user_id = Auth::user()->id;
		$data = Perizinan::where('user_id', $user_id)->where('status','2')->paginate(10);
		return view('user.perizinan.ditolak', ['data' => $data]);
	}
	
	public function terbit()
	{
		$user_id = Auth::user()->id;
		$data = Perizinan::where('user_id', $user_id)->where('status','1')->paginate(10);
		return view('user.perizinan.terbit', ['data' => $data]);
	}

	public function show($no_tiket)
	{		
		$user_id = Auth::user()->id;
		$data = Perizinan::where('user_id', $user_id)->where('status', '2')->where('no_tiket', $no_tiket)->with('sip')->first();
		if(!$data) {
			abort(404);
		}
		// return $data;
		return view('user.perizinan.sip-show', ['data' => $data]);
	}

	public function update(Request $request, $no_tiket)
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
			'jalan1' => 'required|string',
			'kelurahan1' => 'required|string',
			'kecamatan1' => 'required|string',
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
			'jalan1' => 'Jalan 1',
			'kelurahan1' => 'Kelurahan 1',
			'kecamatan1' => 'Kecamatan 1',
			'jalan2' => 'Jalan 2',
			'kelurahan2' => 'Kelurahan 2',
			'kecamatan2' => 'Kecamatan 2',
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

		$user_id = Auth::user()->id;
		$izin = Perizinan::where('no_tiket', $no_tiket)->where('user_id', $user_id)->with('sip')->first();
		$sip = Sip::where('perizinan_id', $izin->id)->first();
		if(!$izin && !$sip) {
			abort(404);
		}


		$izin->user_id = Auth::user()->id;
		$izin->status = '0';
		
		$sip->nama = $request->nama;
		$sip->tempat_lahir = $request->tempat_lahir;
		$sip->tanggal_lahir = $request->tanggal_lahir;
		$sip->alamat = $request->alamat;
		$sip->jenis_izin = $request->jenis_izin;
		$sip->no_str = $request->no_str;
		$sip->awal_str = $request->awal_str;
		$sip->akhir_str = $request->akhir_str;
		$sip->jalan1 = $request->jalan1;
		$sip->kelurahan1 = $request->kelurahan1;
		$sip->kecamatan1 = $request->kecamatan1;

		if($request->jalan2 || $request->kelurahan2 || $request->kecamatan2) {
			$validasi = $this->validate($request, [
				'jalan2' => 'required|string',
				'kelurahan2' => 'required|string',
				'kecamatan2' => 'required|string',
			],$message,$attribute);

			$sip->jalan2 = $request->jalan2;
			$sip->kelurahan2 = $request->kelurahan2;
			$sip->kecamatan2 = $request->kecamatan2;
		}

		if($request->jalan3 || $request->kelurahan3 || $request->kecamatan3) {
			$validasi = $this->validate($request, [
				'jalan3'  => 'required|string',
				'kelurahan3'  => 'required|string',
				'kecamatan3'  => 'required|string',
			],$message,$attribute);

			$sip->jalan3 = $request->jalan3;
			$sip->kelurahan3 = $request->kelurahan3;
			$sip->kecamatan3 = $request->kecamatan3;
		}
		
		$ktp = $request->file('ktp'); // upload KTP
		if ($ktp) {
			$gambar_path = $ktp->store('sip', 'public');
			$sip->ktp = $gambar_path;
		}

        $foto = $request->file('foto'); // upload Foto
        if ($foto) {
        	$gambar_path = $foto->store('sip', 'public');
        	$sip->foto = $gambar_path;
        }

        $str = $request->file('str'); // upload STR
        if ($str) {
        	$gambar_path = $str->store('sip', 'public');
        	$sip->str = $gambar_path;
        }

        $idi = $request->file('rekomendasi_idi'); // upload Rekomendasi IDI
        if ($idi) {
        	$gambar_path = $idi->store('sip', 'public');
        	$sip->rekomendasi_idi = $gambar_path;
        }

        $surat_keterangan = $request->file('surat_keterangan'); // Surat Keterangan Pelayanan Kesehatan
        if ($surat_keterangan) {
        	$gambar_path = $surat_keterangan->store('sip', 'public');
        	$sip->surat_keterangan = $gambar_path;
        }	

        $surat_persetujuan = $request->file('surat_persetujuan'); // Surat Persetujuan Pimpinan
        if ($surat_persetujuan) {
        	$validasi = $this->validate($request, [
				'surat_persetujuan' => 'mimes:pdf|max:2048',
			],$message,$attribute);
        	$gambar_path = $surat_persetujuan->store('sip', 'public');
        	$sip->surat_persetujuan = $gambar_path;
        }	

        $pelengkap = $request->file('pelengkap'); // Berkas Pelengkap
        if ($pelengkap) {
        	$gambar_path = $pelengkap->store('sip', 'public');
        	$sip->pelengkap = $gambar_path;        
        }

        $izin->save();
        $sip->save();
        return $arrayName = array(
        	'status' => 'success',
        	'pesan' => 'Berhasil Mengirim Perubahan Data Perizinan!'
        );
        return redirect()->route('perizinan.ditolak')->with('success', 'Berhasil Mengirim!');
	}
}
