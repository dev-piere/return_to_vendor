<?php
date_default_timezone_set('Asia/Jakarta');

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

function isOnline()
{
    if (hasSession()) {
        $response = getToApi('/v2/hosting/auth/getOnlineStatus', ['empId' => employee()['id_karyawan'], 'token' => hasSession()['auth']['onlineToken']]);
        $resAccept = $response['data']['online_accept'];
        if (!$resAccept) {
            redirect('auth/logout');
        }
        return;
    }

    redirect('auth/logout');
}

function hasSession()
{
    $ci = get_instance();
    $empId = $ci->session->userdata();

    return $empId;
}

function is_logged_in()
{
    if (!hasSession()) {
        redirect('auth/logout');
    }
    return;
}

function employee()
{
    $ci = get_instance();
    $employee = $ci->session->userdata('employee');

    return $employee;
}

function urlApi()
{
    return 'https://sefong5.com/api';
}

function urlApi_local()
{
    return 'http://192.168.20.251/apiSefong/v2/local/ReturnToVendor/';
}


function secretKey()
{
    return '9u8231dsk29u9';
}

/**
 * 
 * Function to call API
 * 
 * Require GuzzleHttp
 *      composer require guzzlehttp/guzzle
 * 
 */

/* API function */
function getToApi($url, $params)
{
    $keyVal = '';
    for ($i = 0; $i < count($params); $i++) {
        $arrayName = array_keys($params)[$i];
        $arrayVal = $params[$arrayName];
        $keyVal .= '&' . $arrayName . '=' . $arrayVal;
    }

    $client = new Client();
    $headers = [
        'Content-Type' => 'application/json',
    ];

    $request = new Request('GET', urlApi() . $url . '?secretKey=' . secretKey() . $keyVal, $headers);
    $res = $client->sendAsync($request)->wait();
    $output = json_decode($res->getBody(), true);

    return $output;
}

function postToApi($url, $data)
{
    $client = new Client();

    $response = $client->request('POST', urlApi() . $url, [
        'form_params' => $data
    ]);

    $body = $response->getBody();
    $output = json_decode($body, true);

    return $output;
}

function getToApi_local($url, $params)
{
    $keyVal = '';
    for ($i = 0; $i < count($params); $i++) {
        $arrayName = array_keys($params)[$i];
        $arrayVal = $params[$arrayName];
        $keyVal .= '&' . $arrayName . '=' . $arrayVal;
    }

    $client = new Client();
    $headers = [
        'Content-Type' => 'application/json',
    ];

    $request = new Request('GET', urlApi_local() . $url . '?secretKey=' . secretKey() . $keyVal, $headers);
    $res = $client->sendAsync($request)->wait();
    $output = json_decode($res->getBody(), true);

    return $output;
}

function postToApi_local($url, $data)
{
    $client = new Client();

    $response = $client->request('POST', urlApi_local() . $url, [
        'form_params' => $data
    ]);

    $body = $response->getBody();
    $output = json_decode($body, true);

    return $output;
}

function getUrlBySegment($limit = 0, $offset = 0)
{
    $ci = get_instance();
    
    if (empty($limit) && empty($offset)) {
        $url = $ci->uri->uri_string();
    } 

    if ($limit && !$offset) {
        $url = $ci->uri->segment($limit);
    }

    if (($limit || $limit == 0) && $offset) {
        $url = implode('/', array_slice($ci->uri->segment_array(), $limit, $offset));
    }
    
    return $url;
}