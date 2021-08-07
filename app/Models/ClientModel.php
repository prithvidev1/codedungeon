<?php

namespace App\Models;

use CodeIgniter\Model;

class ClientModel extends Model
{
    protected $table      = 'clients';
    protected $primaryKey = 'client_id';

    protected $useAutoIncrement = true;

   // protected $returnType     = 'array';
   // protected $useSoftDeletes = true;

    protected $allowedFields = ['client_name', 'email','address','username','password'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

   // protected $validationRules    = [];
   // protected $validationMessages = [];
   // protected $skipValidation     = false;

    // protected $beforeInsert = ['checkName'];

    // public function checkName( array $data)
    // {
    //     $newtitle = $data['data']['client_name'].'Extra Features';
    //     $data['data']['client_name'] = $newtitle;
    //     return $data;
    // }

     protected $beforeInsert =['hashPassword'];

    public function hashPassword(array $data)
    {
        $data['data']['password'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);
        return $data;
    }
}