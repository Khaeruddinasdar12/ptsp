<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;
use App\Models\Perizinan;
use App\Models\Sip;
use PDF;
use Storage;
use Mail;
use QueryException;
use Exception;
class KadisController extends Controller
{
	public function index()
	{
		if (Auth::guard('admin')->user()->role != 'kadis') {
			return redirect()->route('error')->with('not_found','Kamu Tidak Memiliki Akses Teknis');
		}
		
		$data = Perizinan::where('status', '0')->whereNotNull('bidang_by')->whereNotNull('teknis_by')->whereNull('kadis_by')->paginate(10);
		// return $data;
		return view('admin.kadis.index', ['data' => $data]);
	}

	public function show($no_tiket)
	{
		if (Auth::guard('admin')->user()->role != 'kadis') {
			return redirect()->route('error')->with('not_found','Kamu Tidak Memiliki Akses Kadis');
		}
		
		$data = Perizinan::where('status', '0')->whereNotNull('bidang_by')->whereNotNull('teknis_by')->whereNull('kadis_by')->where('no_tiket', $no_tiket)->first();
		if(!$data) {
			abort(404);
		}
		if($data->jenis_izin == 'sik') {
			return view('admin.kadis.sik-show', ['data' => $data]);
		} elseif($data->jenis_izin == 'sip') {
			return view('admin.kadis.sip-show', ['data' => $data]);
		}
	}

	public function verif(Request $request, $no_tiket) // menerbitkan sertifikat
	{
		try {
			if (Auth::guard('admin')->user()->role != 'kadis') {
				return $arrayName = array(
					'status' => 'error',
					'pesan' => 'Kamu Tidak Memiliki Akses Kadis'
				);
			}

			$data = Perizinan::where('status', '0')->whereNotNull('bidang_by')->whereNotNull('teknis_by')->whereNull('kadis_by')->where('no_tiket', $no_tiket)->first();
// 		return $data;
			if(!$data) {
				return $arrayName = array(
					'status' => 'error',
					'pesan' => 'Terjadi Kesalahan Data'
				);
			}
			$time = Carbon::now();
			$bulan = $time->month;
			$tahun = $time->year;

			if($data->jenis_izin == 'sip') {
				$jenis_izin = 'Surat Izin Praktik (SIP)';
				$kode = $data->sip->subizin->kode;
				$no_surat = '503/xxx.yy.z/SIP.'.$kode.'/DPM-PTSP/'.$bulan.'/'.$tahun;
				$dasar_hukum = $data->sip->subizin->dasar_hukum;

				$data_view = [
					'pas_foto'=> $data->sip->foto,
					'barcode' => $data->no_tiket.'.png',
					'no_surat' => $no_surat,
					'nama' => $data->sip->nama,
					'dasar_hukum' => $dasar_hukum,
					'jenis_izin' => $jenis_izin,
					'subizin' => $data->sip->subizin->nama,
					'tempat_lahir' => $data->sip->tempat_lahir,
					'tanggal_lahir' => $data->sip->tanggal_lahir,
					'alamat' => $data->sip->alamat,
					'akhir_str' => $data->sip->akhir_str,
					'praktek1' => $data->sip->nama_praktek1,
					'kelurahan1' => $data->sip->klh1->kelurahan,
					'kecamatan1' => $data->sip->klh1->kecamatan,
					'no_str' => $data->sip->no_str,
					'no_rekomendasi' => $data->sip->no_rekomendasi,
					'penetapan' => $time,

				];
			}

			$data->no_surat = $no_surat;
		// $data->status = '1';
			$data->verif_by = Auth::guard('admin')->user()->id;
			$data->ket = null;
			// $data->kadis_by = Auth::guard('admin')->user()->id;
        // $now = Carbon::now();
			$data->updated_at = $time;
// 		$data->save();


			$pdf = PDF::loadView('pdf', $data_view);

			$content = $pdf->stream()->getOriginalContent();
			$nama_sertifikat = $data->no_tiket.'.pdf';
			Storage::put('public/sertifikat/'.$nama_sertifikat,$content);

        // save to db
			$data->sertifikat = 'sertifikat/'.$nama_sertifikat;
			$data->save();
        // return $pdf->stream('sert.pdf');

			return $arrayName = array(
				'status' => 'success',
				'pesan' => 'Sertifikat dengan no. tiket '.$no_tiket.' telah diterbitkan!'
			);

		} catch(Exception $e){
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

	public function sertifikat()
	{

		$now = Carbon::now();
		$data_view = [
			'barcode' => 'cert/qr-code.png',
			'no_surat' => 'SIP-2190IU',
			'nama' => 'Khaeruddin Asdar',
			'jenis_izin' => 'Dokter Gigi',
			'subizin' => 'Apoteker',
			'dasar_hukum' => 'Peraturan Menteri Kesehatan Republik Indonesia Nomor 31 Tahun 2016 
tentang Perubahan Atas Peraturan Menteri Kesehatan Nomor 889/MENKES/PER/V/2011 
tentang Registrasi, Izin Praktik dan Izin Kerja Tenaga Kefarmasian',
			'tempat_lahir' => 'Makassar',
			'tanggal_lahir' => '4 Agustus 1999',
			'alamat' => 'BTP Blok AD No. 450',
			'akhir_str' => '28 Sept 2022',
			'praktek1' => 'Dr. Munira',
			'kelurahan1' => 'Macege',
			'kecamatan1' => 'Tamalanrea',
			'no_str' => 'STR-YYX878',
			'no_rekomendasi' => 'R-IU89891Y',
			'penetapan' => $now,

		];

        // return view('pdf', $data_view);
		$pdf = PDF::loadView('pdf', $data_view);

		return $pdf->stream();
	}
}
