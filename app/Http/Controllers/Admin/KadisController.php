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
	public function index(Request $request)
	{
		if (Auth::guard('admin')->user()->role != 'kadis') {
			return redirect()->route('error')->with('not_found','Kamu Tidak Memiliki Akses Teknis');
		}
		
		// $data = Perizinan::where('status', '0')->whereNotNull('bidang_by')->whereNotNull('teknis_by')->whereNull('kadis_by')->paginate(10);
		// return $data;
		$data = Perizinan::where('status', '0')
			->whereNotNull('bidang_by')
			->whereNotNull('teknis_by')
			->whereNull('kadis_by')
            ->where('no_tiket','LIKE','%'.$request->cari.'%')
            ->paginate(10);
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
		} elseif($data->jenis_izin == 'pendidikan') {
			return view('admin.kadis.pendidikan-show', ['data' => $data]);
		} elseif($data->jenis_izin == 'krk') {
			return view('admin.kadis.krk-show', ['data' => $data]);
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
				$urut = $data->sip->latest()->first();
				
				$no_surat = '503/'.$urut->id.'/SIP.'.$kode.'/DPM-PTSP/'.$bulan.'/'.$tahun;
				$dasar_hukum = $data->sip->subizin->dasar_hukum;

				$kelurahan2 = ''; $kecamatan2 = ''; $kelurahan3 = ''; $kecamatan3 = '';
				if ($data->sip->nama_praktek2 && $data->sip->kelurahan2 && $data->sip->jalan2) {
					$kelurahan2 = $data->sip->klh2->kelurahan;
					$kecamatan2 = $data->sip->klh2->kecamatan;
				}

				if ($data->sip->nama_praktek3 && $data->sip->kelurahan3 && $data->sip->jalan3) {
					$kelurahan3 = $data->sip->klh3->kelurahan;
					$kecamatan3 = $data->sip->klh3->kecamatan;
				}

				$nama = $data->sip->gelar_awal.' '.$data->sip->nama.', '.$data->sip->gelar_akhir;
				$data_view = [
					'pas_foto'=> $data->sip->foto,
					'barcode' => $data->no_tiket.'.png',
					'no_surat' => $no_surat,
					'nama' => $nama,
					'dasar_hukum' => $dasar_hukum,
					'jenis_izin' => $jenis_izin,
					'subizin' => $data->sip->subizin->nama,
					'kategori' => $data->sip->subizin->kategori,
					'tempat_lahir' => $data->sip->tempat_lahir,
					'tanggal_lahir' => $data->sip->tanggal_lahir,
					'alamat' => $data->sip->alamat,
					'akhir_str' => $data->sip->akhir_str,
					'praktek1' => $data->sip->nama_praktek1,
					'jejaring1' => $data->sip->jejaring1,
					'kelurahan1' => $data->sip->klh1->kelurahan,
					'kecamatan1' => $data->sip->klh1->kecamatan,
					'jalan1' => $data->sip->jalan1,
					'jadwal1' => $data->sip->hari_buka1.' s/d '. $data->sip->hari_tutup1 .' ,'. $data->sip->jam_buka1 .' - '. $data->sip->jam_tutup1.' WITA',

					'praktek2' => $data->sip->nama_praktek2,
					'kelurahan2' => $kelurahan2,
					'kecamatan2' => $kecamatan2,
					'jalan2' => $data->sip->jalan2,
					'jadwal2' => $data->sip->hari_buka2.' s/d '. $data->sip->hari_tutup2 .' ,'. $data->sip->jam_buka2 .' - '. $data->sip->jam_tutup2.' WITA',

					'praktek3' => $data->sip->nama_praktek3,
					'kelurahan3' => $kelurahan3,
					'kecamatan3' => $kecamatan3,
					'jalan3' => $data->sip->jalan3,
					'jadwal3' => $data->sip->hari_buka3.' s/d '. $data->sip->hari_tutup3 .' ,'. $data->sip->jam_buka3 .' - '. $data->sip->jam_tutup3.' WITA',

					'no_str' => $data->sip->no_str,
					'rekomendasi_op' => $data->sip->rekomendasi_op,
					'no_rekomendasi' => $data->sip->no_rekomendasi,
					'penetapan' => $time,
				];
				
				$pdf = PDF::loadView('sip-sik-pdf', $data_view);
			} elseif($data->jenis_izin == 'sik') {
				$jenis_izin = 'Surat Izin Kerja (SIK)';
				$kode = $data->sik->subizin->kode;
				$urut = $data->sik->latest()->first();
				$no_surat = '503/'.$urut->id.'/SIK.'.$kode.'/DPM-PTSP/'.$bulan.'/'.$tahun;
				$dasar_hukum = $data->sik->subizin->dasar_hukum;
				$nama = $data->sik->gelar_awal.' '.$data->sik->nama.', '.$data->sik->gelar_akhir;
				$data_view = [
					'pas_foto'=> $data->sik->foto,
					'barcode' => $data->no_tiket.'.png',
					'no_surat' => $no_surat,
					'nama' => $nama,
					'dasar_hukum' => $dasar_hukum,
					'jenis_izin' => $jenis_izin,
					'subizin' => $data->sik->subizin->nama,
					'kategori' => '',
					'tempat_lahir' => $data->sik->tempat_lahir,
					'tanggal_lahir' => $data->sik->tanggal_lahir,
					'alamat' => $data->sik->alamat,
					'akhir_str' => $data->sik->akhir_str,
					'praktek1' => $data->sik->nama_praktek,
					'jejaring1' => '',
					'kelurahan1' => $data->sik->klh->kelurahan,
					'kecamatan1' => $data->sik->klh->kecamatan,
					'jalan1' => $data->sik->jalan,
					'jadwal1' => '',
					'praktek2' => '',
					'kelurahan2' => '',
					'kecamatan2' => '',
					'jalan2' => '',
					'jadwal2' => '',
					'praktek3' => '',
					'kelurahan3' => '',
					'kecamatan3' => '',
					'jalan3' => '',
					'jadwal3' => '',
					'no_str' => $data->sik->no_str,
					'rekomendasi_op' => $data->sik->rekomendasi_op,
					'no_rekomendasi' => $data->sik->no_rekomendasi,
					'penetapan' => $time,
				];
				
				$pdf = PDF::loadView('sip-sik-pdf', $data_view);
			} elseif($data->jenis_izin == 'pendidikan') {
				$kode = $data->pendidikan->subizin->kode;
				$jenis_izin = $data->pendidikan->subizin->nama;
				$urut = $data->pendidikan->latest()->first();
				$no_surat = '503/'.$urut->id.'/'.$kode.'/DPM-PTSP/'.$bulan.'/'.$tahun;
				$nama = $data->pendidikan->gelar_awal.' '.$data->pendidikan->nama.', '.$data->pendidikan->gelar_akhir;
				$data_view = [
					'barcode' => $data->no_tiket.'.png',
					'no_surat' => $no_surat,
					'no_rekomendasi' => $data->pendidikan->no_rekomendasi,
					'nama' => $nama,
					'nohp' => $data->pendidikan->nohp,
					'jenis_izin' => $jenis_izin,
					'kategori' => $data->pendidikan->subizin->kategori,
					'subizin' => $data->pendidikan->subizin->nama,
					'alamat' => $data->pendidikan->alamat,
					'nama_yayasan' => $data->pendidikan->nama_yayasan,
					'nama_pendidikan' => $data->pendidikan->nama_pendidikan,
					'no_npsn' => $data->pendidikan->no_npsn,
					'jenis_program' => $data->pendidikan->jenis_program,
					'kelurahan' => $data->pendidikan->klh->kelurahan,
					'kecamatan' => $data->pendidikan->klh->kecamatan,
					'jalan' => $data->pendidikan->jalan,
					'penetapan' => Carbon::now(),
					'berlaku_sampai' => $time->addYears(3),
				];
				$pdf = PDF::loadView('pendidikan-pdf', $data_view);
			} elseif($data->jenis_izin == 'krk') {
				$urut = $data->krk->latest()->first();
				$no_surat = '650/'.$urut->id.'/DPMPTSP/'.$bulan.'/'.$tahun;
				$nama = $data->krk->gelar_awal.' '.$data->krk->nama.', '.$data->krk->gelar_akhir;
				$data_view = [
					'barcode' => $data->no_tiket.'.png',
					'no_surat' => $no_surat,
					'no_rekomendasi' => $data->krk->no_rekomendasi,
					'penggunaan' => $data->krk->penggunaan,
					'jenis' => $data->krk->jenis,
					'nama' => $nama,
					'alamat' => $data->krk->alamat,
					'luas' => $data->krk->luas,
					'jalan' => $data->krk->jalan,
					'kelurahan' => $data->krk->klh->kelurahan,
					'kecamatan' => $data->krk->klh->kecamatan,
					'jml_lantai' => $data->krk->jml_lantai,
					'jml_bangunan' => $data->krk->jml_bangunan,
					'kdb' => $data->krk->kdb,
					'klb' => $data->krk->klb,
					'kdh' => $data->krk->kdh,
					'jml_lantai_max' => $data->krk->jml_lantai_max,
					'lebar_jalan' => $data->krk->lebar_jalan,
					'gsp' => $data->krk->gsp,
					'gsb' => $data->krk->gsb,
					'klasifikasi' => $data->krk->klasifikasi,
					'penetapan' => Carbon::now(),
				];
				$pdf = PDF::loadView('krk-pdf', $data_view);
			}

			$data->status = '1';
			$data->no_surat = $no_surat;
			$data->verif_by = Auth::guard('admin')->user()->id;
			$data->ket = null;
			$data->kadis_by = Auth::guard('admin')->user()->id;
			$data->updated_at = Carbon::now();

			$email = $data->user->email;
			$judul= "Notifikasi Penerbitan Sertifikat ". config('app.name');
			$data_send = array(
				'no_tiket' => $no_tiket,
				'name' => $data->user->name,
				'status' => 'TELAH DITERBITKAN',
				'pesan' => 'Silakan Melakukan Pengecekan Pada Aplikasi Untuk Mengunduh Sertifikat!',
				'keterangan' => $request->ket,
				'class' => 'success',
			);
			Mail::send('email', $data_send, function($mail) use($email, $judul) {
				$mail->to($email, 'no-reply')
				->subject($judul);
				$mail->from('ptsp@gmail.com', config('app.name'));        
			});
			if (Mail::failures()) {
				return $arrayName = array('status' => 'error' , 'pesan' => 'Gagal mengirim email' );
			}

			// $data->save();			

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
		$pdf = PDF::loadView('krk-pdf');

		return $pdf->stream();

		$now = Carbon::now();
		$data_view = [
			'pas_foto'=> 'cert/qr-code.png',
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
			'jalan1' => 'jajajaja',
			'praktek2' => '',
			'kelurahan2' => '',
			'kecamatan2' => '',
			'jalan2' => '',
			'praktek3' => '',
			'kelurahan3' => '',
			'kecamatan3' => '',
			'jalan3' => '',
			'no_str' => 'STR-YYX878',
			'no_rekomendasi' => 'R-IU89891Y',
			'penetapan' => $now,

		];
        // return view('pdf', $data_view);
		$pdf = PDF::loadView('sip-sik-pdf', $data_view);

		return $pdf->stream();
	}
}
