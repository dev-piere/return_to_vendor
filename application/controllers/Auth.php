<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __Construct()
    {
        parent::__Construct();
    }

    public function login()
    {
        $employee = $this->input->get('employee');
        $token = $this->input->get('token');

        $response = getToApi('/v2/hosting/auth/getOnlineStatus', ['empId' => $employee, 'token' => $token]);
        $resAccept = $response['data']['online_accept'];
        $resExp = $response['data']['online_exp'];

        if (!$resAccept) {
            redirect('http://localhost/sefong_portal/');
        }

        $detailEmployee = getToApi('/api/getEmployeeDetail', ['secretkey' => secretKey(), 'empId' => $employee]);
        $dataSession = [
            'auth' => [
                'onlineToken' => $token,
                'onlineExp' => $resExp,
            ],
            'employee' => $detailEmployee['data']
        ];
        $this->session->set_userdata($dataSession);

        redirect(base_url());
    }

    public function sess()
    {
        var_dump($this->session->userdata());
    }

    public function logout()
    {
        redirect('http://localhost/sefong_portal/');
    }
}