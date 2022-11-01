<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subizin;
use App\Models\Perizinan;
use App\Models\User;
// use Carbon\Carbon;
use Auth;
class DashboardController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

	public function index()
	{
		$user_id = Auth::user()->id;
		$tolak = Perizinan::where('user_id', $user_id)->where('status', '2')->count();
		$proses = Perizinan::where('user_id', $user_id)->where('status', '0')->count();
		$terbit = Perizinan::where('user_id', $user_id)->where('status', '1')->count();
		return view('user.dashboard',[
			'tolak' => $tolak,
			'proses' => $proses,
			'terbit' => $terbit
		]);
	}

	public function kategori($jenis) 
	{
		$data = Subizin::select('id', 'kategori')->where('nama', $jenis)->get();
		return $data;
	}

	public function edit() //edit profile
	{
		return view('user.edit-profile');
	}

	public function update(Request $request)
	{
		$user_id = Auth::user()->id;
		$rules = [
            'password' => 'required|string|min:8|confirmed',
        ];
        $message = [];
        $attribute = [
            'password' => 'Password',
        ];
        $validasi = $this->validate($request,$rules,$message,$attribute);
        $data = User::findOrFail($user_id);
        $data->password = bcrypt($request->password);
        $data->save();
        return redirect()->back()->with('success', 'Berhasil Mengubah Password');
	}
}
