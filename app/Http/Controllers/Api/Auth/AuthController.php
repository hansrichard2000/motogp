<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Passport\Client;

class AuthController extends Controller
{
    private $client;

    public function __construct(){
        $this->client = Client::find(7);
    }

    public function redirect(Request $request){
        $request->session()->put('state', $state = Str::random(40));

        $query = http_build_query([
            'client_id' => $this->client->id,
            'redirect_uri' => 'http://motogp.technospire.web.id/callback',
            'response_type' => 'code',
            'scope' => '*',
            'state' => $state,
        ]);

        return redirect('http://motogp.technospire.web.id/oauth/authorize?'.$query);
    }
}
