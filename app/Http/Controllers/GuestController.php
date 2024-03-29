<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use QrCode;
use Storage;
use App\Models\Perizinan;
class GuestController extends Controller
{
	public function index()
    {
		return view('guest.index');
	}

    public function tentang()
    {
        return view('guest.tentang');
    }

    public function visi()
    {
        return view('guest.visi');
    }

    public function lacak(Request $request)
    {
        if($request->no_tiket) {
            $data = Perizinan::where('status', '!=', null)->where('no_tiket', $request->no_tiket)->first();
        } else {
            $data = '';
        }
        return view('guest.lacak', ['data' => $data]);
    }

    public function struktur()
    {
        return view('guest.struktur');
    }

    public function layanan()
    {
        return view('guest.layanan');
    }

    public function ceksertifikat($no_tiket)
    {
        $data = Perizinan::where('no_tiket', $no_tiket)->first();
        return view('guest.cek-sertifikat', ['data' => $data]);
    }

	public function pdf()
	{
        $data = [
            'nama' => 'Khaeruddin Asdar'
        ];
           
        $pdf = PDF::loadView('pdf', [
        	'nama'=>'Khaeruddin Asdar',
        ]);
        
        // $pdf->set_paper("legal");
        return $pdf->stream('sert.pdf');
	}

    public function email()
    {
        $data_send = array(
            'no_tiket' => 'SIP3592995235',
            'name' => 'Khaeruddin Asdar',
            'status' => 'TIDAK DISETUJUI',
            'pesan' => 'Silakan Melakukan Perbaikan Berkas Pada Aplikasi',
            'keterangan' => 'Perbaikan',
            'class' => 'danger',
        );
        return view('email', $data_send);
    }

    public function qr()
    {
        $no_tiket = time();
        $route = config('app.url').'/cek-sertifikat/'.$no_tiket;
        $image = QrCode::format('png')
            ->size(200)->errorCorrection('H')
            ->generate($route);
            $output_file = 'qr-code/' . $no_tiket . '.png';
            Storage::disk('public')->put($output_file, $image);
    }
}

