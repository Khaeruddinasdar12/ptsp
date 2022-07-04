<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
class ManageUserController extends Controller
{
	public function index()
	{
		$data = User::paginate(10);
		return view('admin.manage-user.index', ['data' => $data]);
	}
}
