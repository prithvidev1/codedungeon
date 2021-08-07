<?php

namespace App\Models;

use CodeIgniter\Model;

class IncomeModel extends Model
{
    protected $table      = 'incomes';
    protected $primaryKey = 'income_id';

    protected $useAutoIncrement = true;

   // protected $returnType     = 'array';
   // protected $useSoftDeletes = true;

    protected $allowedFields = ['income_heading', 'amount','date','client_id','week'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

   // protected $validationRules    = [];
   // protected $validationMessages = [];
   // protected $skipValidation     = false;

    // protected $beforeInsert = [];

}