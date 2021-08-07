<?php

namespace App\Controllers;
use App\Models\ClientModel;
class Dashboard extends BaseController
{
	public function index()
	{
		//$data = [];
		echo view('dashboard');
	}
}