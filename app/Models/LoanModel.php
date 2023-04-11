<?php namespace App\Models;

use CodeIgniter\Model;

class LoanModel extends Model
{
    protected $table = 'loans';

    public function getOutstandingLoans($accountNumber)
    {
        $builder = $this->db->table('customers');
        $builder->select('customers.id AS customer_id, loans.id AS loan_id, loans.disbursed_date, loans.outstanding_amount')
                ->join('loans', 'loans.customer_id = customers.id')
                ->where('customers.account_number', $accountNumber)
                ->where('loans.outstanding_amount >', 0)
                ->orderBy('loans.disbursed_date', 'desc');

        $query = $builder->get();
        return $query->getResult();
    }
}
