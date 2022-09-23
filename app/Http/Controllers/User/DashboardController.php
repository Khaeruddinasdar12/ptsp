<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subizin;
// use App\Models\Perizinan;
// use Carbon\Carbon;
class DashboardController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

	public function index()
	{
		
		return view('user.dashboard');
	}

	public function kategori($jenis) 
	{
		$data = Subizin::select('id', 'kategori')->where('nama', $jenis)->get();
		return $data;
	}
}
