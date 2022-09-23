<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Perizinan;
class HomeController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth:admin');
	}

    public function index()
    {
        $today = Carbon::today();

        // Daftar Hari ini
        $daftartoday = Perizinan::where('status', '0')->whereDate('created_at', $today)->count();
        $terbit = Perizinan::where('status', '1')->whereDate('created_at', $today)->count();
    	return view('admin.dashboard', [
            'daftartoday' => $daftartoday,
            'terbit' => $terbit
        ]);
    }

    public function error()
    {
    	return view('admin.404');
    }
}
