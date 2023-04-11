<?php namespace App\Models;

use CodeIgniter\Model;

class AccountNumberModel extends Model
{
    protected $table = 'account_numbers';

    public function isValidAccountNumber($accountNumber)
    {
        $builder = $this->db->table($this->table);
        $builder->select('id')
                ->where('account_number', $accountNumber);

        $query = $builder->get();
        return $query->getNumRows() > 0;
    }
}
