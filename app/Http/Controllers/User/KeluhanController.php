<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Keluhan;
use Auth;
class KeluhanController extends Controller
{
    public function __construct()
	{
		$this->middleware('auth');
	}

	public function index()
	{
		$data = Keluhan::where('user_id', Auth::user()->id)->paginate(10);
		// return $data;
		return view('user.keluhan.index', ['data' => $data]);
	}

	public function store(Request $request)
	{
		$validasi = $this->validate($request, [
            'pesan'  => 'required|string',
        ]);

		$data = new Keluhan;
		$data->pesan = $request->pesan;
		$data->user_id = Auth::user()->id;
		$data->save();

		return redirect()->back()->with('success', 'Berhasil mengirim keluhan dan saran!');
	}

	public function destroy($id) //hapus
    {
        $data = Keluhan::find($id);
        $data->delete();
        return $arrayName = array(
            'status' => 'success',
            'pesan' => 'Berhasil menghapus keluhan atau saran!'
        );
    }
}
