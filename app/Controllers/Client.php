<?php

namespace App\Controllers;
use App\Models\ClientModel;
class Client extends BaseController
{
	public function index()
	{
		$data=[];
		helper(['form']);
		if($this->request->getMethod() == 'post') 
		{

			$rules = [
				
				'username' => 'required|min_length[6]|max_length[20]',
				'password' => 'required|min_length[8]|validateUser[username,password]',
				
			];

			$errors = [
				'password' => [
					'validateUser' => 'Email or Password don\'t match'
				]
			];

			if(!$this->validate($rules, $errors))
			{
				
				$data['validation'] = $this->validator;
				
			}
			else{

				$model = new ClientModel();
				$user =$model->where('username', $this->request->getVar('username'))->first();
				$this->setUserMethod($user);
				return redirect()->to('dashboard');

			}

			
		}
		return view('login',$data);
	}

	private function setUserMethod($user)
	{
		$data =[
			'client_id' =>$user['client_id'],
			'client_name' =>$user['client_name'],
			'address' =>$user['address'],
			'username' =>$user['username'],
			'email' =>$user['email'],
			'isLoggedIn' => true,

		];
		session()->set($data);
		return true;
	}

	// public function register()
	// {
	// 	helper(['form']);

	// 	return view('client_form');
	// }
	public function register()
	{
		$data=[];
		helper(['form']);
		
		if($this->request->getMethod() == 'post')
		{

			$rules = [
				'client_name' => 'required|min_length[5]|max_length[30]',
				'address' => 'required|min_length[5]',
				'email' => 'required|min_length[6]|max_length[30]|valid_email|is_unique[clients.email]',
				'username' => 'required|min_length[6]|max_length[20]|is_unique[clients.username]',
				'password' => 'required|min_length[8]',
				'password_confirm' => 'matches[password]',
			];

			if(!$this->validate($rules))
			{
				
				$data['validation'] = $this->validator;
				
			}
			else{
				$model = new ClientModel();

				$newData = [
					'client_name' => $this->request->getVar('client_name'),
					'email' => $this->request->getVar('email'),
					'address' => $this->request->getVar('address'),
					'username' => $this->request->getVar('username'),
					'password' => $this->request->getVar('password'),

				];
			
				$model->save($newData);
				$session = session();
				$session->setFlashdata('success','Successful Registration');
				return redirect()->to('/');
			}

			
		}
		return view('client_form', $data);
	}
	public function client($id)
	{
		$model = new ClientModel();

		$post = $model->find($id);
		
		if($post){
			$data =[
				'client_name' => $post['client_name'],
				'email' => $post['email'],
				'post' => $post,
			];
		}
		else{
			$data =[
				'client_name' => 'Client Not Found',
				'email' => 'Client Not Found',
			];
		}
		return view('client_single', $data);
	}
	public function delete($id)
	{
		$model = new ClientModel();
		$post = $model->find($id);
		// echo "<pre>";
		// print_r($post);
		// exit();
		if($post)
		{
			$model->delete($id);
			return redirect()->to('/hello');
		}
	}
	public function profile()
	{
		$data= [];
		helper(['form']);
		$model = new ClientModel();
		// $a = session()->get('client_id');
		
		
		if($this->request->getMethod() == 'post')
		{
		
			$rules = [
				'client_name' => 'required|min_length[5]|max_length[30]',
				'address' => 'required|min_length[5]',
				 
				
			];

			if($this->request->getPost('password') !=''){
				$rules['password'] = 'required|min_length[8]';
				$rules['password_confirm'] = 'matches[password]';
			}

			if(!$this->validate($rules))
			{
				
				$data['validation'] = $this->validator;
				
			}
			else{
				$model = new ClientModel();

				$newData = [
					'client_id' => session()->get('client_id'),
					'client_name' => $this->request->getPost('client_name'),
					'address' => $this->request->getPost('address'),
					//'username' => $this->request->getPost('username'),
					

				];

				if($this->request->getPost('password') != '')
				{
					$newData['password'] = $this->request->getPost('password');
				}

				$model->save($newData);
				
				session()->setFlashdata('success','Successful Updated');
				return redirect()->to('/profile');
			}
		}

		$data['user'] = $model->where('client_id', session()->get('client_id'))->first();
		return view('profile', $data);
	}

	// public function edit($id)
	// {
	// 	$model = new ClientModel();
	// 	$post = $model->find($id);
		
	// 	$data = [
	// 			'client_name' => $post['client_name'],
	// 			'email' => $post['email'],
	// 			'post' => $post,
	// 	];
	// 	if($this->request->getMethod() == 'post')
	// 	{
	// 		$model = new ClientModel();
	// 		$_POST['client_id']  = $id;
	// 		$model->save($_POST);
	// 		$post = $model->find($id);
	// 	}
	// 	$data['post']= $post;
	// 	return view('edit_client', $data);
	// }

	public function logout()
	{
		session()->destroy();
		return redirect()->to('/');
	}
}
