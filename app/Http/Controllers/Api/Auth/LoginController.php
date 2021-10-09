<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use http\Client;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    private $client;

    public function __construct(){
        $this->client = Client::find(8);
    }

    public function login(Request $request){
//        $user = [
//            'email' => $request->email,
//            'password' => $request->password,
//
//        ]
    }
}
