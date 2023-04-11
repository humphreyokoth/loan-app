<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Libraries\Curl_lib;
use App\Libraries\Curl;


class App extends BaseController
{



    public function index()
    {
        if (!$this->session->has('logged_in')) {
            return redirect()->to('login');
        }
        $data = [];

        return view('app-pages/home', $data);
    }

    public function login()
    {
        return view('app-pages/login');
    }
    public function alert($type, $message)
    {
        $alert = '<div class = "alert alert-' . $type . ' alert-dismissible">';
        $alert .= '<button type ="button" class ="close" data-dismiss="alert">&times;</button>';
        $alert .= $message;
        $alert .= '</div>';
        return $alert;
    }

    public function transactions()
    {
        if (!$this->session->has('logged_in')) {
            return redirect()->to('login');
        }

       //$params = $this->request->getGet();

        $curl = new Curl_lib();
        $response = $curl->get($this->api_base_uri . 'transactions' , $this->session->token);
        // dd($response);
        $response = json_decode($response);
        //dd($response);
        if ($response->status == 200) {
            $data['transactions'] = $response->data ;
            return view('app-pages/list_transactions',$data);
        } else {
           if (isset($response->code)) {
                return redirect()->to('login');
           }else {
            return $this->alert('error',$response->messages->error);
           }
        }       
    }

    public function transaction($id)
    {
        if (!$this->session->has('logged_in')) {
            return redirect()->to('login');
        }

        $params = $this->request->getGet('id');
        //dd($params);
        $curl = new Curl_lib();
        $response = $curl->get($this->api_base_uri . 'transaction?id=' . $id, $this->session->token);

        $response = json_decode($response);
        if ($response->status == 200) {
            $data['transaction'] = $response->data;
            return view('app-pages/details-transaction', $data);
        } else {
            if (isset($response->code)) {
                return redirect()->to('login');
            } else {
                return $this->alert('error', $response->messages->error);
            }
        }
    }


    public function loan_requests()
    {
        if (!$this->session->has('logged_in')) {
            return redirect()->to('login');
        }

        $params = $this->request->getGet();

        $curl = new Curl_lib();
        $response = $curl->get($this->api_base_uri . 'user-loan-requests', $this->session->token);
        $response = json_decode($response);
        if ($response->status == 200) {
            $data['requests'] = $response->data;
            return view('app-pages/list-loan-requests', $data);
        } else {
            if (isset($response->code)) {
                return redirect()->to('login');
            } else {
                return $this->alert('error', $response->messages->error);
            }
        }


        // return view('app-pages/list-loan-requests', $data);
    }

    public function add_loan_requests()
    {
        if (!$this->session->has('logged_in')) {
            return redirect()->to('login');
        }

        // $params = $this->request->getGet();

        $curl = new Curl_lib();
        $response = $curl->get($this->api_base_uri . 'users', $this->session->token);
        $data['accounts'] = json_decode($response)->data;

        return view('app-pages/form-loan-request', $data);
    }

    public function loan_facilities()
    {
        if (!$this->session->has('logged_in')) {
            return redirect()->to('login');
        }

        // $params = $this->request->getGet();

        $curl = new Curl_lib();
        $response             = $curl->get($this->api_base_uri . 'user-loan-facilities', $this->session->token);
        $response             = json_decode($response);
        if ($response->status ==  200) {
            $data['requests'] = $response->data;
            return view('app-pages/list-loan-facilities', $data);
        } else {
            if (isset($response->code)) {
                return redirect()->to('login');
            } else {
                return $this->alert('error', $response->messages->error);
            }
        }
    }

    public function accounts()
    {
        if (!$this->session->has('logged_in')) {
            return redirect()->to('login');
        }

        $curl = new Curl_lib();
        $response = $curl->get($this->api_base_uri . 'users', $this->session->token);
        $response = json_decode($response);
        if ($response->status == 200) {
            $data['accounts'] = $response->data;
            return view('app-pages/list-accounts', $data);
        } else {
            if (isset($response->code)) {
                return redirect()->to('login');
            } else {
                return $this->alert('error', $response->messages->error);
            }
        }
    }

    // Account details
    public function account($id)
    {

        if (!$this->session->has('logged_in')) {
            return redirect()->to('login');
        }
        $curl = new Curl_lib();
        $response = $curl->get($this->api_base_uri . 'user/account/details/' . $id . '?show_wallet=1&request_status_id=2&show_storage_logs=1',$this->session->token);
        //dd($response);
        $response = json_decode($response);
        
        if ($response->status == 200) {
            $data['account'] = $response->data;
            return view('app-pages/details-account', $data);
        } else {
            if (isset($response->code)) {
                return redirect()->to('login');
            } else {
                return $this->alert('error', $response->messages->error);
            }
        }
    }


    public function add_account()
    {
        if (!$this->session->has('logged_in')) {
            return redirect()->to('login');
        }

        helper('form');
        $account_type = $this->request->getGet('type');

        $data['form_action'] = base_url('form/add-account');
        if ($account_type == 'off_taker') {
            $data['form_action'] = base_url('form/add-off-taker-account');
            return view('app-pages/form-off-taker', $data);
        } else {
            return view('app-pages/form-account', $data);
        }
    }

   
}
