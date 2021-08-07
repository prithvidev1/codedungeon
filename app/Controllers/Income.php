<?php

namespace App\Controllers;
use App\Models\IncomeModel;
use \DateTime;
use App\Models\ClientModel;
class Income extends BaseController
{
	public function new()
	{
		helper(['form']);
		$a = session()->get('client_id');
		
		if($this->request->getMethod() == 'post')
		{
			$b = $this->request->getVar('date');
			$model = new IncomeModel();
			$week = date("W", strtotime($b));
			$year = date("Y", strtotime($b));
			
			$week_array = $this->getSAD($week,$year);
			$a = session()->get('client_id');

				$newData = [
					'income_heading' => $this->request->getVar('income_heading'),
					'amount' => $this->request->getVar('amount'),
					'date' => $this->request->getVar('date'),
					'week' => $week,
					'startingdow' =>$week_array['week_start'],
					'endingdow' =>$week_array['week_end'],
					'client_id' => $a,
				];
				
				$model->save($newData);
				$session = session();
				$session->setFlashdata('success','Successfully Inserted');
				return redirect()->to('/income');
			
		}
		return view('income/income_form');
	}

	private function getSAD($week, $year) {
		
		  $dto = new DateTime();
		  $dto->setISODate($year, $week);
		  $ret['week_start'] = $dto->format('Y-m-d');
		  $dto->modify('+6 days');
		  $ret['week_end'] = $dto->format('Y-m-d');
		  return $ret;
		}

	public function income()
	{
		$data = array();
		$a = session()->get('client_id');
		$model = new IncomeModel();
        
			$users = $model->where('client_id',$a)  
                   		   ->findAll();		
            $data['users'] = $users;
		return view('income/client_income', $data);
	}

	public function incomeReport()
	{
		$data = array();
		$a = session()->get('client_id');

		$model = new IncomeModel();

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
		
		return view('income/client_inc_report', $data);
	}

	public function delete($id)
	{
		$a = session()->get('client_id');
		$model = new IncomeModel();
		$post = $model->find($id);
		
		if($post)
		{ 
			if($post['client_id'] == $a)
			{
				$model->delete($id);
				return redirect()->to('/client_income');
			}
			else
			{
				return view('income/client_income', "Data not authorized");
			}
		}
	}

	public function edit($id)
	{
		$model = new IncomeModel();
		$post = $model->find($id);
		
		$data = [
				'income_heading' => $post['income_heading'],
				'amount' => $post['amount'],
				'date' => $post['date'],
				'post' => $post,
		];
		if($this->request->getMethod() == 'post')
		{
			$model = new IncomeModel();
			$_POST['income_id']  = $id;
			$model->save($_POST);
			$post = $model->find($id);
			$session = session();
			$session->setFlashdata('success','Successfully Updated');
			return redirect()->to('/income');
		}
		$data['post']= $post;
		return view('income/income_edit', $data);
	}
}
