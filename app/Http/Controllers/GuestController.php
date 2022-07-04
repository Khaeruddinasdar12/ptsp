<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
class GuestController extends Controller
{
	public function index(){
		return view('guest.index');
	}

	public function pdf()
	{
        $data = [
            'nama' => 'Khaeruddin Asdar'
        ];
           
        $pdf = PDF::loadView('pdf', [
        	'nama'=>'Khaeruddin Asdar',
        ]);
     
        return $pdf->stream();
	}
}

