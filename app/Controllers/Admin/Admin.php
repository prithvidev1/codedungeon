<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;

class Admin extends BaseController
{
	public function index()
	{
		return view('admin_home');
	}

	public function oh_no()
	{
		echo "OH nO OH no";
	}
}
