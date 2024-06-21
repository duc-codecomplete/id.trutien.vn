<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function callGameApi($method, $path, $params) {
        $client = new \GuzzleHttp\Client();
        $gameApi = env('GAME_API_ENDPOINT', '');
        $response = $client->request($method, $gameApi . $path, ["form_params" => $params]);
        $response = json_decode($response->getBody()->getContents(), true);
        return $response;
    }
}
