<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Perizinan;
use App\Models\Sip;
use App\Models\Sik;
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
		
		$data = Perizinan::where('user_id', $user_id)->where('status', '2')->where('no_tiket', $no_tiket)->first();

		// return $data->sip->klh3->id;
		if(!$data) {
			abort(404);
		}
		if($data->jenis_izin == 'sik') {
			// return $data->sik;
			$subizin = Subizin::where('jenis', 'sik')->get();
			return view('user.sik.sik-show', ['data' => $data, 'subizin' => $subizin]);
		} elseif($data->jenis_izin == 'sip') {
			$subizin = Subizin::where('jenis', 'sik')->get();
			return view('user.sip.sip-show', ['data' => $data, 'subizin' => $subizin]);
		}
		// return $data;
		
	}

	public function update(Request $request, $no_tiket)
	{
		try {
			$user_id = Auth::user()->id;
			$izin = Perizinan::where('no_tiket', $no_tiket)->where('user_id', $user_id)->first();
			if($izin->jenis_izin == 'sip') {
				$sip = Sip::where('perizinan_id', $izin->id)->first();
				if(!$izin && !$sip) {
					return $arrayName = array(
						'status' => 'error',
						'pesan' => 'Data tidak ditemukan'
					);
				}
				$izin->status = '0';
				$izin->save();
				$sip->save();
			} elseif($izin->jenis_izin == 'sik') {
				$sik = Sik::where('perizinan_id', $izin->id)->first();
				if(!$izin && !$sik) {
					return $arrayName = array(
						'status' => 'error',
						'pesan' => 'Data tidak ditemukan'
					);
				}
				$izin->status = '0';
				$izin->save();
				$sik->save();
			}
			
			return $arrayName = array(
				'status' => 'success',
				'pesan' => 'Berhasil Mengirim Perubahan Data Perizinan!'
			);
		} catch(Exception $e) {
			return $arrayName = array(
				'status' => 'error',
				'pesan' => $e->getMessage()
			);
		} catch(QueryException $e) {
			return $arrayName = array(
				'status' => 'error',
				'pesan' => $e->getMessage()
			);
		}

	}
}
