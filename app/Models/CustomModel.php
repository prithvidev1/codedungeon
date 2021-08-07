<?php namespace App\Models;
use CodeIgnitor\Database\ConnectionInterface;
 class CustomModel{
 	protected $db;

 	public function __construct(ConnectionInterface &db)
 	{
 		$this->db =& $db;
 	}

 	function getIncomes()
	{
		$builder = $this->db->tables
	}
 } 
