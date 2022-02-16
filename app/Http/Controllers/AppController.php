<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Classes\AppSession;
use App\Classes\Orders;

class AppController extends Controller
{
    public function login(Request $request){

        $validator = Validator::make($request->all(), [
            'app' => 'required',
            'user' => 'required',
            'pass' => 'required',
            'lang' => 'required'
        ]);
        if ($validator->fails()) {
            return redirect('/')
                ->withErrors($validator)
                ->withInput();
        }

        $appSess = new AppSession();
        $sess = $appSess->login([
             'app' => $request->input('app'),
             'user' => $request->input('user'),
             'pass' => $request->input('pass'),
             'lang' => $request->input('lang')
         ]);

         if($sess->ok()){
            $order = new Orders();
            $res = $order->queryOrder('https://demodb.my.erp.net/api/domain/odata/Crm_Sales_SalesOrders?&$select=DocumentDate,DocumentNo&$filter=id eq 70c5792a-9d51-4c67-b90b-96ba79c0c9b1');  
            if($res->ok()){
                $_SESSION['order'] = $res->body();
                return view('welcome');    
             } 
        }

        return view('login');
    }
    
    public function logout(){
        $appSess = new AppSession();
        $response = $appSess->logout();

        if($response->ok()){
            return view('login');
        }
    }

}
