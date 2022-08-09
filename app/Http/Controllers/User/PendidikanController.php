<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subizin;
use App\Models\Perizinan;
use Auth;
use App\Models\Kelurahan;
use QueryException;
use Exception;
class PendidikanController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

    public function create()
	{
		$data = Subizin::where('jenis', 'sip')->get();
		// $kel = 
		// return $data;
		return view('user.pendidikan.create', ['data' => $data]);
	}
}
