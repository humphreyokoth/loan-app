<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Modal extends BaseController
{
    public function approve_loan_request($user_loan_request_id)
    {
        $data['user_loan_request_id'] = $user_loan_request_id;
        return view('app-pages/modals/approve-loan-request', $data);
    }

  
}
