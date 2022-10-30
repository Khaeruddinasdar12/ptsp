<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subizin;
use App\Models\User;
use Auth;
class SettingController extends Controller
{
	public function index()
	{
        // $data = Subizin::with('sip')->get();
        // $data = Subizin::with('sip', 'sik', 'krk', 'pendidikan')->find(2);
        // return $data;
		if (Auth::guard('admin')->user()->role != 'superadmin') {
			return redirect()->route('error')->with('not_found','Kamu Tidak Memiliki Superadmin');
		}

		$data = Subizin::get();
		return view('admin.setting.index', ['data' => $data]);
	}

    public function storesub(Request $request) //store Sub Izin
    {
    	if (Auth::guard('admin')->user()->role != 'superadmin') {
    		return redirect()->route('error')->with('not_found','Kamu Tidak Memiliki Superadmin');
    	}

    	$data = new Subizin;
    	$data->jenis = $request->jenis;
    	$data->nama = $request->nama;
    	$data->save();
    	return redirect()->back()->with('success','Berhasil Menambah Sub Izin!');
    }

    public function deletesub($id) //hapus subizin
    {
    	if (Auth::guard('admin')->user()->role != 'superadmin') {
    		return redirect()->route('error')->with('not_found','Kamu Tidak Memiliki Superadmin');
    	}

    	$data = Subizin::with('sip', 'sik', 'krk', 'pendidikan')->find($id);

    	if($data->sip || $data->sik || $data->krk || $data->pendidikan){
            return $arrayName = array(
                'status' => 'error',
                'pesan' => 'Tidak Dapat Menghapus Data! Data Ini Terdapat Di Tabel Lainnya!'
            );

        }

        $data->delete();
        return $arrayName = array(
           'status' => 'success',
           'pesan' => 'Berhasil Menghapus Data Sub Izin!'
       );
    }

    public function edit($id) //show
    {
        if (Auth::guard('admin')->user()->role != 'superadmin') {
            return redirect()->route('error')->with('not_found','Kamu Tidak Memiliki Superadmin');
        }

        $data = User::findOrFail($id);
        return view('admin.manage-user.edit', ['data' => $data]);
    }

    public function update(Request $request, $id) //update password
    {
        if (Auth::guard('admin')->user()->role != 'superadmin') {
            return redirect()->route('error')->with('not_found','Kamu Tidak Memiliki Superadmin');
        }
        $rules = [
            'password' => 'required|string|min:8|confirmed',
        ];
        $message = [];
        $attribute = [
            'password' => 'Password',
        ];
        $validasi = $this->validate($request,$rules,$message,$attribute);
        $data = User::findOrFail($id);
        $data->password = bcrypt($request->password);
        $data->save();
        return redirect()->back()->with('success', 'Berhasil Mengubah Password');
    }
}

