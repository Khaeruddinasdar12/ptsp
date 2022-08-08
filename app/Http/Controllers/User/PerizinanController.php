<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Perizinan;
use App\Models\Sip;
use App\Models\Subizin;
use Auth;
use QueryException;
use Exception;
class PerizinanController extends Controller
{
    public function __construct()
	{
		$this->middleware('auth');
	}

	public function index()
	{
		$user_id = Auth::user()->id;
		$data = Perizinan::where('user_id', $user_id)->paginate(10);
		return view('user.perizinan.index', ['data' => $data]);
	}

	public function show($no_tiket)
	{		
		$user_id = Auth::user()->id;
		$subizin = Subizin::where('jenis', 'sip')->get();
		$data = Perizinan::where('user_id', $user_id)->where('status', '2')->where('no_tiket', $no_tiket)->with('sip')->first();

		// return $data->sip->klh3->id;
		if(!$data) {
			abort(404);
		}
		// return $data;
		return view('user.perizinan.sip-show', ['data' => $data, 'subizin' => $subizin]);
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
			'jalan1' => 'required|string',
			'kelurahan1' => 'required|string',
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
			'nama_praktek1' => 'Nama Praktek 1',
			'jalan1' => 'Jalan 1',
			'kelurahan1' => 'Kelurahan 1',
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
		$sip->subizin_id = $request->jenis_izin;
		$sip->no_str = $request->no_str;
		$sip->awal_str = $request->awal_str;
		$sip->akhir_str = $request->akhir_str;
		$sip->nama_praktek1 = $request->nama_praktek1;
		$sip->jalan1 = $request->jalan1;
		$sip->kelurahan1 = $request->kelurahan1;

		if($request->jalan2 || $request->kelurahan2 || $request->kecamatan2) {
			$validasi = $this->validate($request, [
				'nama_praktek2' => 'required|string',
				'jalan2' => 'required|string',
				'kelurahan2' => 'required|string',
			],$message,$attribute);
			$sip->nama_praktek2 = $request->nama_praktek2;
			$sip->jalan2 = $request->jalan2;
			$sip->kelurahan2 = $request->kelurahan2;
		}

		if($request->jalan3 || $request->kelurahan3 || $request->kecamatan3) {
			$validasi = $this->validate($request, [
				'nama_praktek3' => 'required|string',
				'jalan3'  => 'required|string',
				'kelurahan3'  => 'required|string',
			],$message,$attribute);
			$sip->nama_praktek3 = $request->nama_praktek3;
			$sip->jalan3 = $request->jalan3;
			$sip->kelurahan3 = $request->kelurahan3;
		}
		
		$ktp = $request->file('ktp'); // upload KTP
		if ($ktp) {
			$validasi = $this->validate($request, [
				'ktp' => 'image|mimes:jpeg,png,jpg|max:1024',
			],$message,$attribute);
            if ($sip->ktp && file_exists(storage_path('app/public/' . $sip->ktp))) {
                \Storage::delete('public/' . $sip->ktp);
            }
            $path = $ktp->store('sip', 'public');
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
            $path = $foto->store('sip', 'public');
            $sip->foto = $path;
        }

        $str = $request->file('str'); // upload STR
        if ($str) {
        	$validasi = $this->validate($request, [
				'str'   => 'mimes:pdf|max:1024',
			],$message,$attribute);
            if ($sip->str && file_exists(storage_path('app/public/' . $sip->str))) {
                \Storage::delete('public/' . $sip->foto);
            }
            $path = $str->store('sip', 'public');
            $sip->str = $path;
        }

        $idi = $request->file('rekomendasi_org'); // upload Rekomendasi Org Profesi
        if($idi) {
        	$validasi = $this->validate($request, [
				'rekomendasi_org' => 'mimes:pdf|max:1024',
			],$message,$attribute);
            if ($sip->rekomendasi_org && file_exists(storage_path('app/public/' . $sip->rekomendasi_org))) {
                \Storage::delete('public/' . $sip->rekomendasi_org);
            }
            $path = $idi->store('sip', 'public');
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
            $path = $surat_keterangan->store('sip', 'public');
            $sip->surat_keterangan = $path;
        }	

        $surat_persetujuan = $request->file('surat_persetujuan'); // Surat Persetujuan Pimpinan (opsional)
        if($surat_persetujuan) {
        	$validasi = $this->validate($request, [
				'surat_persetujuan' => 'mimes:pdf|max:1024',
			],$message,$attribute);
            if ($sip->surat_persetujuan && file_exists(storage_path('app/public/' . $sip->surat_persetujuan))) {
                \Storage::delete('public/' . $sip->surat_persetujuan);
            }
            $path = $surat_persetujuan->store('sip', 'public');
            $sip->surat_persetujuan = $path;
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
