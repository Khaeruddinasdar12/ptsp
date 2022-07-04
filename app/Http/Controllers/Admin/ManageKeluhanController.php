<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Keluhan;
class ManageKeluhanController extends Controller
{
	public function index()
	{
		$data = Keluhan::with('user:name,id')->paginate(10);
		// return $data;
		return view('admin.manage-keluhan.index', ['data' => $data]);
	}
}
