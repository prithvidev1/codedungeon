<?php 
 namespace App\Validation;
 use App\Models\ClientModel;

  class UserRules{
  	public function validateUser(string $str, string $fields, array $data )
  	{
		$model = new ClientModel();
		$user =$model->where('username', $data['username'])->first();
		
		if(!$user){
			return false;
		}
		
		// echo "<pre>";
		// print_r("expression");
		// exit();
		return password_verify($data['password'],$user['password']);	
		
	}
}
  