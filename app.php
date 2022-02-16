<?php
 
   //use Illuminate\Support\Facades\Http;
   use GuzzleHttp\Client;
   session_start();

   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      //  $response = Http::post('http://example.com/users', [
      //     'app' => 'demoapp',
      //     'user' => 'Admin',
      //     'pass' => '123',
      //     'lang' => 'bg'
      //       ]);
            $client = new Client();
            $res = $client->request('POST', 'https://url_to_the_api', [
                'form_params' => [
                    'client_id' => 'test_id',
                    'secret' => 'test_secret',
                ]
            ]);
            echo $res->getStatusCode();
    
      $myusername = $_POST['user'];
      $mypassword = $_POST['pass']; 
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		$error = "";
      if($myusername && $mypassword) {
         //session_register("myusername");
         $_SESSION['login_user'] = $myusername;
         
         header("location: welcome.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
