<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
class GuestController extends Controller
{
	public function index()
    {
		return view('guest.index');
	}

    public function sejarah()
    {
        return view('guest.sejarah');
    }

    public function visi()
    {
        return view('guest.visi');
    }

    public function struktur()
    {
        return view('guest.struktur');
    }

    public function layanan()
    {
        return view('guest.layanan');
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
}

