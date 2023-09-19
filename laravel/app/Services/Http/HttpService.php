<?php

namespace App\Services\Http;

use Illuminate\Support\Facades\Http;

/**
 * Class HttpService
 * @package App\Services\Http
 */
class HttpService
{
    public function getResult($url)
    {
        $response = Http::get($url);

        return json_decode($response->body())->response->results;
    }
}
