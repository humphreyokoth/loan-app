<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Libraries\Curl_lib;
use App\Libraries\Curl;
class Form extends BaseController
{
    public function authenticate()
    {
        helper('cookie');
        $params = $this->request->getPost();

        $curl = new Curl_lib();
       
        $response = $curl->post($this->api_base_uri . 'admin-user/authenticate', $params);
        // dd($response);
        $response = json_decode($response) ?? NULL;

        if ($response->status == 200) {
           

            $expiry =  time() + 60 * 60 * 24 * 6004;
        	setcookie('jwt_token', $response->token, $expiry, '/');
            
            // dd($response);
            $admin_user = $response->data;
            $session_data = [
                'first_name'    => $admin_user->first_name,
                'last_name'     => $admin_user->last_name,
                'other_name'    => $admin_user->other_name,
                'email'         => $admin_user->email,
                'user_group_id' => $admin_user->user_group_id,
                'user_group'    => $admin_user->user_group,
                'logged_in'     => true,
                'token'         => $response->token
            ];
            $this->session->set($session_data);
            return redirect()->to('/');
        } else {
            return redirect()->back()->with('flash_message', $this->alert('danger', $response->messages->error));
        }
    }


    
 
    public function approve_storage_request()
    {
        $params = $this->request->getPost();


        $curl = new Curl_lib();
        $response = $curl->post($this->api_base_uri.'vendor-storage/approve' , $params,$this->session->token);
       // dd($response);
        if ($response == 200) {
            return redirect()->to('storages');
        }else {
            return redirect()->back();
        }

     
    } 

        
    
    public function approve_loan_request()
    {
        $params = $this->request->getPost();
        // dd($params);

        $curl = new Curl_lib();
        $response = $curl->post($this->api_base_uri . 'user-loan-request/approve', $params,$this->session->token);
        $response = json_decode($response);

        if ($response->status == 201) {
            // return redirect()->to('product-categories'); 
            return redirect()->back();
        } else {
            return redirect()->back();
        }
     
   }



    public function add_loan_request()
    {
        $params = $this->request->getPost();
        $params['request_status_id'] = 1;
        // dd($params);

        $curl = new Curl_lib();
        $response = $curl->post($this->api_base_uri . 'user-loan-request/add', $params ,$this->session->token);
        $response = json_decode($response);
        if ($response->status == 201) {
            // return redirect()->to('product-categories'); 
            return redirect()->to('loan-requests');
        } else {
            return redirect()->back();
        }
    }

    public function add_account()
    {
        $params = $this->request->getPost();
        //dd($params);

        $curl = new Curl_lib();
        $response = $curl->post($this->api_base_uri . 'user-loan-request/add', $params,$this->session->token);
        $response = json_decode($response);

        if ($response->status == 201) {
            // return redirect()->to('product-categories'); 
            return redirect()->to('accounts');
        } else {
            return redirect()->back();
        }
    }

    

    public function logout()
    {
        $this->session->destroy();
        return redirect()->to('login');
    }

    public function alert($type, $message)
    {
        $alert  = '<div class="alert alert-' . $type . ' alert-dismissible">';
        $alert .= '<button type="button" class="close" data-dismiss="alert">&times;</button>';
        $alert .= $message;
        $alert .= '</div>';
        return $alert;
    }
}
