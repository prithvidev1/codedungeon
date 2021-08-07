<?php

namespace App\Controllers;
use App\Models\ExpenseModel;
use \DateTime;
use App\Models\ClientModel;
class Expense extends BaseController
{
	public function index()
	{
		helper(['form']);
		$a = session()->get('client_id');
		
		if($this->request->getMethod() == 'post')
		{
			$b = $this->request->getVar('date');
			$model = new ExpenseModel();
			$week = date("W", strtotime($b));
			$year = date("Y", strtotime($b));
			
			$week_array = $this->getSAD($week,$year);
			$a = session()->get('client_id');

				$newData = [
					'exp_heading' => $this->request->getVar('exp_heading'),
					'amount' => $this->request->getVar('amount'),
					'date' => $this->request->getVar('date'),
					'week' => $week,
					'client_id' => $a,
				];
				
				$model->save($newData);
				$session = session();
				$session->setFlashdata('success','Successfully Inserted');
				return redirect()->to('/expense');
			
		}
		return view('expense/expense_form');
	}

	private function getSAD($week, $year) {
		
		  $dto = new DateTime();
		  $dto->setISODate($year, $week);
		  $ret['week_start'] = $dto->format('Y-m-d');
		  $dto->modify('+6 days');
		  $ret['week_end'] = $dto->format('Y-m-d');
		  return $ret;
		}

	public function expense()
	{
		$data = array();
		$a = session()->get('client_id');
		$model = new ExpenseModel();
        
			$users = $model->where('client_id',$a)  
                   		   ->findAll();		
            $data['users'] = $users;
		return view('expense/client_expense', $data);
	}

	public function expenseReport()
	{
		$data = array();
		$a = session()->get('client_id');

		$model = new ExpenseModel();

		// $users = $model->where('client_id',$a )
 	    //                ->findAll();

        $years = $model->select('date')
        			   ->where('client_id',$a)
        			   ->groupBy('YEAR(date)')
                   ->findAll();
        $data['years'] = $years;
        $data['users'] = [];
        $data['message'] = '';

        if($this->request->getMethod() == 'post')
		{
			if(!empty($_POST['year']) && !empty($_POST['month']) && empty($_POST['week']) )
			{

				$users = $model->where('client_id',$a)
        			   ->like('date',  $_POST['year']."-".$_POST['month'] )
                   		->findAll();
                $data['message'] = "For" .$_POST['year']." ".$_POST['month'];		
				
			}
			if(!empty($_POST['year']) && empty($_POST['month']) && !empty($_POST['week'])  )
			{
				
				$users = $model->where('client_id',$a)
        			   ->where('week',  $_POST['week'])
                   		->findAll();
                $week_array = $this->getSAD($_POST['week'],$_POST['year']);
                $weekst = $week_array['week_start'];
                $weeke = $week_array['week_end'];   				
				$data['message'] = "For Week" .$_POST['week']." ".$_POST['year']."(". $weekst." to ".$weeke.")";	
			}
			if(!empty($_POST['year']) && empty($_POST['month']) && empty($_POST['week']) )
			{
				$users = $model->where('client_id',$a)
        			   ->like('date',  $_POST['year'] )
                   		->findAll();		
				$data['message'] = "For" .$_POST['year'];	
			}
			// $users = $model->where('')

               $data['users'] = $users;
          }
		
		return view('expense/client_exp_report', $data);
	}

	public function delete($id)
	{
		$a = session()->get('client_id');
		$model = new ExpenseModel();
		$post = $model->find($id);
		
		if($post)
		{ 
			if($post['client_id'] == $a)
			{
				$model->delete($id);
				return redirect()->to('/client_expense');
			}
			else
			{
				return view('expense/client_expense', "Data not authorized");
			}
		}
	}

	public function edit($id)
	{
		$model = new ExpenseModel();
		$post = $model->find($id);
		
		$data = [
				'exp_heading' => $post['exp_heading'],
				'amount' => $post['amount'],
				'date' => $post['date'],
				'post' => $post,
		];
		if($this->request->getMethod() == 'post')
		{
			$model = new ExpenseModel();
			$_POST['exp_id']  = $id;
			$model->save($_POST);
			$post = $model->find($id);
			$session = session();
			$session->setFlashdata('success','Successfully Updated');
			return redirect()->to('/expense');
		}
		$data['post']= $post;
		return view('expense/expense_edit', $data);
	}
}
