<?php

namespace App\Services\Http;

use App\Traits\Logger;
use Illuminate\Http\Client\RequestException;
use Illuminate\Support\Facades\Http;

/**
 * Class HttpService
 * @package App\Services\Http
 */
class HttpService
{
    use Logger;

    public function getResult($url)
    {
        try {
            $response = Http::timeout(10)->get($url);

            if ($response->successful()) {
                return json_decode($response->body());
            }

            return null;
        } catch (RequestException $exception) {
            $this->logError($exception);
            return null;
        }
    }
}
