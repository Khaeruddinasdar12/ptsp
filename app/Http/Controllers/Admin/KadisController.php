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
		
		$data = Perizinan::where('status', '0')->whereNotNull('bidang_by')->whereNotNull('teknis_by')->whereNull('kadis_by')->where('no_tiket', $no_tiket)->with('sip')->first();
		if(!$data) {
			abort(404);
		}
		// return $data;
		return view('admin.kadis.show', ['data' => $data]);
	}

	public function verif(Request $request, $no_tiket) // menerbitkan sertifikat
	{
		// return Carbon::now();
		if (Auth::guard('admin')->user()->role != 'kadis') {
			return $arrayName = array(
				'status' => 'error',
				'pesan' => 'Kamu Tidak Memiliki Akses Kadis'
			);
		}
	
		$data = Perizinan::with('sip')->where('status', '0')->whereNotNull('bidang_by')->whereNotNull('teknis_by')->whereNull('kadis_by')->where('no_tiket', $no_tiket)->first();
// 		return $data;
		if(!$data) {
			return $arrayName = array(
				'status' => 'error',
				'pesan' => 'Terjadi Kesalahan Data'
			);
		}
		
		$no_surat = strtoupper(substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, 6));
		$data->no_surat = 'Sur-'.$no_surat;
		$data->status = '1';
		$data->verif_by = Auth::guard('admin')->user()->id;
		$data->ket = null;
		$data->kadis_by = Auth::guard('admin')->user()->id;
        $now = Carbon::now();
		$data->updated_at = $now;
// 		$data->save();
		// return $data;
    
        $data_view = [
            'no_surat' => $no_surat,
            'nama' => $data->sip->nama,
            'jenis_izin' => $data->sip->jenis_izin,
            'tempat_lahir' => $data->sip->tempat_lahir,
            'tanggal_lahir' => $data->sip->tanggal_lahir,
            'alamat' => $data->sip->alamat,
            'kelurahan1' => $data->sip->kelurahan1,
            'kecamatan1' => $data->sip->kecamatan1,
            'no_str' => $data->sip->no_str,
            'no_rekomendasi' => $data->sip->no_rekomendasi,
            'penetapan' => $now,
            
        ];
           
        $pdf = PDF::loadView('pdf', $data_view);
        // $pdf->set_paper("legal");
        
        $content = $pdf->stream()->getOriginalContent();
        $nama_sertifikat = 'sertifikat-'.$no_surat.'.pdf';
        Storage::put('public/sertifikat/'.$nama_sertifikat,$content);
        
        // save to db
        $data->sertifikat = 'sertifikat/'.$nama_sertifikat;
        $data->save();
        // return $pdf->stream('sert.pdf');
        
		return $arrayName = array(
			'status' => 'success',
			'pesan' => 'Sertifikat dengan no. tiket '.$no_tiket.' telah diterbitkan!'
		);
	}

	public function sertifikat()
	{
	    
	    $now = Carbon::now();
		$data_view = [
            'no_surat' => 'SIP-2190IU',
            'nama' => 'Khaeruddin Asdar',
            'jenis_izin' => 'Dokter Gigi',
            'tempat_lahir' => 'Makassar',
            'tanggal_lahir' => '4 Agustus 1999',
            'alamat' => 'BTP Blok AD No. 450',
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
