<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
// use Validator;
class ManageAdminController extends Controller
{
	public function index()
	{
		$data = Admin::paginate(10);
		return view('admin.manage-admin.index', ['data' => $data]);
	}

	public function store(Request $request)
	{
		$validasi = $this->validate($request, [
            'name'  => 'required|string',
            'role'  => 'required|string',
            'email' => 'required|email|unique:admins',
            // 'nik'  	=> 'required|nik|unique:admins',
            'password'  => 'required|string|min:8|confirmed',
        ]);

		$data = new Admin;
		$data->name = $request->name;
		$data->nik = $request->nik;
		$data->email = $request->email;
		$data->password = bcrypt($request->password);
		$data->role = $request->role;
		$data->save();

		return redirect()->back()->with('success', 'Berhasil menambah admin!');
	}
}
