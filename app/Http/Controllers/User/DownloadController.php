<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Perizinan;
class DownloadController extends Controller
{
    public function index()
	{
		$user_id = Auth::user()->id;
		$data = Perizinan::where('user_id', $user_id)->where('status', '1')->paginate(10);
		return view('user.download.index', ['data' => $data]);
	}
}
