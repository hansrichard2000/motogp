<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Laravel\Passport\Client;

class LoginController extends Controller
{
    private $client;

    public function __construct(){
        $this->client = Client::find(8);
    }

    public function login(Request $request){

//        $http = new \GuzzleHttp\Client;

        $user = [
            'email' => $request->email,
            'password' => $request->password,
            'role_id' => 2,
            'is_verified' => '1',
            'is_login' => '0',
            'is_active' => '1',
        ];

        $check = DB::table('users')->where('email', $request->email)->first();

        if ($check->is_verified == '1'){
            if ($check->is_active == '1'){
                if ($check->is_login == '0'){
                    if (Auth::attempt($user)){
                        $this->isLogin(Auth::id());
                        $response = Http::asForm()->post('http://motogp.test/oauth/token', [
                            'grant_type' => 'password',
                            'client_id' => $this->client->id,
                            'client_secret' => $this->client->secret,
                            'username' => $request->email,
                            'password' => $request->password,
                            'scope' => '*',
                        ]);

                        return $response->json();
                    }else{
                        return response([
                           'message' => 'Login Failed'
                        ]);
                    }
                }else{
                    return response([
                        'message' => 'Account in use'
                    ]);
                }
            }else{
                return response([
                    'message' => 'Account Suspended'
                ]);
            }
        }else{
            return response([
                'message' => 'Please Verify Email'
            ]);
        }
    }

    private function isLogin(int $id){
        $user = User::findOrFail($id);
        return $user->update([
            'is_login' => '1',
        ]);
    }

    public function refresh(Request $request){
        $this->validate($request, [
            'refresh_token' => 'required',
        ], [
            'refresh_token' => 'refresh token is required',
        ]);

        $response = Http::asForm()->post('http://motogp.test/oauth/token', [
            'grant_type' => 'refresh_token',
            'refresh_token' => $request->refresh_token,
            'client_id' => $this->client->id,
            'client_secret' => $this->client->secret,
            'scope' => '*',
        ]);

        return $response->json();
    }

    public function logout(){
        $user = Auth::user();
        $accessToken = Auth::user()->token();
        DB::table('oauth_refresh_tokens')
            ->where('access_token_id', $accessToken->id)
            ->update(['revoked' => true]);

        $user->update([
            'is_login' => '0',
        ]);

        $accessToken->revoke();

        return response([
            'message' => 'Logged out',
        ]);
    }
}