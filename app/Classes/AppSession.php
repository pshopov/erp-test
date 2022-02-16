<?php

namespace App\Classes;

use Illuminate\Support\Facades\Http;

class AppSession 
{
    public function __construct() {
        if (session_status() === PHP_SESSION_NONE) {
            session_set_cookie_params(1800);
            session_start();
        }
    }

    public function login($bodyArr) {
        $response = Http::post('https://demodb.my.erp.net/api/domain/Login', $bodyArr);
        $_SESSION['auth'] = $response->body();
        return $response;
    }

    public function logout() {
        $response = Http::withHeaders(json_decode($_SESSION['auth'],true))->post('https://demodb.my.erp.net/api/domain/Logout');
        if($response->ok())
            $this->unset();
        return $response;
    }

    public function unset(){
        if(isset($_SESSION['auth']))
            unset($_SESSION['auth']);
    }

    public function __destruct()
    {
        if(!isset($_SESSION['auth']))
            session_destroy();
    }
}
