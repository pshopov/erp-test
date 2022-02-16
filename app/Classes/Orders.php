<?php

namespace App\Classes;

use Illuminate\Support\Facades\Http;
use App\Classes\AppSession;

class Orders extends AppSession
{
    public function __construct() {
        
    }
    public function queryOrder($q) {
        
        $response = Http::withHeaders(json_decode($_SESSION['auth'],true))->get($q);
        return $response;
    }
    public function __destruct()
    {
    }
}
